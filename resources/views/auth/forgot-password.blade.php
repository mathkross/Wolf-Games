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

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um e-mail com um link de redefinição de senha que permitirá que você escolha um novo.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input class="form-control block mt-1 w-full" placeholder="Email" id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="d-grid gap-2 col-12 my-2">
                <x-button class="btn btn-secondary">
                    {{ __('Link de redefinição de senha de e-mail') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>