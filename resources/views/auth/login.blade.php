<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>
    <form
        method="POST"
        action="/login"
    >
        @csrf
        <div class="form-group">
            <x-form-label for="email">Email</x-form-label>

            <x-form-input
                id="email"
                type="email"
                name="email"
                class="my-2"
                :value="old('email')"
            />
            <x-form-error name="email" />
        </div>

        <div class="form-group">
            <x-form-label for="password">Password</x-form-label>
            <x-form-input
                id="password"
                type="password"
                name="password"
                class="my-2"
            />
            <x-form-error name="password" />
        </div>

        <div class="form-group mt-5">
            <x-form-button>
                Login
            </x-form-button>
        </div>
    </form>
</x-layout>
