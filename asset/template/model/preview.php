<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require_once 'script/core/db/db.php'; 
$db = new Db();
$conn = $db->connect();
$userId = $_SESSION['user_id'];
$username = $db->getUsernameById($userId);
?>

<div id="preview" class="block">
    <span>Tableau De Bord - Aperçu</span>
    <h1>Bonjour <?php echo htmlspecialchars($username); ?></h1>
    <div id="previewNotif">
        <div class="notifications">
            <div class="notif1">
            </div>
            <div class="notif2">
                <p class="red">4</p>
                <p>Lorem ipsum doloremque</p>
            </div>
        </div>
        <div class="notifications">
        <div class="notif1">
            </div>
            <div class="notif2">
                <p class="red">5</p>
                <p>Lorem ipsum doloremque</p>
            </div>
        </div>
    </div>
</div>