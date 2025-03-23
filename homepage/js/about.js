//highlighth messagess!
function highlightWelcomeText() {
    const welcomeText = document.querySelector('.about-text p:first-of-type');
    welcomeText.style.color = '#ff9800';
    welcomeText.style.fontWeight = 'bold';
    welcomeText.style.fontSize = '1.2em';
}

//dynamic foteryear
function updateFooterYear() {
    const footerYear = document.querySelector('.bottom p');
    const currentYear = new Date().getFullYear();
    footerYear.textContent = `TPSchool Primary School © ${currentYear}`;
}

//initialize function
document.addEventListener('DOMContentLoaded', () => {
    highlightWelcomeText();
    updateFooterYear();
});
