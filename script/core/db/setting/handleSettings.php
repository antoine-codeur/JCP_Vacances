<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../../core/db/db.php';

$db = new Db();
$conn = $db->connect();

// Assurez-vous que l'utilisateur est connecté avant de procéder
if (!isset($_SESSION['user_id'])) {    
    header("Location: ../../../../login.php");
    exit;
}

// Traiter le changement de thème
if (isset($_POST["theme_id"])) {
    $theme_id = $_POST["theme_id"];
    $userId = $_SESSION['user_id'];
    
    // Mettre à jour l'id_theme de l'utilisateur dans la base de données
    if ($db->updateUserThemeId($userId, $theme_id)) {
        // Mettre à jour le theme_css en session
        switch ($theme_id) {
            case 1:
                $_SESSION['theme_css'] = 'default.css';
                break;
            case 2:
                $_SESSION['theme_css'] = 'dark.css';
                break;
            case 3:
                $_SESSION['theme_css'] = 'light.css';
                break;
            default:
                $_SESSION['theme_css'] = 'default.css';
                break;
        }
    } else {
        // Gérer l'échec de la mise à jour du thème
        echo "Une erreur est survenue lors de la mise à jour du thème.";
        exit;
    }
}

// Traiter le toggle de l'affichage du header
if (isset($_POST['header_toggle'])) {
    $_SESSION['header_toggle'] = true;
} else {
    $_SESSION['header_toggle'] = false;
}

// Rediriger l'utilisateur vers la page de paramètres après la mise à jour
header("Location: ../../../../index.php?page=settings");
exit;
