<x-layout>
    <x-slot:heading>Edit job: {{ $job->title }}</x-slot:heading>

    <form
        method="POST"
        action="/jobs/{{ $job->id }}"
        class="space-y-6"
    >
        @csrf
        @method('PATCH')
        <div>
            <label
                for="title"
                class="block text-sm font-medium text-gray-700"
            >
                Title:
            </label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ $job->title }}"
                placeholder="Software Engineer"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            >
            @if ($errors->has('title'))
                <p class="text-red-500 text-xs mt-1">
                    {{ $errors->first('title') }}</p>
            @endif
        </div>
        <div>
            <label
                for="salary"
                class="block text-sm font-medium text-gray-700"
            >
                Salary:
            </label>
            <input
                type="number"
                id="salary"
                name="salary"
                placeholder="100000"
                value="{{ $job->salary }}"
                pattern="\d*"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                onkeydown="if(event.key === 'e' || event.key === 'E' || event.key === '-' || event.key === '+'){ event.preventDefault(); }"
            >
            @if ($errors->has('salary'))
                <p class="text-red-500 text-xs mt-1">
                    {{ $errors->first('salary') }}</p>
            @endif
        </div>

        <div class="flex justify-between">
            <button
                form="delete-form"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
            >
                Delete
            </button>
            <div class="flex space-x-2">
                <a
                    href="/jobs/{{ $job->id }}"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Edit Job
                </button>
            </div>
        </div>
    </form>

    <form
        class="hidden"
        id="delete-form"
        method="POST"
        action="/jobs/{{ $job->id }}"
    >
        @csrf
        @method('DELETE')
    </form>
</x-layout>
