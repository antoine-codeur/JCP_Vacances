<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
define('ROOT_DIR', realpath(__DIR__));
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

$page = $_GET['page'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>JCP Vacances</title>
  <?php include 'script/core/db/setting/handleTheme.php'; ?>
  <link rel="stylesheet" href="asset/style/theme/<?php echo $GLOBALS['theme_css']; ?>">
  <link rel="stylesheet" href="asset/style/style.css">
</head>
<body>

  <?php include 'asset/template/board.php'; ?>

  <div id="main-header">
  <?php if(!isset($_SESSION['header_toggle']) || $_SESSION['header_toggle']): ?>
    <?php include 'asset/template/header.php'; ?>
<?php endif; ?>
  
    <main>
      <section id="sectionMain">
      <?php
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
  <script src="script/javascript/voyage/createVoyage.js"></script>
  <script src="script/javascript/voyage/createVoyageModal.js"></script>
  <script src="script/javascript/voyage/editVoyage.js"></script>
</body>
</html>
