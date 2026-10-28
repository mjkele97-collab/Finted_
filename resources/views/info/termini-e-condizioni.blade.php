<x-layout>
    <x-slot name="title">
        {{ __('ui.terms_page.page_title') }}
    </x-slot>

    <main class="container terms-page py-5">
        <nav aria-label="{{ __('ui.terms_page.breadcrumb_label') }}" class="mb-4">
            <ol class="breadcrumb terms-breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('ui.home') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('ui.termini-e-condizioni') }}</li>
            </ol>
        </nav>

        <header class="terms-hero card mb-4">
            <div class="card-body p-4 p-md-5">
                <span class="badge rounded-pill terms-badge mb-3">{{ __('ui.terms_page.badge') }}</span>
                <h1 class="display-6 fw-bold mb-3">{{ __('ui.terms_page.title') }}</h1>
                <p class="lead terms-muted mb-0">{{ __('ui.terms_page.intro') }}</p>
            </div>
        </header>

        <div class="row g-4 align-items-start">
            <aside class="col-12 col-lg-3" aria-label="{{ __('ui.terms_page.toc_label') }}">
                <nav class="terms-toc card p-3" aria-label="{{ __('ui.terms_page.toc_label') }}">
                    <h2 class="terms-toc-title px-2 pt-2 pb-1">{{ __('ui.terms_page.toc_title') }}</h2>
                    <a class="terms-toc-link" href="#account">{{ __('ui.terms_page.toc_account') }}</a>
                    <a class="terms-toc-link" href="#piattaforma">{{ __('ui.terms_page.toc_platform') }}</a>
                    <a class="terms-toc-link" href="#venditori">{{ __('ui.terms_page.toc_sellers') }}</a>
                    <a class="terms-toc-link" href="#acquirenti">{{ __('ui.terms_page.toc_buyers') }}</a>
                    <a class="terms-toc-link" href="#contestazioni">{{ __('ui.terms_page.toc_disputes') }}</a>
                    <a class="terms-toc-link" href="#modifiche">{{ __('ui.terms_page.toc_changes') }}</a>
                </nav>
            </aside>

            <div class="col-12 col-lg-9">
                <div class="terms-content card">
                    <div class="card-body p-3 p-md-5">
                        <section id="account" class="terms-section-card">
                            <div class="terms-icon-box" aria-hidden="true">
                                <i class="bi bi-person-badge"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.terms_page.account_title') }}</h2>
                            <p class="terms-muted mb-3">{{ __('ui.terms_page.account_text') }}</p>
                            <div class="terms-summary">
                                <strong>{{ __('ui.terms_page.summary_label') }}</strong>
                                {{ __('ui.terms_page.account_summary') }}
                            </div>
                        </section>

                        <section id="piattaforma" class="terms-section-card">
                            <div class="terms-icon-box" aria-hidden="true">
                                <i class="bi bi-shop"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.terms_page.platform_title') }}</h2>
                            <p class="terms-muted mb-3">{{ __('ui.terms_page.platform_text') }}</p>
                            <div class="terms-summary">
                                <strong>{{ __('ui.terms_page.summary_label') }}</strong>
                                {{ __('ui.terms_page.platform_summary') }}
                            </div>
                        </section>

                        <section id="venditori" class="terms-section-card">
                            <div class="terms-icon-box" aria-hidden="true">
                                <i class="bi bi-tag"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.terms_page.sellers_title') }}</h2>
                            <p class="terms-muted">{{ __('ui.terms_page.sellers_intro') }}</p>
                            <ul class="terms-list">
                                <li>{{ __('ui.terms_page.prohibited.counterfeit') }}</li>
                                <li>{{ __('ui.terms_page.prohibited.illegal') }}</li>
                                <li>{{ __('ui.terms_page.prohibited.misleading') }}</li>
                            </ul>
                            <div class="terms-summary">
                                <strong>{{ __('ui.terms_page.summary_label') }}</strong>
                                {{ __('ui.terms_page.sellers_summary') }}
                            </div>
                        </section>

                        <section id="acquirenti" class="terms-section-card">
                            <div class="terms-icon-box" aria-hidden="true">
                                <i class="bi bi-bag-check"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.terms_page.buyers_title') }}</h2>
                            <p class="terms-muted mb-3">{{ __('ui.terms_page.buyers_text') }}</p>
                            <div class="terms-summary">
                                <strong>{{ __('ui.terms_page.summary_label') }}</strong>
                                {{ __('ui.terms_page.buyers_summary') }}
                            </div>
                        </section>

                        <section id="contestazioni" class="terms-section-card">
                            <div class="terms-icon-box" aria-hidden="true">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.terms_page.disputes_title') }}</h2>
                            <p class="terms-muted mb-0">{{ __('ui.terms_page.disputes_text') }}</p>
                        </section>

                        <section id="modifiche" class="terms-section-card terms-contact-card mb-0">
                            <div class="terms-icon-box" aria-hidden="true">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <h2 class="h4 fw-bold mb-3">{{ __('ui.terms_page.changes_title') }}</h2>
                            <p class="terms-muted mb-4">{{ __('ui.terms_page.changes_text') }}</p>
                            <h3 class="h5 fw-bold mb-2">{{ __('ui.terms_page.contact_title') }}</h3>
                            <p class="terms-muted mb-3">{{ __('ui.terms_page.contact_text') }}</p>
                            <a href="mailto:supporto@finted.it" class="btn terms-contact-button">
                                <i class="bi bi-envelope-fill me-2" aria-hidden="true"></i>
                                supporto@finted.it
                            </a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
