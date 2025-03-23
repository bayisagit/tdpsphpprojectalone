function toggleMenu() {
    const heroNav = document.querySelector('.hero_nav');
    const menuIcon = document.querySelector('.menu-icon');
    const closeIcon = document.querySelector('.close-icon');

    if (heroNav.style.display === 'none' || heroNav.style.display === '') {
        heroNav.style.display = 'block';
        menuIcon.style.display = 'none';
        closeIcon.style.display = 'block';
    } else {
        heroNav.style.display = 'none';
        menuIcon.style.display = 'block';
        closeIcon.style.display = 'none';
    }
}
