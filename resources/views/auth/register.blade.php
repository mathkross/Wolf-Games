<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <div style="
                display: flex;
                flex-direction: column;
                flex-wrap: nowrap;
                justify-content: center;
                align-items: center;
                align-content: stretch;">
                    <img src="../images/shonnen.png" alt="E-vortex logo" style="width: 700px" />
                </div>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="container d-felx justofy-content-center">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="my-2">
                    <x-input class="form-control block mt-1 w-full" placeholder="Nome" id="name" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="my-2">
                    <x-input class="form-control block mt-1 w-full" placeholder="Email" id="email" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="my-2">
                    <x-input class="form-control block mt-1 w-full" placeholder="Senha" id="password" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="my-2">
                    <x-input class="form-control block mt-1 w-full" placeholder="Confirmar Senha" id="password_confirmation" type="password" name="password_confirmation" required />
                </div>

                <div class="flex items-center my-3">
                    <x-button class="ml-3 btn btn-dark">
                        {{ __('Registrar') }}
                    </x-button>

                    <a class="text-sm btn link-danger" href="{{ route('login') }}">
                        {{ __('Já registrado?') }}
                    </a>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>