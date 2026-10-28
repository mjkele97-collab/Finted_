<footer class="site-footer mt-5">
    <div class="container py-5">
        <div class="row g-4">

            {{-- Brand --}}
            <section class="col-12 col-md-6 col-lg-3">
                <div class="align-items-center">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo"
                            style="height: 25px; width: auto; object-fit: contain;">
                    </a>
                </div>
                <p class="footer-muted mb-0 mt-2 footer-descrizione">
                    {{ __('ui.footer-descrizione') }}
                </p>
            </section>

            {{-- Navigazione --}}
            <nav class="col-6 col-md-3 col-lg-2" aria-label="Navigazione footer">
                <h2 class="h6 mb-3 esplora">{{ __('ui.esplora') }}</h2>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="{{ url('/') }}" class="home">{{ __('ui.home') }}</a></li>
                    <li><a href="{{ $link('tutti-gli-articoli') }}"
                            class="tutti-gli-annunci">{{ __('ui.tutti-gli-annunci') }}</a></li>
                    <li><a href="{{ $link('crea-articolo') }}"
                            class="inserisci-annuncio">{{ __('ui.inserisci-annuncio') }}</a></li>
                    <li><a href="{{ $link('become.revisor') }}" class="lavora-con-noi">{{ __('ui.lavora-con-noi') }}</a>
                    </li>
                    @guest
                        <li><a href="{{ $link('login') }}" class="accedi">{{ __('ui.accedi') }}</a></li>
                        <li><a href="{{ $link('register') }}" class="registrati">{{ __('ui.registrati') }}</a></li>
                    @endguest
                </ul>
            </nav>

            {{-- Contatti --}}
            <section class="col-12 col-md-6 col-lg-4" aria-label="Contatti">
                <h2 class="h6 mb-3 contatti">{{ __('ui.contatti') }}</h2>
                <ul class="list-unstyled row row-cols-1 row-cols-sm-2 g-3 mb-0">
                    @foreach ($team as $persona)
                        <li class="col d-flex flex-column">
                            <span class="site-footer__name">{{ $persona['nome'] }}</span>
                            <a href="mailto:{{ $persona['email'] }}">{{ $persona['email'] }}</a>
                            <a href="tel:{{ preg_replace('/\s+/', '', $persona['tel']) }}">{{ $persona['tel'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </section>

            {{-- Informazioni --}}
            <nav class="col-6 col-md-3 col-lg-3" aria-label="Informazioni legali">
                <h2 class="h6 mb-3 informazioni">{{ __('ui.informazioni') }}</h2>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="{{ route('chi-siamo') }}" class="chi-siamo">{{ __('ui.chi-siamo') }}</a></li>
                    <li><a href="{{ route('privacy') }}" class="privacy">{{ __('ui.privacy') }}</a></li>
                    <li><a href="{{ route('termini-e-condizioni') }}"
                            class="termini-e-condizioni">{{ __('ui.termini-e-condizioni') }}</a></li>
                </ul>
            </nav>
        </div>
    </div>

    {{-- Barra finale --}}
    <div class="site-footer__bottom">
        <div class="container py-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
            <small class="footer-muted">&copy; {{ date('Y') }} {{ config('app.name') }}. <span
                    class="tutti-i-diritti-riservati">{{ __('ui.tutti-i-diritti-riservati') }}</span></small>
            <a href="#top" class="site-footer__top torna-su">{{ __('ui.torna-su') }} &uarr;</a>
        </div>
    </div>
</footer>