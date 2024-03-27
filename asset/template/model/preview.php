<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'script/core/db/db.php'; 

// Création d'une instance de la classe Db pour interagir avec la base de données
$db = new Db();

// Récupération du nom d'utilisateur à partir de la base de données en utilisant l'ID de l'utilisateur stocké dans la session
$username = $db->getUsernameById($_SESSION['user_id']);

// Calcul du nombre de nouveaux voyages depuis la dernière connexion
$sql = "SELECT COUNT(*) AS new_voyages FROM voyage WHERE date_creation > :lastLogin";
$stmt = $db->prepare($sql);
$stmt->bindParam(':lastLogin', $_SESSION['last_login'], PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$newVoyagesCount = $result['new_voyages'];

// Récupération de la date de la dernière connexion
$lastLogin = $_SESSION['last_login'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Ajoutez ici vos liens CSS, scripts JavaScript, etc. -->
</head>
<body>

<div id="preview" class="block">
    <span>Tableau De Bord - Aperçu</span>
    <h1>Bonjour <?php echo htmlspecialchars($username); ?></h1>
    <div id="previewNotif">
        <div class="notifications">
            <div class="notif2">
                <p class="red"><?php echo $newVoyagesCount; ?></p>
                <p>Nouveaux voyages depuis votre dernière connexion</p>
            </div>
        </div>
    </div>
    <p>Dernière connexion : <?php echo $lastLogin; ?></p>
</div>

<!-- Ajoutez ici le reste de votre contenu HTML -->

</body>
</html>
