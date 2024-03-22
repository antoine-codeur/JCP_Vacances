
<div id="notes" class="block">
    <div id="notesTitle">
        <h3>Note/</h3>
        <span>à faire</span>
    </div>
    <textarea name="notes" id="notesText" cols="30" rows="10" value="<?php echo htmlspecialchars($notes); ?>"></textarea>
    <?php $addVoyageButton="Sauvegarder !"; $classVoyageButton = null; $sauvegarde = 1;
        include 'asset/template/model/button-add-voyage.php';?>
</div>