<x-layout>
    <main>
        <x-slot:heading>Job: {{ $job['title'] }}</x-slot:heading>
        <p>This job will be paying: <span
                class="font-bold text-gray-600">{{ $job['salary'] }}</span> </p>
        <div class="my-5">
            <a
                href="{{ url("jobs/{$job['id']}/edit") }}"
                class="bg-blue-500 text-white px-4 py-2 rounded"
            >Edit Job</a>
        </div>
    </main>
    <x-footer />
</x-layout>
