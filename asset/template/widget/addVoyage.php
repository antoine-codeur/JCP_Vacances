<div id="ajoutVoyage" class="block">
    <h3>Ajouter un voyage</h3>
    <?php $idVoyageButton="id='widgetAjoutVoyage'"; $addVoyageButton="Appuyez ici !"; $classVoyageButton ="class='formVoyageButton'"; $sauvegarde = null;
        include 'asset/template/model/button-add-voyage.php';?>
</div>
<div id="createModal" class="modal">
    <!-- Contenu de la fenêtre modale -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <?php include 'asset/template/formulaire.php'; ?>    
          </div>
    </div>