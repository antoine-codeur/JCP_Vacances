<?php
class UpdateVoyage extends BaseVoyage {

    public function update($id_voyage, $title, $image_url, $description, $date_debut, $date_fin, $price) {
        $query = "UPDATE voyage SET title=?, image_url=?, description=?, date_debut=?, date_fin=?, price=? WHERE id_voyage=?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssii", $title, $image_url, $description, $date_debut, $date_fin, $price, $id_voyage);

        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
