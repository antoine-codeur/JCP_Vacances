<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user_id']);
  unset($_SESSION['username']);
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JCP Vacances</title>
  <link rel="stylesheet" href="asset/style/style.css">
</head>
<body>

  <?php include 'asset/template/board.php'; ?>

  <div id="main-header">
    <?php include 'asset/template/header.php'; ?>
    <main>
    <section id="sectionMain">
      <?php
        $page = $_GET['page'] ?? 'home';
        switch ($page) {
            case 'favorite':
                include 'asset/page/favorite.php';
                break;
            case 'newVoyage':
                include 'asset/page/newVoyage.php';
                break;
            case 'draft':
                include 'asset/page/draft.php';
                break;
            case 'listVoyage':
                include 'asset/page/listVoyage.php';
                break;
            case 'images':
                include 'asset/page/images.php';
                break;
            case 'account':
                include 'asset/page/account.php';
                break;
            case 'settings':
                include 'asset/page/settings.php';
                break;
            case 'help':
                include 'asset/page/help.php';
                break;
            default:
                include 'asset/page/home.php';
        }
        ?>
      </section>
            <!-- Section widget -->
      <?php include 'asset/template/widget.php'; ?>
    </main>
  </div>
  <script src="script/javascript/createVoyage.js"></script>
  <script src="script/javascript/editVoyage.js"></script>
</body>
</html>