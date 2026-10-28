<x-layout>
    <x-slot name="title">
        Finted | {{ __('ui.lavora-con-noi') }}
    </x-slot>

    <div class="container-fluid py-5">
        <section class="revisor-request-page mx-auto" aria-labelledby="revisor-request-title">
            <header class="text-center mb-4">
                <span class="badge-accent mb-3 unisciti-al-team">{{ __('ui.unisciti-al-team') }}</span>
                <h1 id="revisor-request-title" class="h2 fw-bold text-primary mb-2 lavora-con-noi">
                    {{ __('ui.lavora-con-noi') }}
                </h1>
                <p class="text-secondary mb-0 revisor-request-sottotitolo">
                    {{ __('ui.revisor-request-sottotitolo') }}
                </p>
            </header>

            <div class="revisor-request-card">
                <div class="d-flex align-items-start gap-3 mb-4">
                    <span class="revisor-request-icon" aria-hidden="true">
                        <i class="bi bi-envelope-paper"></i>
                    </span>
                    <div>
                        <h2 class="h5 fw-bold text-primary mb-1 la-tua-candidatura">{{ __('ui.la-tua-candidatura') }}</h2>
                        <p class="text-secondary small mb-0 candidatura-info">
                            {{ __('ui.candidatura-info') }}
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('become.revisor.send') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="subject" class="form-label text-primary fw-semibold oggetto">{{ __('ui.oggetto') }}</label>
                        <input
                            id="subject"
                            name="subject"
                            type="text"
                            value="{{ old('subject') }}"
                            maxlength="150"
                            required
                            class="form-control revisor-request-input placeholder-candidatura-oggetto @error('subject') is-invalid @enderror"
                            placeholder="{{ __('ui.placeholder-candidatura-oggetto') }}"
                            aria-describedby="subject-hint"
                        >
                        <div id="subject-hint" class="form-text text-secondary massimo-150-caratteri">
                            {{ __('ui.massimo-150-caratteri') }}
                        </div>
                        @error('subject')
                            <div id="subject-error" class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="body" class="form-label text-primary fw-semibold messaggio">{{ __('ui.messaggio') }}</label>
                        <textarea
                            id="body"
                            name="body"
                            rows="7"
                            maxlength="5000"
                            required
                            class="form-control revisor-request-input revisor-request-textarea placeholder-candidatura-messaggio @error('body') is-invalid @enderror"
                            placeholder="{{ __('ui.placeholder-candidatura-messaggio') }}"
                            aria-describedby="body-hint"
                        >{{ old('body') }}</textarea>
                        <div id="body-hint" class="form-text text-secondary massimo-5000-caratteri">
                            {{ __('ui.massimo-5000-caratteri') }}
                        </div>
                        @error('body')
                            <div id="body-error" class="invalid-feedback" role="alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn auth-btn invia-la-candidatura">
                        {{ __('ui.invia-la-candidatura') }}
                        <i class="bi bi-arrow-right ms-2" aria-hidden="true"></i>
                    </button>
                </form>

                <p class="text-secondary small text-center mt-3 mb-0 richiesta-valutata-info">
                    {{ __('ui.richiesta-valutata-info') }}
                </p>
            </div>
        </section>
    </div>
</x-layout>
