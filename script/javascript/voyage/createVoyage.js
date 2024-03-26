document.addEventListener('DOMContentLoaded', function() {
    var buttonAjoutVoyage = document.getElementById('buttonAjoutVoyage');
    var formContainer = document.getElementById('formContainer');
    var closeButton = document.querySelector('.close');

    buttonAjoutVoyage.addEventListener('click', function() {
        formContainer.style.display = formContainer.style.display === 'none' ? 'block' : 'none';
    });

    closeButton.addEventListener('click', function() {
        formContainer.style.display = 'none';
    });
});