const carousel = document.getElementById('article-carousel');

if (carousel) {
    const counter = carousel.querySelector('#carousel-counter');
    const thumbs = document.querySelectorAll('.show-thumb-btn');
    const total = carousel.querySelectorAll('.carousel-item').length;

    carousel.addEventListener('slid.bs.carousel', (event) => {
        if (counter) {
            counter.textContent = `${event.to + 1}/${total}`;
        }

        thumbs.forEach((thumb, index) => {
            thumb.classList.toggle('active', index === event.to);
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const timerElement = document.getElementById('promo-countdown');
    if (!timerElement) return;

    // 59 minuti e 59 secondi in totale
    let remainingSeconds = (59 * 60) + 59;

    const interval = setInterval(() => {
        const minutes = Math.floor(remainingSeconds / 60);
        const seconds = remainingSeconds % 60;

        // Formattazione con zero iniziale (es. 09:05)
        const formattedMinutes = String(minutes).padStart(2, '0');
        const formattedSeconds = String(seconds).padStart(2, '0');

        timerElement.textContent = `${formattedMinutes}:${formattedSeconds}`;

        if (remainingSeconds <= 0) {
            clearInterval(interval);
            timerElement.textContent = "Offerta scaduta!";
        } else {
            remainingSeconds--;
        }
    }, 1000);
});
