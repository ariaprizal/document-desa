// Side Bar
const burger  = document.querySelector('.floating');
const xBurger  = document.querySelector('.floating i');
const nav = document.querySelector('.sidebar-menu');

burger.addEventListener('click', () => {
    xBurger.classList.toggle('bx-x');
    nav.classList.toggle('show-nav');
});