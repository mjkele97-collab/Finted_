<x-layout>
    <x-slot name="title">
        Finted | {{ __('ui.registrati') }}
    </x-slot>

    <div class="auth-page-container">
        <div class="auth-grid">

            <!-- ================= COLONNA SINISTRA ================= -->
            <div class="auth-col-left">
                <!-- Testo centrale -->
                <div class="my-auto py-3">
                    <h1 class="auth-heading fw-bold text-primary mb-3 auth-titolo">
                        {{ __('ui.auth-titolo') }}
                    </h1>
                    <p class="auth-muted fs-6 mb-4 auth-register-sottotitolo">
                        {{ __('ui.auth-register-sottotitolo') }}
                    </p>

                    <!-- Le 3 pillole -->
                    <div class="auth-step-list d-flex gap-2">
                        <span class="auth-step-pill step-registrati">{{ __('ui.step-registrati') }}</span>
                        <span class="auth-step-pill step-inserisci-annuncio">{{ __('ui.step-inserisci-annuncio') }}</span>
                        <span class="auth-step-pill step-libera-spazio">{{ __('ui.step-libera-spazio') }}</span>
                    </div>
                </div>

                <!-- Cerchio decorativo in basso a sinistra -->
                <div class="pt-4">
                    <div class="auth-circle-shape"></div>
                </div>
            </div>

            <!-- ================= COLONNA DESTRA ================= -->
            <div class="auth-col-right">
                <!-- Switch in alto a destra: [ Accedi | Registrati ] -->
                <div class="auth-switch-pill mb-4">
                    <a href="{{ route('login') }}" class="accedi">{{ __('ui.accedi') }}</a>
                    <a href="{{ route('register') }}" class="active registrati">{{ __('ui.registrati') }}</a>
                </div>

                <!-- Form Registrazione -->
                <div class="auth-form-content">
                    <form method="POST" action="{{ route('register') }}" novalidate>
                        @csrf

                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="name" class="form-label auth-muted small mb-1 nome">{{ __('ui.nome') }}</label>
                            <input id="name" type="text" name="name"
                                   class="form-control auth-input placeholder-nome @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" placeholder="{{ __('ui.placeholder-nome') }}"
                                   required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback ps-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label auth-muted small mb-1 email">{{ __('ui.email') }}</label>
                            <input id="email" type="email" name="email"
                                   class="form-control auth-input placeholder-email @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="{{ __('ui.placeholder-email') }}"
                                   required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback ps-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label auth-muted small mb-1 password">{{ __('ui.password') }}</label>
                            <input id="password" type="password" name="password"
                                   class="form-control auth-input placeholder-password-register @error('password') is-invalid @enderror"
                                   placeholder="{{ __('ui.placeholder-password-register') }}"
                                   required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback ps-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Conferma Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label auth-muted small mb-1 conferma-password">{{ __('ui.conferma-password') }}</label>
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                   class="form-control auth-input placeholder-conferma-password"
                                   placeholder="{{ __('ui.placeholder-conferma-password') }}"
                                   required autocomplete="new-password">
                        </div>

                        <!-- Bottone Invio Form -->
                        <button type="submit" class="btn auth-btn mb-3 registrati-e-inserisci-annuncio">
                            {{ __('ui.registrati-e-inserisci-annuncio') }}
                        </button>

                        <!-- Link Login -->
                        <p class="text-center auth-muted small mb-0 hai-gia-un-account">
                            {{ __('ui.hai-gia-un-account') }} <a href="{{ route('login') }}" class="text-accent text-decoration-none fw-semibold accedi">{{ __('ui.accedi') }}</a>
                        </p>
                    </form>
                </div>

                <!-- Spazio per bilanciare la colonna in basso -->
                <div></div>
            </div>

        </div>
    </div>
</x-layout>