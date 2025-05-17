// public/js/main.js
document.addEventListener('DOMContentLoaded', function() {
    var logoLink = document.querySelector('.navbar-brand');
    if (logoLink) {
        logoLink.addEventListener('click', function(event) {
            event.preventDefault();
            window.location.href = '/home';
        });
    }
});