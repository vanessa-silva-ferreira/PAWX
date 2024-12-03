document.addEventListener('DOMContentLoaded', () => {
    const carouselImages = document.querySelector('.carousel-images');
    const images = document.querySelectorAll('.carousel-images img');
    const totalImages = images.length;
    const imageWidth = carouselImages.parentElement.offsetWidth; // largura do contêiner visível
    let offset = 0;

    // Duplicamos o conjunto de imagens para criar o efeito de rolagem contínua
    carouselImages.innerHTML += carouselImages.innerHTML;

    function continuousScroll() {
        offset -= 1; // Ajuste a velocidade de rolagem conforme necessário
        carouselImages.style.transform = `translateX(${offset}px)`;

        // Quando o offset atinge o final do primeiro conjunto de imagens, redefinimos para zero
        // mas como temos uma duplicação das imagens, isso é imperceptível
        if (Math.abs(offset) >= imageWidth * totalImages) {
            offset = 0;
            carouselImages.style.transition = 'none'; // Desativa a transição para evitar "saltos" perceptíveis
            carouselImages.style.transform = `translateX(${offset}px)`;
            // Força o reflow para aplicar instantaneamente o novo offset
            carouselImages.offsetHeight; // Trigger reflow
            carouselImages.style.transition = 'transform 0.1s linear'; // Habilita a transição de volta
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
