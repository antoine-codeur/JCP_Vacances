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
                <!-- AJOUT DU CONTENU -->
        <?php include 'asset/template/model/searchBar.php'; ?>
        <?php include 'asset/template/model/preview.php'; ?>
        <?php $idVoyageButton="id='buttonAjoutVoyage'";
        include 'asset/template/model/listVoyages.php'; ?>
        <?php include 'asset/template/formulaire.php'; ?>
      </section>
      <?php include 'asset/template/widget.php'; ?>
    </main>
  </div>
  <script src="script/javascript/createVoyage.js"></script>
  <script src="script/javascript/editVoyage.js"></script>
</body>
</html>