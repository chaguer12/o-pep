// const select = document.getElementById('modal');


const modal = document.getElementById('modal');
const toggleButton = document.getElementById('icon');

toggleButton.addEventListener('click', () => {
    modal.classList.toggle('translate-x-full');
    modal.classList.toggle('translate-x-0');
});
