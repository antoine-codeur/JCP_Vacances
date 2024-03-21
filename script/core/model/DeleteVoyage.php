<?php
class DeleteVoyage extends BaseVoyage {

public function delete($id_voyage) {
    $query = "DELETE FROM voyage WHERE id_voyage=?";

    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $id_voyage);

    if($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
}
