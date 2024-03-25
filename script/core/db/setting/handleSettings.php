<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}require_once __DIR__ . '/../../../core/db/db.php';

$db = new Db();
$conn = $db->connect();

if (!isset($_SESSION['user_id'])) {    
    header("Location: ../../../../login.php");
    exit;
}


$userId = $_SESSION['user_id'];

if (isset($_POST["theme_id"])) {
    $theme_id = $_POST["theme_id"];
    if ($db->updateUserThemeId($userId, $theme_id)) {
        $theme_css = [
            1 => 'default.css',
            2 => 'dark.css',
            3 => 'light.css'
        ];
        $_SESSION['theme_css'] = $theme_css[$theme_id] ?? 'default.css';
    } else {
        exit("Une erreur est survenue lors de la mise à jour du thème.");
    }
}

$_SESSION['header_toggle'] = isset($_POST['header_toggle']) ? false : true;
$_SESSION['widget_toggle'] = isset($_POST['widget_toggle']) ? false : true;

header("Location: ../../../../index.php?page=settings");
exit;
