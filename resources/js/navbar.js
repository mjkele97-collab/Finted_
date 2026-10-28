function initNavbarSearchMobile() {
    if (document.documentElement.dataset.mobileSearchBound === 'true') return;
    document.documentElement.dataset.mobileSearchBound = 'true';

    const expandSearch = function () {
        if (window.innerWidth < 992) {
            document.querySelector('.navbar-search-group')?.classList.add('search-expanded');
            document.querySelector('.navbar-layout')?.classList.add('search-expanded');
        }
    };

    const collapseSearch = function () {
        document.querySelector('.navbar-search-group')?.classList.remove('search-expanded');
        document.querySelector('.navbar-layout')?.classList.remove('search-expanded');
    };

    document.addEventListener('focusin', function (event) {
        if (event.target instanceof Element && event.target.matches('.navbar-search input[type="search"]')) {
            expandSearch();
        }
    });

    document.addEventListener('focusout', function (event) {
        if (event.target instanceof Element && event.target.matches('.navbar-search input[type="search"]')) {
            collapseSearch();
        }
    });

    document.addEventListener('pointerdown', function (event) {
        if (window.innerWidth >= 992) return;
        if (!(event.target instanceof Element) || event.target.closest('.navbar-search')) return;

        const searchInput = document.querySelector('.navbar-search input[type="search"]');
        if (searchInput === document.activeElement) searchInput.blur();
        collapseSearch();
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initNavbarSearchMobile);
} else {
    initNavbarSearchMobile();
}

document.addEventListener('livewire:navigated', initNavbarSearchMobile);
