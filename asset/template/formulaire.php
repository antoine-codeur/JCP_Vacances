<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', realpath(__DIR__ . '/../../'));
}
if (!defined('ROOT_DIR')) {
    die('ROOT_DIR non défini.');
}
?>
<div id="formulaire" class="block">
    <h2>Formulaire Pour La Création d’Un Nouveau Voyage</h2>
    <form action="script/core/db/voyage/handleVoyage.php<?php echo isset($id_voyage) ? '?id_voyage=' . $id_voyage : ''; ?>" method="POST" enctype="multipart/form-data">
        <div class="rowForm">
            <!-- ID Voyage (caché, pas besoin d'étiquette) -->
            <input type="hidden" name="id_voyage" value="<?php echo isset($voyage['id_voyage']) ? $voyage['id_voyage'] : ''; ?>">
        </div>
        <div class="rowForm">
            <label for="title">Titre du voyage :</label>
            <input type="text" id="title" name="title" placeholder="Titre du voyage" required value="<?php echo isset($voyage['title']) ? $voyage['title'] : ''; ?>">
        </div>
        <div class="rowForm">
            <label for="image_url">Image* :</label>
            <input type="text" id="image_url" name="image_url" placeholder="URL de l'image" value="<?php echo isset($voyage['image_url']) ? $voyage['image_url'] : ''; ?>">
            <span class="i">*Format en .png .jpg .jpeg</span>
        </div>
        <div class="rowForm">
            <label for="description">Description :</label>
            <textarea id="description" name="description" placeholder="Description"><?php echo isset($voyage['description']) ? $voyage['description'] : ''; ?></textarea>
        </div>
        <div class="rowForm">
            <label for="date_debut">Date :</label>
                <input type="date" id="date_debut" name="date_debut" required value="<?php echo isset($voyage['date_debut']) ? $voyage['date_debut'] : ''; ?>">
                <label id="date" for="date_fin">au</label>
                <input type="date" id="date_fin" name="date_fin" required value="<?php echo isset($voyage['date_fin']) ? $voyage['date_fin'] : ''; ?>">
        </div>
        <div class="rowForm">
            <label for="price">Prix :</label>
            <div>
                <input type="number" id="price" name="price" placeholder="Prix" min="0" step="0.05" required value="<?php echo isset($voyage['price']) ? $voyage['price'] : ''; ?>">
                <span>€</span>
            </div>
        </div>
        <div class="rowForm">
            <label for="id_categorie">Catégorie :</label>
            <select id="id_categorie" name="id_categorie" required>
                <option value="" disabled selected>Choisir une catégorie</option>
                <?php
                $stmt = $db->prepare("SELECT * FROM categorie");
                $stmt->execute();
                while ($categorie = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $selected = (isset($voyage) && $voyage['id_categorie'] == $categorie['id_categorie']) ? 'selected' : '';
                    echo "<option value='".$categorie['id_categorie']."' $selected>".$categorie['categorie_name']."</option>";
                }
                ?>
            </select>
        </div>
        <div class="rowForm">
            <label for="id_formule">Formule :</label>
            <select id="id_formule" name="id_formule" required>
                <option value="" disabled selected>Choisir une formule</option>
                <?php
                $stmt = $db->prepare("SELECT * FROM formule");
                $stmt->execute();
                while ($formule = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $selected = (isset($voyage) && $voyage['id_formule'] == $formule['id_formule']) ? 'selected' : '';
                    echo "<option value='".$formule['id_formule']."' $selected>".$formule['formule_name']."</option>";
                }
                ?>
            </select>
        </div>
        <?php $textVoyageButton="Ajoutez Un Nouveau Voyage";
        include 'asset/template/model/button-add-voyage.php';?>
        <input class="<?php echo isset($id_voyage) && $id_voyage ? "editButton" : "addButton"; ?>" type="submit" value="<?php echo isset($id_voyage) && $id_voyage ? "Mettre à jour" : "Ajouter Voyage"; ?>">
    </form>
</div>
