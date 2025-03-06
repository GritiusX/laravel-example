<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3); //best URL option, not most performant
        //$jobs = Job::with('employer')->paginate(3); //if there are thousands of pages, can be slow
        //$jobs = Job::with('employer')->cursorPaginate(3); //most performant, not best URL option

        return view("jobs.index", [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view("jobs.create");
    }
    public function show(Job $job)
    {
        return view("jobs.show", [
            'job' => $job
        ]);
    }
    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:5'],
            'salary' => ['required', 'numeric', 'min:100'],
        ], [
            'title.required' => 'You must provide a job title.',
            'title.min' => 'Job title must be at least 5 characters long.',
            'salary.required' => 'You must provide a salary.',
            'salary.numeric' => 'Salary must be a number.',
            'salary.min' => 'Salary must be higher than 100.',
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => '1',
        ]);

        return redirect("/jobs");
    }

    public function edit(Job $job)
    {
        if (Auth::guest()) {
            return redirect("/login");
        }
        if ($job->employer->user->isNot(Auth::user())) {
            return abort(403);
        }

        return view("jobs.edit", [
            'job' => $job
        ]);
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|min:5',
            'salary' => 'required|numeric|min:100',
        ], [
            'title.required' => 'You must provide a job title.',
            'title.min' => 'Job title must be at least 5 characters long.',
            'salary.required' => 'You must provide a salary.',
            'salary.numeric' => 'Salary must be a number.',
            'salary.min' => 'Salary must be higher than 100.',
        ]);

        $job->update($request->all());

        return redirect("/jobs/{$job->id}");
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('/jobs');
    }
}
