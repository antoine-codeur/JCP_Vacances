<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
if (!defined('ROOT_DIR')) {
    define('ROOT_DIR', realpath(__DIR__ . '/../../'));
}
include_once ROOT_DIR . '/script/core/db/db.php';
?>
<input type="hidden" name="last_login_timestamp" value="<?php echo isset($_SESSION['user_last_login'][$userId]) ? $_SESSION['user_last_login'][$userId] : ''; ?>">
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

       <!-- Sélection de la catégorie -->
       <div class="rowForm">
            <label for="id_categorie">Catégorie :</label>
            <select id="id_categorie" name="id_categorie" required>
                <option value="" disabled selected>Choisir une catégorie</option>
                <?php
                $stmt = $db->prepare("SELECT * FROM categorie");
                $stmt->execute();
                while ($categorie = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".$categorie['id_categorie']."'>".$categorie['categorie_name']."</option>";
                }
                ?>
            </select>
        </div>

        <!-- Sélection de la formule -->
        <div class="rowForm">
            <label for="id_formule">Formule :</label>
            <select id="id_formule" name="id_formule" required>
                <option value="" disabled selected>Choisir une formule</option>
                <?php
                $stmt = $db->prepare("SELECT * FROM formule");
                $stmt->execute();
                while ($formule = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".$formule['id_formule']."'>".$formule['formule_name']."</option>";
                }
                ?>
            </select>
        </div>
        <button class="VoyageButton addVoyage">
    <span>Ajoutez Un Nouveau Voyage</span>
    <svg id="sizeSVG" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path id="plusSVG" d="M9,15h2v-4h4v-2h-4v-4h-2v4h-4v2h4v4ZM10,20c-1.38,0-2.68-.26-3.9-.79-1.22-.52-2.28-1.24-3.18-2.14-.9-.9-1.61-1.96-2.14-3.18-.52-1.22-.79-2.52-.79-3.9s.26-2.68.79-3.9c.53-1.22,1.24-2.28,2.14-3.18.9-.9,1.96-1.61,3.18-2.14,1.22-.52,2.52-.79,3.9-.79s2.68.26,3.9.79c1.22.53,2.27,1.24,3.18,2.14.9.9,1.61,1.96,2.14,3.18.52,1.22.79,2.52.79,3.9s-.26,2.68-.79,3.9-1.24,2.27-2.14,3.18c-.9.9-1.96,1.61-3.18,2.14s-2.52.79-3.9.79ZM10,18c2.23,0,4.12-.77,5.67-2.33,1.55-1.55,2.33-3.44,2.33-5.67s-.77-4.12-2.33-5.68c-1.55-1.55-3.44-2.32-5.67-2.32s-4.12.78-5.68,2.32c-1.55,1.55-2.32,3.44-2.32,5.68s.78,4.12,2.32,5.67c1.55,1.55,3.44,2.33,5.68,2.33Z"/>
    </svg>
    </button>
    </form>
</div>
