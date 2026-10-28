<x-layout>
    <x-slot name="title">
        Finted | {{ __('ui.accedi') }}
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
                    <p class="auth-muted fs-6 mb-4 auth-login-sottotitolo">
                        {{ __('ui.auth-login-sottotitolo') }}
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
                    <a href="{{ route('login') }}" class="active accedi">{{ __('ui.accedi') }}</a>
                    <a href="{{ route('register') }}" class="registrati">{{ __('ui.registrati') }}</a>
                </div>

                <!-- Form centrato nella sua metà -->
                <div class="auth-form-content">
                    <form method="POST" action="{{ route('login') }}" novalidate>
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label auth-muted small mb-1 email">{{ __('ui.email') }}</label>
                            <input id="email" type="email" name="email"
                                   class="form-control auth-input placeholder-email @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" placeholder="{{ __('ui.placeholder-email') }}"
                                   required autofocus autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback ps-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label auth-muted small mb-1 password">{{ __('ui.password') }}</label>
                            <input id="password" type="password" name="password"
                                   class="form-control auth-input placeholder-password @error('password') is-invalid @enderror"
                                   placeholder="{{ __('ui.placeholder-password') }}"
                                   required autocomplete="current-password">
                            @error('password')
                                <div class="invalid-feedback ps-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ricordami & Password dimenticata -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            {{-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label auth-muted small" for="remember">Ricordami</label>
                            </div> --}}

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="small text-accent text-decoration-none password-dimenticata">
                                    {{ __('ui.password-dimenticata') }}
                                </a>
                            @endif
                        </div>

                        <!-- Bottone Invio Form -->
                        <button type="submit" class="btn auth-btn mb-3 accedi">
                            {{ __('ui.accedi') }}
                        </button>

                        <!-- Link Registrazione -->
                        <p class="text-center auth-muted small mb-0 non-hai-un-account">
                            {{ __('ui.non-hai-un-account') }} <a href="{{ route('register') }}" class="text-accent text-decoration-none fw-semibold registrati">{{ __('ui.registrati') }}</a>
                        </p>
                    </form>
                </div>

                <!-- Spazio per bilanciare la colonna in basso -->
                <div></div>
            </div>

        </div>
    </div>
</x-layout>