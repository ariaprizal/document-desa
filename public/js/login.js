const alert = document.querySelector('.alert-hide');
const close = document.querySelector('#close-alert');

close.addEventListener('click', () => {
    alert.style.display = 'none';
});