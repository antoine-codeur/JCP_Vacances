<?php
class CreateVoyage extends BaseVoyage {

    public function create($title, $image_url, $description, $date_debut, $date_fin, $price) {
        $query = "INSERT INTO voyage (title, image_url, description, date_debut, date_fin, price) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssi", $title, $image_url, $description, $date_debut, $date_fin, $price);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
