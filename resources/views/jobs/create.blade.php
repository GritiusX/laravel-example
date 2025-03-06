<x-layout>
    <x-slot:heading>Create a job</x-slot:heading>

    <form
        method="POST"
        action="/jobs"
        class="space-y-6"
    >
        @csrf
        <div>
            <x-form-label for="title">Title:</x-form-label>

            <x-form-input
                type="text"
                id="title"
                name="title"
                placeholder="Software Engineer"
            />
            <x-form-error name="title" />
        </div>
        <div>
            <x-form-label for="salary">Salary:</x-form-label>

            <x-form-input
                type="text"
                id="salary"
                name="salary"
                placeholder="100000"
                pattern="\d*"
                oninput="this.value = this.value.replace(/[^0-9]/g, '');"
            />
            <x-form-error name="salary" />
        </div>

        <div>
            <x-form-button>
                Crear Job
            </x-form-button>
        </div>
    </form>
</x-layout>
