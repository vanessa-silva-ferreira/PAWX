document.addEventListener('DOMContentLoaded', () => {
    const carouselImages = document.querySelector('.carousel-images');
    const images = document.querySelectorAll('.carousel-images img');
    const totalImages = images.length;
    const imageWidth = carouselImages.parentElement.offsetWidth + 10; // largura da imagem + gap
    let offset = 0;

    function continuousScroll() {
        offset -= 0.5; // Velocidade de rolagem; ajuste para mais lento ou mais rápido
        carouselImages.style.transform = `translateX(${offset}px)`;

        // Reiniciar a posição quando o final das imagens for alcançado
        if (Math.abs(offset) >= imageWidth * totalImages) {
            offset = 0;
        }

        requestAnimationFrame(continuousScroll); // Chama continuamente para uma animação suave
    }

    // Inicializa o carrossel contínuo
    continuousScroll();

    // Reajusta a largura no redimensionamento
    window.addEventListener('resize', () => {
        offset = 0; // Resetar o offset ao redimensionar para evitar problemas de cálculo
        carouselImages.style.transition = 'none'; // Desabilita a transição momentaneamente
        carouselImages.offsetHeight; // Força o reflow
        carouselImages.style.transition = ''; // Habilita a transição novamente
    });
});
