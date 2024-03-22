<?php
include_once 'script/core/db/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'script/core/db/db.php';

    $db = new Db();
    $conn = $db->connect();

    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $name = $_POST['name'];
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
    $role_id = $_POST['role_id'];

    $sql = "INSERT INTO user (username, password, name, firstname, role_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    if ($stmt && $stmt->execute([$username, $password, $name, $firstname, $role_id])) {
        echo "Nouvel utilisateur créé avec succès.";
    } else {
        echo "Erreur lors de la création de l'utilisateur.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h2>Ajouter un utilisateur</h2>
    <form method="post">
        <label for="username">Nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="name">Nom:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="firstname">Prénom:</label><br>
        <input type="text" id="firstname" name="firstname"><br>
        <label for="role_id">ID du rôle:</label><br>
        <input type="number" id="role_id" name="role_id" required><br><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
