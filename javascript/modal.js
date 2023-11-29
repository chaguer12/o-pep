// modal.js
document.addEventListener('DOMContentLoaded', function () {
    // Get the modal and the trigger button
    var modal = document.getElementById('myModal');
    var openModalBtn = document.getElementById('openModal');
    var closeModalBtn = document.getElementById('closeModal');

    // Function to open the modal
    function openModal() {
        modal.classList.remove('hidden');
    }

    // Function to close the modal
    function closeModal() {
        modal.classList.add('hidden');
    }

    // Event listeners
    openModalBtn.addEventListener('click', openModal);
    closeModalBtn.addEventListener('click', closeModal);

    // Close the modal if the overlay is clicked
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Close the modal if the user presses the Esc key
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });
});