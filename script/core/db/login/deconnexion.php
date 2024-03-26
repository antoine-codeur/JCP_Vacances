<?php
$userSession = new UserSession();
$userSession->logout();

$db = new Db();
$db->updateLastLogin($_SESSION['user_id'], date('Y-m-d H:i:s'));

header("Location: login.php");
