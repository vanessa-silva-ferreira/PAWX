const cards = [
    { nome: "Buddy", ano: 2023, frase: "Sempre nos nossos corações.", img: "https://placedog.net/150/150?random=1" },
    { nome: "Luna", ano: 2023, frase: "Uma estrela que brilhará para sempre.", img: "https://placedog.net/150/150?random=2" },
    { nome: "Max", ano: 2022, frase: "Um companheiro fiel até ao fim.", img: "https://placedog.net/150/150?random=3" },
    { nome: "Bella", ano: 2023, frase: "A nossa querida aventureira.", img: "https://placedog.net/150/150?random=4" },
    { nome: "Charlie", ano: 2023, frase: "Sempre cheio de energia.", img: "https://placedog.net/150/150?random=5" },
    { nome: "Daisy", ano: 2022, frase: "Uma verdadeira amiga.", img: "https://placedog.net/150/150?random=6" },
    { nome: "Rocky", ano: 2021, frase: "Um verdadeiro guardião.", img: "https://placedog.net/150/150?random=7" },
    { nome: "Molly", ano: 2022, frase: "A nossa pequena companheira.", img: "https://placedog.net/150/150?random=8" },
    { nome: "Bailey", ano: 2023, frase: "O coração da família.", img: "https://placedog.net/150/150?random=9" },
    { nome: "Ruby", ano: 2023, frase: "Trazia luz aos nossos dias.", img: "https://placedog.net/150/150?random=10" },
    { nome: "Cooper", ano: 2020, frase: "O nosso aventureiro.", img: "https://placedog.net/150/150?random=11" },
    { nome: "Chloe", ano: 2021, frase: "A pequena estrela brilhante.", img: "https://placedog.net/150/150?random=12" }
];

let currentPage = 1;
const cardsPerPage = 8;

function renderCards() {
    const cardContainer = document.getElementById('cardContainer');
    const pagination = document.getElementById('pagination');
    const searchInput = document.getElementById('searchInput').value.toLowerCase();

    const filteredCards = cards.filter(card =>
        card.nome.toLowerCase().includes(searchInput) ||
        String(card.ano).includes(searchInput)
    );

    const totalPages = Math.ceil(filteredCards.length / cardsPerPage);
    const startIndex = (currentPage - 1) * cardsPerPage;
    const currentCards = filteredCards.slice(startIndex, startIndex + cardsPerPage);

    if (currentCards.length > 0) {
        cardContainer.innerHTML = currentCards.map(card => `
            <div class="bg-gray-100 rounded-lg shadow-lg p-4 text-center">
                <img src="${card.img}" alt="${card.nome}" class="w-24 h-24 mx-auto rounded-full">
                <h4 class="text-lg font-bold mt-2">${card.nome}</h4>
                <p class="text-gray-600 text-sm">${card.ano}</p>
                <p class="text-gray-500 mt-2">${card.frase}</p>
            </div>
        `).join('');
    } else {
        cardContainer.innerHTML = '<p class="text-gray-500 text-center col-span-4">Nenhum resultado encontrado.</p>';
    }

    pagination.innerHTML = Array.from({ length: totalPages }, (_, i) => `
        <button data-page="${i + 1}" class="page-btn px-4 py-2 ${currentPage === i + 1 ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700'} rounded-md">
            ${i + 1}
        </button>
    `).join('');

    attachPaginationEvents();
}

function changePage(page) {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    const filteredCards = cards.filter(card =>
        card.nome.toLowerCase().includes(searchInput) ||
        String(card.ano).includes(searchInput)
    );

    const totalPages = Math.ceil(filteredCards.length / cardsPerPage);

    if (page >= 1 && page <= totalPages) {
        currentPage = page;
        renderCards();
    }
}

function attachPaginationEvents() {
    const paginationButtons = document.querySelectorAll('.page-btn');
    paginationButtons.forEach(button => {
        button.addEventListener('click', () => {
            const page = parseInt(button.getAttribute('data-page'));
            changePage(page);
        });
    });
}

function searchCards() {
    currentPage = 1;
    renderCards();
}

document.getElementById('searchInput').addEventListener('input', searchCards);

document.addEventListener('DOMContentLoaded', renderCards);
