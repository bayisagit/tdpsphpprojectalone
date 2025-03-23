function navigateToYearTerm() {
    const dropdown = document.getElementById("yearTermDropdown");
    const selectedValue = dropdown.value;

    if (selectedValue) {
        window.location.href = selectedValue;
    }
}
