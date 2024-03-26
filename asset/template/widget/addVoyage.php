<div id="ajoutVoyage" class="block">
    <h3>Ajouter un voyage</h3>
    <?php $idVoyageButton="widgetAjoutVoyage"; $textVoyageButton="Appuyez ici !"; $classVoyageButton ="formVoyageButton";
        include 'asset/template/model/button-add-voyage.php';?>
</div>
<div id="createModal" class="modal">
    <!-- Contenu de la fenêtre modale -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <?php include 'asset/template/formulaire.php'; ?>    
        </div>
</div>
<script src="script/javascript/voyage/createVoyageModal.js"></script>
