<?php
session_start();
require_once '../db.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../login.php");
    exit;
}
try {
    $db = new Db();
    $conn = $db->connect();
    $title = $_POST['title'];
    $image_url = $_POST['image_url'] ?? '';
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $price = $_POST['price'];
    $id_categorie = $_POST['id_categorie'];
    $id_formule = $_POST['id_formule'];
    if (isset($_POST['id_voyage']) && !empty($_POST['id_voyage'])) {
        $id_voyage = $_POST['id_voyage'];
        $sql = "UPDATE voyage SET id_categorie = ?, id_formule = ?, title = ?, image_url = ?, description = ?, date_debut = ?, date_fin = ?, price = ? WHERE id_voyage = ?";
        $params = [$id_categorie, $id_formule, $title, $image_url, $description, $date_debut, $date_fin, $price, $id_voyage];
    } else {
        $sql = "INSERT INTO voyage (id_categorie, id_formule, title, image_url, description, date_debut, date_fin, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [$id_categorie, $id_formule, $title, $image_url, $description, $date_debut, $date_fin, $price];
    }
    $stmt = $db->prepare($sql);
    $result = $stmt->execute($params);
    if ($result) {
        $_SESSION['message'] = "Voyage traité avec succès.";
    } else {
        throw new Exception("Erreur lors de l'exécution de la requête.");
    }
} catch (Exception $e) {
    $_SESSION['message'] = "Erreur lors du traitement du voyage: " . $e->getMessage();
}
header("Location: ../../../../index.php");
exit;
