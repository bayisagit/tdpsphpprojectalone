// Dynamic Welcome Message
function setWelcomeMessage() {
    const welcomeElement = document.querySelector('.img p:first-of-type');
    const currentHour = new Date().getHours();
    let timeOfDay;

    if (currentHour < 12) {
        timeOfDay = "Good Morning";
    } else if (currentHour < 18) {
        timeOfDay = "Good Afternoon";
    } else {
        timeOfDay = "Good Evening";
    }

    welcomeElement.textContent = `${timeOfDay}, Welcome to`;
}
//dynamic foteryear
function updateFooterYear() {
    const footerYear = document.querySelector('.bottom p');
    const currentYear = new Date().getFullYear();
    footerYear.textContent = `TPSchool Primary School © ${currentYear}`;
}

// Initialize Functions
document.addEventListener('DOMContentLoaded', () => {
    setWelcomeMessage();
    updateFooterYear();
});
