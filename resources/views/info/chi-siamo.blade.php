<x-layout>
    <x-slot name="title">
        Finted | {{ __('ui.chi-siamo') }}
    </x-slot>

    <div class="container py-5">

        {{-- Introduzione --}}
        <section class="mb-5 pb-3">
            <span class="badge rounded-pill about-pill mb-3">{{ __('ui.about.badge') }}</span>
            <h1 class="display-5 fw-bold text-white about-title">{{ __('ui.about.title') }}</h1>
            <p class="lead text-soft mt-3 about-lead">{{ __('ui.about.intro') }}</p>
        </section>

        {{-- Valori --}}
        <section class="mb-5 pb-3">
            <h2 class="h3 fw-semibold text-white mb-4">{{ __('ui.about.values_title') }}</h2>
            <div class="row g-3">

                <div class="col-12 col-md-4">
                    <div class="card about-card h-100">
                        <div class="card-body">
                            <div class="about-icon mb-3" aria-hidden="true"><i class="bi bi-recycle"></i></div>
                            <h3 class="card-title h5 fw-semibold text-white">
                                {{ __('ui.about.values.sustainability.title') }}
                            </h3>
                            <p class="card-text text-soft small">{{ __('ui.about.values.sustainability.text') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card about-card h-100">
                        <div class="card-body">
                            <div class="about-icon mb-3" aria-hidden="true"><i class="bi bi-shield-check"></i></div>
                            <h3 class="card-title h5 fw-semibold text-white">{{ __('ui.about.values.trust.title') }}</h3>
                            <p class="card-text text-soft small">{{ __('ui.about.values.trust.text') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card about-card h-100">
                        <div class="card-body">
                            <div class="about-icon mb-3" aria-hidden="true"><i class="bi bi-lightning-charge"></i></div>
                            <h3 class="card-title h5 fw-semibold text-white">{{ __('ui.about.values.simplicity.title') }}
                            </h3>
                            <p class="card-text text-soft small">{{ __('ui.about.values.simplicity.text') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Come funziona --}}
        <section class="mb-5 pb-3">
            <h2 class="h3 fw-semibold text-white mb-4">{{ __('ui.about.how_title') }}</h2>
            <div class="row g-3">

                <div class="col-12 col-md-4">
                    <div class="card about-card h-100">
                        <div class="card-body">
                            <span class="badge about-step mb-3">{{ __('ui.about.step') }} 1</span>
                            <h3 class="card-title h5 fw-semibold text-white">{{ __('ui.about.steps.publish.title') }}</h3>
                            <p class="card-text text-soft small">{{ __('ui.about.steps.publish.text') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card about-card h-100">
                        <div class="card-body">
                            <span class="badge about-step mb-3">{{ __('ui.about.step') }} 2</span>
                            <h3 class="card-title h5 fw-semibold text-white">{{ __('ui.about.steps.review.title') }}</h3>
                            <p class="card-text text-soft small">{{ __('ui.about.steps.review.text') }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card about-card h-100">
                        <div class="card-body">
                            <span class="badge about-step mb-3">{{ __('ui.about.step') }} 3</span>
                            <h3 class="card-title h5 fw-semibold text-white">{{ __('ui.about.steps.sell.title') }}</h3>
                            <p class="card-text text-soft small">{{ __('ui.about.steps.sell.text') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Team --}}
        <section class="mb-5 pb-3">
            <h2 class="h3 fw-semibold text-white mb-4">{{ __('ui.about.team_title') }}</h2>
            <div class="row g-3">

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card about-card h-100">
                        <div class="card-body">
                            <div class="about-avatar mb-3" aria-hidden="true">IV</div>
                            <h3 class="card-title h5 fw-semibold text-white">Ivan</h3>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card about-card h-100">
                        <div class="card-body">
                            <div class="about-avatar mb-3" aria-hidden="true">MI</div>
                            <h3 class="card-title h5 fw-semibold text-white">Mikele</h3>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card about-card h-100">
                        <div class="card-body">
                            <div class="about-avatar mb-3" aria-hidden="true">FA</div>
                            <h3 class="card-title h5 fw-semibold text-white">Fabio</h3>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card about-card h-100">
                        <div class="card-body">
                            <div class="about-avatar mb-3" aria-hidden="true">NA</div>
                            <h3 class="card-title h5 fw-semibold text-white">Nadeesh</h3>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- Invito finale --}}
        <section
            class="about-cta rounded-4 p-4 p-md-5 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <h2 class="h3 fw-bold mb-1 about-cta-title">{{ __('ui.about.cta_title') }}</h2>
                <p class="mb-0 about-cta-text">{{ __('ui.about.cta_text') }}</p>
            </div>
            <a href="{{ route('crea-articolo') }}" class="btn rounded-pill px-4 py-2 fw-semibold about-cta-btn">
                {{ __('ui.about.cta_button') }}
            </a>
        </section>

    </div>
</x-layout>