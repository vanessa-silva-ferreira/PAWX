document.addEventListener('DOMContentLoaded', () => {
    const feedbackCarousel = document.getElementById('feedbackCarousel');
    const prevFeedback = document.getElementById('prevFeedback');
    const nextFeedback = document.getElementById('nextFeedback');

    if (!feedbackCarousel || !prevFeedback || !nextFeedback) {
        console.error("Elementos do carrossel de feedback não foram encontrados.");
        return;
    }

    const scrollAmount = 300;

    prevFeedback.addEventListener('click', () => {
        feedbackCarousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    nextFeedback.addEventListener('click', () => {
        feedbackCarousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });
});
