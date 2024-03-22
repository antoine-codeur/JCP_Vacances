<?php
require_once '../db.php';
$db = new Db();
$conn = $db->connect();
if (isset($_GET['voyageId'])) {
    $voyageId = $_GET['voyageId'];
    $stmt = $db->prepare("SELECT * FROM voyage WHERE id_voyage = ?");
    $stmt->execute([$voyageId]);
    $voyage = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($voyage) {
        echo json_encode($voyage);
    } else {
        echo json_encode(["error" => "Voyage non trouvé."]);
    }
} else {
    echo json_encode(["error" => "ID de voyage non spécifié."]);
}