<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

require_once 'script/core/db/db.php';
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $db = new Db();
    $conn = $db->connect();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id_user'];
        $_SESSION['username'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        $message = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>  
    <link rel="stylesheet" href="asset/style/theme/default.css">
    <link rel="stylesheet" href="asset/style/style.css">
</head>
<body id="bodyLogin">
    <div id="login" class="block">
        <form method="post">
            <h1>Connexion</h1>
            <?php if (!empty($message)): ?>
                <p><?= $message ?></p>
            <?php endif; ?>
            <div>
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Connexion">
        </form>
    </div>
</body>
</html>
