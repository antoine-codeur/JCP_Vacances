document.addEventListener("DOMContentLoaded", function() {
    var modalCreate = document.getElementById("createModal");
    var btnAjoutVoyage = document.getElementById("widgetAjoutVoyage");
    var spanCreate = modalCreate.querySelector(".close");
    btnAjoutVoyage.onclick = function() {
        modalCreate.style.display = "block";
    };
    spanCreate.onclick = function() {
        modalCreate.style.display = "none";
    };
    window.onclick = function(event) {
        if (event.target == modalCreate) {
            modalCreate.style.display = "none";
        }
    };
});
