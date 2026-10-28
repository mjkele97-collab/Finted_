<nav class="navbar navbar-expand-lg custom-navbar py-3 sticky-top">
  <div class="container-fluid px-0 navbar-layout {{ Auth::check() ? 'navbar-auth' : 'navbar-guest' }}">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img class="navbar-logo" src="{{ asset('images/logo.png') }}" alt="Logo">
    </a>

    <div class="navbar-content">
      <div class="navbar-navigation align-items-center gap-2">
        <ul class="navbar-nav navbar-links mb-2 mb-lg-0 gap-lg-2 justify-content-end">
          <li class="nav-item nav-item-articles">
            <a class="nav-link custom-nav-link articoli"
              href="{{ route('tutti-gli-articoli') }}">{{ __('ui.articoli') }}</a>
          </li>
          @auth
            @if (Auth::user()->is_revisor)
              <li class="nav-item nav-item-review">
                <a class="nav-link custom-nav-link nav-link-with-badge revisiona-articoli"
                  href="{{ route('revisor.index') }}">
                  {{ __('ui.revisiona-articoli') }}
                  @if (\App\Models\Article::toBeRevisionedCount() > 0)
                    <span class="badge-notification">
                      {{ \App\Models\Article::toBeRevisionedCount() }}
                      <span class="visually-hidden articoli-da-revisionare">{{ __('ui.articoli-da-revisionare') }}</span>
                    </span>
                  @endif
                </a>
              </li>
            @endif
            <li class="nav-item nav-item-create">
              <a class="nav-link custom-nav-link inserisci-annuncio"
                href="{{ route('crea-articolo') }}">{{ __('ui.inserisci-annuncio') }}</a>
            </li>
          @endauth
          <li class="nav-item nav-item-categories">
            <button class="nav-link custom-nav-link dropdown-toggle categories-toggle categorie" type="button"
              id="categoriesDropdown" data-bs-toggle="collapse" data-bs-target="#navbarCategoryPanel"
              aria-expanded="{{ request()->query('categories') === 'open' ? 'true' : 'false' }}"
              aria-controls="navbarCategoryPanel">
              {{ __('ui.categorie') }}
            </button>
          </li>
        </ul>

        @guest
          @unless (request()->routeIs('login', 'register'))
            <div class="navbar-guest-actions d-flex align-items-center gap-2">
              <a href="{{ route('login') }}"
                class="btn btn-custom-outline align-items-center accedi">{{ __('ui.accedi') }}</a>
              <a href="{{ route('register') }}"
                class="btn btn-custom-accent align-items-center registrati">{{ __('ui.registrati') }}</a>
            </div>
          @endunless
        @endguest
      </div>

      <div class="navbar-search-group">
        <form class="navbar-search d-flex flex-grow-1" role="search" action="{{ route('article.search') }}">
          <input name="query" class="form-control custom-search cerca-placeholder" type="search"
            placeholder="{{ __('ui.cerca-placeholder') }}" aria-label="{{ __('ui.cerca') }}" wire:model="search"
            required />
        </form>

        {{-- Dropdown per la selezione della lingua --}}
        @php
          $current = app()->getLocale();
        @endphp
        <div class="dropdown language-dropdown">
          <button class="btn btn-custom-outline dropdown-toggle language-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false" aria-label="Lingua: {{ $languages[$current]['name'] ?? 'Italiano' }}">
            <span class="language-current" inert>
              <x-locale :nation="$languages[$current]['nation'] ?? 'it'" />
            </span>
          </button>

          <ul class="dropdown-menu dropdown-menu-end custom-dropdown-menu language-menu">
            @foreach ($languages as $code => $language)
              <li class="language-item {{ $current === $code ? 'active' : '' }}">
                <form action="{{ route('language', $code) }}" method="POST" class="language-form">
                  @csrf
                  <button type="submit" class="language-option" @if ($current === $code) aria-current="true" @endif>
                    <x-locale :nation="$language['nation']" />
                    <span class="language-name">{{ $language['name'] }}</span>
                  </button>
                </form>
              </li>
            @endforeach
          </ul>
        </div>

        <div class="navbar-actions d-flex align-items-center gap-2">
          @auth
            <div class="dropdown">
              <button class="btn btn-custom-outline dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="ciao">{{ __('ui.ciao') }},&nbsp;</span> 
                <span class="navbar-user-name">{{ Auth::user()->name }}</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end custom-dropdown-menu">
                <li>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item custom-dropdown-item logout" type="submit">{{ __('ui.logout') }}</button>
                  </form>
                </li>
              </ul>
            </div>
          @else
            @unless (request()->routeIs('login', 'register'))
              <div class="navbar-desktop-auth-actions align-items-center gap-2">
                <a href="{{ route('login') }}"
                  class="btn btn-custom-outline align-items-center accedi">{{ __('ui.accedi') }}</a>
                <a href="{{ route('register') }}"
                  class="btn btn-custom-accent align-items-center registrati">{{ __('ui.registrati') }}</a>
              </div>
            @endunless
          @endauth
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-0 pb-3">
    <div class="collapse navbar-category-panel {{ request()->query('categories') === 'open' ? 'show' : '' }}"
      id="navbarCategoryPanel">
      <div class="navbar-category-pills">
        <a href="{{ route('tutti-gli-articoli', ['categories' => 'open']) }}" wire:navigate
          class="category-pill {{ request()->routeIs('tutti-gli-articoli') ? 'btn-custom-accent' : 'btn-custom-outline' }} text-nowrap tutti">
          {{ __('ui.tutti') }}
        </a>
        @foreach($categories as $category)
          <a href="{{ route('categoria', ['category' => $category, 'categories' => 'open']) }}" wire:navigate
            class="category-pill {{ request()->routeIs('categoria') && (int) $currentCategoryId === (int) $category->id ? 'btn-custom-accent' : 'btn-custom-outline' }} text-nowrap">
            {{ __('ui.' . $category->name) }}
          </a>
        @endforeach
      </div>
    </div>
  </div>
</nav>