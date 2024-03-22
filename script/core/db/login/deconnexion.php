<?php
$userSession = new UserSession();
$userSession->logout();

header("Location: login.php");