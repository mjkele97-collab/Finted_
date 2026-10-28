<x-layout>
    <x-slot name="title">
        {{ __('ui.privacy_page.page_title') }}
    </x-slot>

    <main class="container privacy-page py-5">
        <nav aria-label="{{ __('ui.privacy_page.breadcrumb_label') }}" class="mb-4">
            <ol class="breadcrumb privacy-breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('ui.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('ui.privacy') }}</li>
            </ol>
        </nav>

        <header class="privacy-hero card mb-4">
            <div class="card-body p-4 p-md-5">
                <span class="badge rounded-pill privacy-badge mb-3">{{ __('ui.privacy_page.badge') }}</span>
                <h1 class="display-6 fw-bold mb-3">{{ __('ui.privacy_page.title') }}</h1>
                <p class="lead privacy-muted mb-0">
                    {{ __('ui.privacy_page.intro') }}
                </p>
            </div>
        </header>

        <div class="row g-4 align-items-start">
            <aside class="col-12 col-lg-3" aria-label="{{ __('ui.privacy_page.toc_label') }}">
                <nav class="privacy-toc card p-3" aria-label="{{ __('ui.privacy_page.toc_label') }}">
                    <h2 class="privacy-toc-title px-2 pt-2 pb-1">{{ __('ui.privacy_page.toc_title') }}</h2>
                    <a class="privacy-toc-link" href="#raccolta">
                        <i class="bi bi-database me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.toc_collection') }}
                    </a>
                    <a class="privacy-toc-link" href="#utilizzo">
                        <i class="bi bi-cpu me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.toc_usage') }}
                    </a>
                    <a class="privacy-toc-link" href="#condivisione">
                        <i class="bi bi-share me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.toc_sharing') }}
                    </a>
                    <a class="privacy-toc-link" href="#sicurezza">
                        <i class="bi bi-shield-lock me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.toc_security') }}
                    </a>
                    <a class="privacy-toc-link" href="#diritti">
                        <i class="bi bi-person-check me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.toc_rights') }}
                    </a>
                    <a class="privacy-toc-link" href="#contatti">
                        <i class="bi bi-envelope me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.toc_contact') }}
                    </a>
                </nav>
            </aside>

            <div class="col-12 col-lg-9">
                <div class="privacy-content card">
                    <div class="card-body p-3 p-md-5">
                        <section id="raccolta" class="privacy-section-card">
                            <div class="privacy-icon-box" aria-hidden="true">
                                <i class="bi bi-database-fill"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.privacy_page.collection_title') }}</h2>
                            <p class="privacy-muted">{{ __('ui.privacy_page.collection_intro') }}</p>
                            <div class="row g-3 mt-2">
                                <div class="col-12 col-md-6">
                                    <div class="privacy-data-card h-100 p-3">
                                        <h3 class="h6 fw-bold mb-2">
                                            <i class="bi bi-person-badge me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.account_title') }}
                                        </h3>
                                        <p class="privacy-muted small mb-0">
                                            {{ __('ui.privacy_page.account_text') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="privacy-data-card h-100 p-3">
                                        <h3 class="h6 fw-bold mb-2">
                                            <i class="bi bi-bag-check me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.listings_title') }}
                                        </h3>
                                        <p class="privacy-muted small mb-0">
                                            {{ __('ui.privacy_page.listings_text') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="utilizzo" class="privacy-section-card">
                            <div class="privacy-icon-box" aria-hidden="true">
                                <i class="bi bi-cpu-fill"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.privacy_page.usage_title') }}</h2>
                            <p class="privacy-muted">{{ __('ui.privacy_page.usage_intro') }}</p>
                            <ul class="privacy-list mb-0">
                                <li class="mb-2">
                                    <strong>{{ __('ui.privacy_page.service_label') }}</strong>
                                    {{ __('ui.privacy_page.service_text') }}
                                </li>
                                <li class="mb-2">
                                    <strong>{{ __('ui.privacy_page.moderation_label') }}</strong>
                                    {{ __('ui.privacy_page.moderation_text') }}
                                </li>
                                <li>
                                    <strong>{{ __('ui.privacy_page.legal_label') }}</strong>
                                    {{ __('ui.privacy_page.legal_text') }}
                                </li>
                            </ul>
                        </section>

                        <section id="condivisione" class="privacy-section-card">
                            <div class="privacy-icon-box" aria-hidden="true">
                                <i class="bi bi-share-fill"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.privacy_page.sharing_title') }}</h2>
                            <p class="privacy-muted mb-3">{{ __('ui.privacy_page.sharing_intro') }}</p>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="privacy-tag">
                                    <i class="bi bi-server me-1" aria-hidden="true"></i>{{ __('ui.privacy_page.technical_suppliers') }}
                                </span>
                                <span class="privacy-tag">
                                    <i class="bi bi-shield-exclamation me-1" aria-hidden="true"></i>{{ __('ui.privacy_page.authorities') }}
                                </span>
                            </div>
                        </section>

                        <section id="sicurezza" class="privacy-section-card">
                            <div class="privacy-icon-box" aria-hidden="true">
                                <i class="bi bi-shield-lock-fill"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.privacy_page.security_title') }}</h2>
                            <p class="privacy-muted mb-0">{{ __('ui.privacy_page.security_text') }}</p>
                        </section>

                        <section id="diritti" class="privacy-section-card">
                            <div class="privacy-icon-box" aria-hidden="true">
                                <i class="bi bi-person-check-fill"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.privacy_page.rights_title') }}</h2>
                            <p class="privacy-muted mb-3">{{ __('ui.privacy_page.rights_intro') }}</p>
                            <ul class="privacy-rights list-unstyled row g-2 mb-0">
                                <li class="col-12 col-sm-6">
                                    <div class="privacy-right-item">
                                        <i class="bi bi-check2 me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.rights.access') }}
                                    </div>
                                </li>
                                <li class="col-12 col-sm-6">
                                    <div class="privacy-right-item">
                                        <i class="bi bi-check2 me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.rights.rectification') }}
                                    </div>
                                </li>
                                <li class="col-12 col-sm-6">
                                    <div class="privacy-right-item">
                                        <i class="bi bi-check2 me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.rights.erasure') }}
                                    </div>
                                </li>
                                <li class="col-12 col-sm-6">
                                    <div class="privacy-right-item">
                                        <i class="bi bi-check2 me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.rights.restriction') }}
                                    </div>
                                </li>
                                <li class="col-12 col-sm-6">
                                    <div class="privacy-right-item">
                                        <i class="bi bi-check2 me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.rights.portability') }}
                                    </div>
                                </li>
                                <li class="col-12 col-sm-6">
                                    <div class="privacy-right-item">
                                        <i class="bi bi-check2 me-2" aria-hidden="true"></i>{{ __('ui.privacy_page.rights.objection') }}
                                    </div>
                                </li>
                            </ul>
                            <p class="privacy-muted small mt-3 mb-0">
                                {{ __('ui.privacy_page.complaint') }}
                            </p>
                        </section>

                        <section id="contatti" class="privacy-section-card privacy-contact-card mb-0">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="privacy-icon-box mb-0" aria-hidden="true">
                                    <i class="bi bi-envelope-paper-fill"></i>
                                </div>
                                <div>
                                    <h2 class="h5 fw-bold mb-1">{{ __('ui.privacy_page.contact_title') }}</h2>
                                    <p class="privacy-muted small mb-0">
                                        {{ __('ui.privacy_page.contact_text') }}
                                    </p>
                                </div>
                            </div>
                            <a href="mailto:privacy@finted.it" class="btn privacy-contact-button">
                                <i class="bi bi-envelope-fill me-2" aria-hidden="true"></i>
                                privacy@finted.it
                            </a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>