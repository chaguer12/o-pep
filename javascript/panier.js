// const select = document.getElementById('modal');
// const select_ = document.getElementById('icon');

// select_.addEventListener('click', () => {
//     if (select.style.display === 'block') {
//         select.style.display = 'none';
//         select.style.cssText = 'translate-x';

//     } else {
//         select.style.display = 'block';
//     }
// });

const modal = document.getElementById('modal');
const toggleButton = document.getElementById('icon');

toggleButton.addEventListener('click', () => {
    modal.classList.toggle('translate-x-full');
    modal.classList.toggle('translate-x-0');
});
