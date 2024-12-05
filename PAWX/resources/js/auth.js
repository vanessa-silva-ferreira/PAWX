const images = [
'https://images.pexels.com/photos/2623968/pexels-photo-2623968.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    'https://images.pexels.com/photos/16609385/pexels-photo-16609385/free-photo-of-a-cat-holding-its-paw-up.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
    'https://cdn.pixabay.com/photo/2018/03/31/06/31/dog-3277414_960_720.jpg'
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


function toggleForm(type) {
    const bg = document.querySelector('.toggle-bg');
    const buttons = document.querySelectorAll('.toggle-btn');
    const signupForm = document.getElementById('signup-form');
    const signinForm = document.getElementById('signin-form');

    if (type === 'signup') {
        bg.classList.add('signup');
        buttons[0].classList.remove('text-white');
        buttons[0].classList.add('text-pawx-brown');
        buttons[1].classList.remove('text-pawx-brown');
        buttons[1].classList.add('text-white');
        signinForm.classList.add('hidden');
        signupForm.classList.remove('hidden');
    } else {
        bg.classList.remove('signup');
        buttons[0].classList.add('text-white');
        buttons[0].classList.remove('text-pawx-brown');
        buttons[1].classList.add('text-pawx-brown');
        buttons[1].classList.remove('text-white');
        signupForm.classList.add('hidden');
        signinForm.classList.remove('hidden');
    }
}

toggleForm('signin');


const signinBtn = document.getElementById('signin-btn');
const signupBtn = document.getElementById('signup-btn');
signinBtn.addEventListener('click', () => toggleForm('signin'));
signupBtn.addEventListener('click', () => toggleForm('signup'));
