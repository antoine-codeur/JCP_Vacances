<?php
include 'UserSession.php';

$userSession = new UserSession();

$username = $_POST['username'];
$password = $_POST['password'];

if ($userSession->login($username, $password)) {

    header("Location: index.php");
} else {

    echo "Nom d'utilisateur ou mot de passe incorrect.";
}
