import pet1 from '../images/pet1.jpg';
import pet2 from '../images/pet2.jpg';
import pet3 from '../images/pet3.jpg';
import pet4 from '../images/pet4.jpg';
import pet5 from '../images/pet5.jpg';
import pet6 from '../images/pet6.jpg';
import pet7 from '../images/pet7.jpg';
import pet8 from '../images/pet8.jpg';
import pet9 from '../images/pet9.jpg';
import pet10 from '../images/pet10.jpg';

document.addEventListener('DOMContentLoaded', () => {
    const carouselContainer = document.querySelector('.carousel-container');
    const carouselImages = document.querySelector('.carousel-images');

    if (!carouselContainer || !carouselImages) return;

    const images = [pet2, pet4, pet9, pet10, pet3, pet2];
    const totalImages = images.length;

    for (let i = 0; i < 3; i++) {
        images.forEach((src) => {
            const img = document.createElement('img');
            img.src = src;
            img.alt = 'Carousel Image';
            img.style.height = '550px';
            img.style.width = 'auto';
            carouselImages.appendChild(img);
        });
    }

    let offset = 0;
    let totalCarouselWidth = 0;

    function initializeCarousel() {
        offset = 0;
        totalCarouselWidth = carouselImages.scrollWidth;
        carouselImages.style.transition = 'none';
        carouselImages.style.transform = `translateX(0px)`;
        carouselImages.offsetHeight;
        carouselImages.style.transition = 'transform 0.2s linear';
    }

    function scrollCarousel() {
        offset -= 1;

        if (Math.abs(offset) >= totalCarouselWidth / 3) {
            offset = 0;
            carouselImages.style.transition = 'none';
            carouselImages.style.transform = `translateX(${offset}px)`;
            carouselImages.offsetHeight;
            carouselImages.style.transition = 'transform 0.2s linear';
        }

        carouselImages.style.transform = `translateX(${offset}px)`;
        requestAnimationFrame(scrollCarousel);
    }

    window.addEventListener('load', () => {
        initializeCarousel();
        scrollCarousel();
    });

    window.addEventListener('resize', () => {
        initializeCarousel();
    });
});
