
const toggle = document.querySelector('.toggle-btn');
const burgerX = toggle.querySelector('.bx');
const navbar = document.querySelector('.navbar-guest ul');

toggle.addEventListener('click', () => {
    navbar.classList.toggle('show-menu');
    burgerX.classList.toggle('bx-x');
});


// Parallax Effect at Landing Page

function parallax(element, distance, speed){
    const jumbotron = document.querySelector(element);
    jumbotron.style.transform= `translateY(${distance * speed}px)`;
}

window.addEventListener('scroll',function(){
    parallax('header',window.scrollY, 0.5);
    parallax('.jumbo-text',window.scrollY, 0.3);
});


