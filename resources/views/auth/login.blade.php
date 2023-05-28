<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 align-items: center;" :errors="$errors" />

        <div class="container d-flex justify-content-center">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="my-2">
                    <x-input class="form-control" placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="my-2">
                    <x-input class="form-control" placeholder="Senha" id="password" type="password" name="password" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-3">
                    <label for="remember_me" class="inline-flex">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Lembre de mim') }}</span>
                    </label>
                </div>

                <!-- Forgot password -->
                <div class="flex items-center my-3">
                    <x-button class="me-1 btn btn-danger">
                        {{ __('Login') }}
                    </x-button>
                    <a class="mx-1 text-sm btn btn-dark" href="{{ route('register') }}">
                        {{ __('Registrar') }}
                    </a>
                    @if (Route::has('password.request'))
                    <a class="ms-1 text-sm link-danger" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>