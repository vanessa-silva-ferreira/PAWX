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

    if (!carouselContainer || !carouselImages) {
        console.error('Carousel elements not found!');
        return;
    }

    const images = [pet1, pet2, pet3, pet4, pet5, pet6, pet7, pet8, pet9, pet10];
    images.forEach((src) => {
        const img = document.createElement('img');
        img.src = src;
        img.alt = 'Carousel Image';
        carouselImages.appendChild(img);
    });

    let offset = 0;
    const totalImages = images.length;
    const imageWidth = carouselContainer.offsetWidth;

    carouselImages.style.display = 'flex';
    carouselImages.style.transition = 'transform 0.5s ease-in-out';

    function continuousScroll() {
        offset -= 1;
        carouselImages.style.transform = `translateX(${offset}px)`;

        if (Math.abs(offset) >= imageWidth * totalImages) {
            offset = 0;
            carouselImages.style.transition = 'none';
            carouselImages.style.transform = `translateX(${offset}px)`;
            carouselImages.offsetHeight; // Trigger reflow
            carouselImages.style.transition = 'transform 0.5s ease-in-out';
        }

        requestAnimationFrame(continuousScroll);
    }

    continuousScroll();

    window.addEventListener('resize', () => {
        offset = 0;
        carouselImages.style.transition = 'none';
        carouselImages.offsetHeight;
        carouselImages.style.transition = '';
    });
});
