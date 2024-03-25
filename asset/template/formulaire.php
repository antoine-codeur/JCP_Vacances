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
        <input type="hidden" name="id_voyage" value="<?php echo isset($voyage['id_voyage']) ? $voyage['id_voyage'] : ''; ?>">
        <input type="text" name="title" placeholder="Titre du voyage" required value="<?php echo isset($voyage['title']) ? $voyage['title'] : ''; ?>">
        <input type="text" name="image_url" placeholder="URL de l'image" value="<?php echo isset($voyage['image_url']) ? $voyage['image_url'] : ''; ?>">
        <textarea name="description" placeholder="Description"><?php echo isset($voyage['description']) ? $voyage['description'] : ''; ?></textarea>
        <input type="date" name="date_debut" required value="<?php echo isset($voyage['date_debut']) ? $voyage['date_debut'] : ''; ?>">
        <input type="date" name="date_fin" required value="<?php echo isset($voyage['date_fin']) ? $voyage['date_fin'] : ''; ?>">
        <input type="number" name="price" placeholder="Prix" required value="<?php echo isset($voyage['price']) ? $voyage['price'] : ''; ?>">

        <!-- Catégorie -->
        <select name="id_categorie" required>
            <option value="" disabled selected>Choisir une catégorie</option>
            <?php
            $stmt = $db->prepare("SELECT * FROM categorie");
            $stmt->execute();
            while ($categorie = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $selected = (isset($voyage) && $voyage['id_categorie'] == $categorie['id_categorie']) ? 'selected' : '';
                echo "<option value='".$categorie['id_categorie']."' $selected>".$categorie['categorie_name']."</option>";
            }
            ?>
        </select><br>
        <!-- Formule -->
        <select name="id_formule" required>
            <option value="" disabled selected>Choisir une formule</option>
            <?php
            $stmt = $db->prepare("SELECT * FROM formule");
            $stmt->execute();
            while ($formule = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $selected = (isset($voyage) && $voyage['id_formule'] == $formule['id_formule']) ? 'selected' : '';
                echo "<option value='".$formule['id_formule']."' $selected>".$formule['formule_name']."</option>";
            }
            ?>
        </select><br>
        <input type="submit" value="<?php echo isset($id_voyage) && $id_voyage ? "Mettre à jour" : "Ajouter Voyage"; ?>">
    </form>
</div>
