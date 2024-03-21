<?php
class BaseVoyage {
    protected $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
}
