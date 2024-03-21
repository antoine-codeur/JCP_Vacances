<?php include 'script/core/db/db.php'; ?>

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
        <?php include 'asset/template/model/listVoyages.php'; ?>
      </section>
      <?php include 'asset/template/widget.php'; ?>
    </main>
  </div>
</body>
</html>