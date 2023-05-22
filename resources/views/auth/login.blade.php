<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                <div style="
                            display: flex;
                            flex-direction: column;
                            flex-wrap: nowrap;
                            justify-content: center;
                            align-items: center;
                            align-content: stretch;">
                    <!-- <img src="../images/shonnen.png" alt="E-vortex logo"  style="width: 70px; padding-bottom:5px" class=""/> -->
                    <img src="../images/shonnen.png" alt="E-vortex logo" style="width: 700px" />
                </div>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 align-items: center;" :errors="$errors" />
        <div class="container d-felx justofy-content-center">
            <form class="row g-3 p-1 align-items: center;" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input class="form-control" placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div>
                    <x-input class="form-control" placeholder="Senha" id="password" type="password" name="password" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot password -->
                <div class="flex items-center">
                    <x-button class="ml-3 btn btn-danger">
                        {{ __('Log in') }}
                    </x-button>
                    @if (Route::has('password.request'))
                    <a class="text-sm btn link-danger" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>
                <div>

                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>