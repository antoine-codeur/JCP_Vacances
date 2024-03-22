<?php
    include_once '../../script/core/db/db.php';
    $db = new Db();
    $conn = $db->connect();
?>
<div id="formulaire" class="block">
    <h2>Formulaire Pour La Création d’Un Nouveau Voyage</h2>
    <form action="script/core/db/voyage/handleVoyage.php<?php echo isset($id_voyage) ? '?id_voyage=' . $id_voyage : ''; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_voyage" value="<?php echo isset($voyage['id_voyage']) ? $voyage['id_voyage'] : ''; ?>">
        <input type="text" name="title" placeholder="Titre du voyage" required value="<?php echo isset($voyage) ? $voyage['title'] : ''; ?>"><br>
        <input type="text" name="image_url" placeholder="URL de l'image" value="<?php echo isset($voyage) ? $voyage['image_url'] : ''; ?>"><br>
        <textarea name="description" placeholder="Description"><?php echo isset($voyage) ? $voyage['description'] : ''; ?></textarea><br>
        <input type="date" name="date_debut" required value="<?php echo isset($voyage) ? $voyage['date_debut'] : ''; ?>"><br>
        <input type="date" name="date_fin" required value="<?php echo isset($voyage) ? $voyage['date_fin'] : ''; ?>"><br>
        <input type="number" name="price" placeholder="Prix" required value="<?php echo isset($voyage) ? $voyage['price'] : ''; ?>"><br>
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
