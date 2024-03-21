<?php
class ReadVoyage extends BaseVoyage {

public function read() {
    $query = "SELECT id_voyage, title, image_url, description, date_debut, date_fin, price FROM voyage";
    $result = $this->conn->query($query);
    
    return $result;
}
}
