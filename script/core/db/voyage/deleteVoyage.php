<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour effectuer cette action.";
    exit;
}
require_once '../db.php';
$db = new Db();
$conn = $db->connect();
if (isset($_GET['id'])) {
    $id_voyage = $_GET['id'];
    $sql = "DELETE FROM voyage WHERE id_voyage = :id_voyage";
    $stmt = $db->prepare($sql);
    try {
        $stmt->execute([':id_voyage' => $id_voyage]);
    
        $_SESSION['message'] = "Voyage supprimé avec succès.";
    } catch (Exception $e) {
        $_SESSION['message'] = "Erreur lors de la suppression du voyage.";
    }
} else {

    $_SESSION['message'] = "Aucun voyage spécifié pour la suppression.";
}
header("Location: ../../../../index.php");
exit;

