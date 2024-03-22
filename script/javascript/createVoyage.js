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
                
                // Ajouter un bouton de fermeture au HTML
                var closeButtonHtml = '<button id="closeFormButton" style="float: right;">Fermer</button>';
                formContainer.innerHTML = closeButtonHtml + html;

                // Ajouter l'écouteur d'événement pour fermer le formulaire
                document.getElementById("closeFormButton").addEventListener("click", function() {
                    formContainer.style.display = "none";
                });

                // Assurez-vous que le conteneur du formulaire soit visible au cas où il était précédemment caché
                formContainer.style.display = "block";
            })
            .catch(error => {
                console.error('Erreur lors du chargement du formulaire:', error);
            });
    });
});
