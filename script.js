document.addEventListener('DOMContentLoaded', function () {
    const mobileMenu = document.getElementById('mobile-menu');
    const navbarLinks = document.getElementById('navbar-links');

    mobileMenu.addEventListener('click', function () {
        navbarLinks.classList.toggle('active');
    });
});
