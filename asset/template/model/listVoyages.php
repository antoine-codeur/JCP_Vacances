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
    <div id="editModal" class="modal">
    <!-- Contenu de la fenêtre modale -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <?php $nameForm = "Formulaire Pour La Création d’Un Nouveau Voyage";
            include 'asset/template/formulaire.php'; ?>    
          </div>
    </div>
    <?php $addVoyageButton="Nouveau Voyage"; $classVoyageButton ="class='formVoyageButton'"; $sauvegarde = null;
        include 'asset/template/model/button-add-voyage.php';?>
</div>
