document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById("editModal");
    var btnsEdit = document.querySelectorAll(".btnEdit");
    var span = document.querySelector(".close");

    btnsEdit.forEach(function(btn) {
        btn.onclick = function() {
            var voyageId = this.getAttribute("data-voyageid");
            fetch('script/core/db/voyage/getVoyageDetails.php?voyageId=' + voyageId)
                .then(response => response.json())
                .then(data => {
                    if(data.error) {
                        alert(data.error);
                        return;
                    }

                    document.querySelector("input[name='id_voyage']").value = data.id_voyage;
                    document.querySelector("input[name='title']").value = data.title;
                    document.querySelector("input[name='image_url']").value = data.image_url;
                    document.querySelector("textarea[name='description']").value = data.description;
                    document.querySelector("input[name='date_debut']").value = data.date_debut;
                    document.querySelector("input[name='date_fin']").value = data.date_fin;
                    document.querySelector("input[name='price']").value = data.price;
                    
                    // Mettre à jour le titre du formulaire et le bouton de soumission
                    document.querySelector("#formulaire h2").textContent = "Modifier le Voyage";
                    document.querySelector("#formulaire input[type='submit']").value = "Mettre à jour";

                    // Préremplir les sélections de catégorie et de formule
                    document.querySelector("select[name='id_categorie']").value = data.id_categorie;
                    document.querySelector("select[name='id_formule']").value = data.id_formule;

                    modal.style.display = "block";
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert("Une erreur est survenue lors du chargement des données.");
                });
        };
    });

    span.onclick = function() {
        modal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
});
