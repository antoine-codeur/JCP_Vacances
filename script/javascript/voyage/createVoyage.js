document.addEventListener("DOMContentLoaded", function() {
    var buttonAjoutVoyage = document.getElementById("buttonAjoutVoyage");
    buttonAjoutVoyage.addEventListener("click", function() {
        fetch('asset/template/formulaire.php')
            .then(response => response.text())
            .then(html => {
                var formContainer = document.getElementById("formContainer");
                if (!formContainer) {
                    formContainer = document.createElement("div");
                    formContainer.id = "formContainer";
                    buttonAjoutVoyage.insertAdjacentElement("afterend", formContainer);
                }
                var closeButtonHtml = '<button id="closeFormButton" style="float: right;">Fermer</button>';
                formContainer.innerHTML = closeButtonHtml + html;
                document.getElementById("closeFormButton").addEventListener("click", function() {
                    formContainer.style.display = "none";
                });
                formContainer.style.display = "block";
            })
            .catch(error => {
                console.error('Erreur lors du chargement du formulaire:', error);
            });
    });
});
