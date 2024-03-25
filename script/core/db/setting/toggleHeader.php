<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}if (!empty($_POST['header_toggle'])) {
    $_SESSION['header_toggle'] = true;
} else {
    $_SESSION['header_toggle'] = false;
}
header("Location: ../../../../index.php?page=settings");
exit;
