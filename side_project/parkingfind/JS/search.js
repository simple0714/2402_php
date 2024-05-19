document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.search-button');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            buttons.forEach(btn => btn.classList.remove('gray'));
            // Add active class to the clicked button
            this.classList.add('gray');
        });
    });
});