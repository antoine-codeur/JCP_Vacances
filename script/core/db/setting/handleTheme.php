<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../../core/db/db.php'; 
$db = new Db();
$conn = $db->connect();
if (!isset($_SESSION['user_id'])) {    
    header("Location: ../../../../login.php"); 
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["theme_id"])) {
    $theme_id = $_POST["theme_id"];
    $userId = $_SESSION['user_id'];   
    if ($db->updateUserThemeId($userId, $theme_id)) {
        header("Location: ../../../../index.php?page=settings");
        exit;
    } else {
        echo "Une erreur est survenue lors de la mise à jour du thème.";
    }
}
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $userThemeId = $db->getUserThemeId($userId);
    switch ($userThemeId) {
        case 1:
            $theme_css = 'default.css';
            break;
        case 2:
            $theme_css = 'dark.css';
            break;
        case 3:
            $theme_css = 'light.css';
            break;
        default:
            $theme_css = 'default.css'; 
            break;
    }
    $_SESSION['theme_css'] = $theme_css;
}
