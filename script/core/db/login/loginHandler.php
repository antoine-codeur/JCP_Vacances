<?php
include 'UserSession.php';
require_once '../db/db.php'; // Chemin à adapter selon l'emplacement du fichier

$userSession = new UserSession();
$db = new Db();

$username = $_POST['username'];
$password = $_POST['password'];

if ($userSession->login($username, $password)) {
    $_SESSION['user_id'] = $user['id_user']; // Assurez-vous de définir également $_SESSION['user_id']
    $_SESSION['username'] = $user['username'];
    $_SESSION['last_login'] = date('Y-m-d H:i:s');
    header("Location: index.php");
    exit;
} else {
    $message = "Nom d'utilisateur ou mot de passe incorrect.";
}
