tailwind.config = {
    theme: {
        extend: {
            colors: {
                'pawx-orange': '#DF6B2C',
                'pawx-grey': '#ECECEC',
                'pawx-brown': '#322C28',
            }
        }
    }
}


const images = [
    '/images/auth_01.jpeg',
    '/images/auth_02.jpeg',
    '/images/auth_03.jpeg'
];

const carouselContainer = document.getElementById('carousel-container');

function setRandomBackgroundImage() {
    const randomIndex = Math.floor(Math.random() * images.length);
    carouselContainer.style.backgroundImage = `url(${images[randomIndex]})`;
    carouselContainer.style.backgroundSize = 'cover';
    carouselContainer.style.backgroundPosition = 'center';
    carouselContainer.style.backgroundRepeat = 'no-repeat';
}

setRandomBackgroundImage();

// function toggleForm(type) {
//     const bg = document.querySelector('.toggle-bg');
//     const buttons = document.querySelectorAll('.toggle-btn');
//     const signupForm = document.getElementById('signup-form');
//     const signinForm = document.getElementById('signin-form');
//
//     if (type === 'signup') {
//         bg.classList.add('signup');
//         buttons[0].classList.remove('text-white');
//         buttons[0].classList.add('text-pawx-brown');
//         buttons[1].classList.remove('text-pawx-brown');
//         buttons[1].classList.add('text-white');
//         signinForm.classList.add('hidden');
//         signupForm.classList.remove('hidden');
//     } else {
//         bg.classList.remove('signup');
//         buttons[0].classList.add('text-white');
//         buttons[0].classList.remove('text-pawx-brown');
//         buttons[1].classList.add('text-pawx-brown');
//         buttons[1].classList.remove('text-white');
//         signupForm.classList.add('hidden');
//         signinForm.classList.remove('hidden');
//     }
// }
//
// toggleForm('signin');
