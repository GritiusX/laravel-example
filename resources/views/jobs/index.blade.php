<x-layout>
    <main class="h-full">
        <x-slot:heading>Jobs Listing <x-job-button>+ Create
                Job</x-job-button>
        </x-slot:heading>
        @foreach ($jobs as $job)
            <a
                href="/jobs/{{ $job['id'] }}"
                class="cursor-pointer"
            >
                <div class="p-4 bg-white shadow-lg rounded-lg mb-2">
                    <h2 class="text-xl font-bold">{{ $job['title'] }}</h2>
                    <h2 class="text-lg text-gray-600">
                        {{ $job->employer->name }}
                    </h2>
                    <p class="text-gray-600 mt-3">Salary:
                        ${{ $job['salary'] }}
                    </p>
                </div>
            </a>
        @endforeach
        <div class="mt-8">


        </div>
        <div class="my-5">
            {{ $jobs->links() }}
        </div>

    </main>
    <x-footer />
</x-layout>
