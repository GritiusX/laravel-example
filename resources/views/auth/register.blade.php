<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <form
        method="POST"
        action="/register"
    >
        @csrf

        <div class="form-group flex space-x-4">
            <div class="flex-1">
                <x-form-label for="first_name">First name</x-form-label>
                <x-form-input
                    type="text"
                    id="first_name"
                    name="first_name"
                    value="{{ old('first_name') }}"
                    autofocus
                    class="my-2"
                />
                <x-form-error name="first_name" />
            </div>
            <div class="flex-1">
                <x-form-label for="last_name">Last name</x-form-label>
                <x-form-input
                    type="text"
                    id="last_name"
                    name="last_name"
                    value="{{ old('last_name') }}"
                    autofocus
                    class="my-2"
                />
                <x-form-error name="last_name" />
            </div>
        </div>

        <div class="form-group">
            <x-form-label for="email">Email</x-form-label>

            <x-form-input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="my-2"
            />
            <x-form-error name="email" />
        </div>

        <div class="form-group">
            <x-form-label for="password">Password</x-form-label>
            <x-form-input
                id="password"
                type="password"
                name="password"
                value="{{ old('password') }}"
                class="my-2"
            />
            <x-form-error name="password" />
        </div>

        <div class="form-group">
            <x-form-label for="password_confirmation">Confirm
                Password</x-form-label>

            <x-form-input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                value="{{ old('password_confirmation') }}"
                class="my-2"
            />
            <x-form-error name="password_confirmation" />
        </div>

        <div class="form-group mt-5">
            <x-form-button>
                Register
            </x-form-button>
        </div>
    </form>
</x-layout>
