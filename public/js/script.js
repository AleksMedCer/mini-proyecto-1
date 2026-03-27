// Script para el navbar responsivo
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.getElementById('hamburger');
    const navbarMenu = document.getElementById('navbarMenu');

    if (hamburger) {
        hamburger.addEventListener('click', function() {
            navbarMenu.classList.toggle('active');
        });

        // Cerrar menú cuando se clickea en un enlace
        const navLinks = navbarMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navbarMenu.classList.remove('active');
            });
        });
    }

    // Cerrar menú cuando se clickea fuera
    document.addEventListener('click', function(event) {
        if (navbarMenu && !navbarMenu.contains(event.target) && !hamburger.contains(event.target)) {
            navbarMenu.classList.remove('active');
        }
    });
});
