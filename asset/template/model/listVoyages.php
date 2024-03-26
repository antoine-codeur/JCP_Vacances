<?php ini_set('display_errors', 1); 
error_reporting(E_ALL);?>
<div id="listVoyages" class="block">
    <h2>Liste des Voyages</h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Destination</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Prix</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php
        require_once 'script/core/db/db.php';
        $db = new Db();
        $conn = $db->connect();
        // Incluez la colonne `draft` dans votre sélection
        $stmt = $db->prepare("SELECT *, draft FROM voyage");
        $stmt->execute();
        while ($voyage = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Vérifiez si le voyage est un brouillon et ajoutez une classe `draft` le cas échéant
            $rowClass = $voyage['draft'] ? "draft" : "";
            echo "<tr class='".$rowClass."'>
                    <td><img src='".$voyage['image_url']."' alt='Image' style='width: 100px;'></td>
                    <td>".$voyage['title']."</td>
                    <td>".$voyage['date_debut']."</td>
                    <td>".$voyage['date_fin']."</td>
                    <td>".$voyage['price']."</td>
                    <td>
                        <button class='btnEdit' data-voyageid='".$voyage['id_voyage']."'>Modifier</button>
                    </td>
                    <td>
                        <a href='script/core/db/voyage/deleteVoyage.php?id=".$voyage['id_voyage']."'>Supprimer</a>
                    </td>
                </tr>";
        }
        ?>
        
    </table>
    <button id="buttonAjoutVoyage" class="VoyageButton addVoyage" type="submit">
        <span>Nouveau Voyage</span>
        <svg id='sizeSVG' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'>
            <path id='plusSVG' d='M9,15h2v-4h4v-2h-4v-4h-2v4h-4v2h4v4ZM10,20c-1.38,0-2.68-.26-3.9-.79-1.22-.52-2.28-1.24-3.18-2.14-.9-.9-1.61-1.96-2.14-3.18-.52-1.22-.79-2.52-.79-3.9s.26-2.68.79-3.9c.53-1.22,1.24-2.28,2.14-3.18.9-.9,1.96-1.61,3.18-2.14,1.22-.52,2.52-.79,3.9-.79s2.68.26,3.9.79c1.22.53,2.27,1.24,3.18,2.14.9.9,1.61,1.96,2.14,3.18.52,1.22.79,2.52.79,3.9s-.26,2.68-.79,3.9-1.24,2.27-2.14,3.18c-.9.9-1.96,1.61-3.18,2.14s-2.52.79-3.9.79ZM10,18c2.23,0,4.12-.77,5.67-2.33,1.55-1.55,2.33-3.44,2.33-5.67s-.77-4.12-2.33-5.68c-1.55-1.55-3.44-2.32-5.67-2.32s-4.12.78-5.68,2.32c-1.55,1.55-2.32,3.44-2.32,5.68s.78,4.12,2.32,5.67c1.55,1.55,3.44,2.33,5.68,2.33Z'/>
        </svg>
    </button>
    <!-- Formulaire -->
    <div id="formContainer" style="display: none;">
    <span class="close">&times;</span>
        <?php include "asset/template/formulaire.php";?>
    </div>
    <!-- editModal -->
    <div id="editModal" class="modal">
    <!-- Contenu de la fenêtre modale -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <?php $nameForm = "Formulaire Pour La Création d’Un Nouveau Voyage";
            include 'asset/template/formulaire.php'; ?>    
          </div>
    </div>
</div>
<script src="script/javascript/voyage/editVoyage.js"></script>
<script src="script/javascript/voyage/createVoyage.js"></script>
