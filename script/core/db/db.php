<?php
class Db {
    private $host = "localhost";
    private $username = "antoine_codeur";
    private $password = "parapluit";
    private $dbname = "JCP_Vacances";
    public $conn;
    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
            exit;
        }
        return $this->conn;
    }

    public function prepare($sql) {
        try {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        } catch(PDOException $exception) {
            echo "Erreur lors de la préparation : " . $exception->getMessage();
            return null;
        }
    }
    public function getUsernameById($userId) {
        try {
            $stmt = $this->conn->prepare("SELECT username FROM user WHERE id_user = :userId");
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['username'] : null;
        } catch(PDOException $exception) {
            echo "Erreur lors de la récupération du nom d'utilisateur : " . $exception->getMessage();
            return null;
        }
    }
    public function addVoyage($data) {
        try {
            $sql = "INSERT INTO voyage (id_categorie, id_formule, title, image_url, description, date_debut, date_fin, price) VALUES (:id_categorie, :id_formule, :title, :image_url, :description, :date_debut, :date_fin, :price)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($data);
            return true;
        } catch(PDOException $exception) {
            echo "Erreur lors de l'ajout du voyage : " . $exception->getMessage();
            return false;
        }
    }
    public function getUserThemeId($userId) {
        try {
            $stmt = $this->conn->prepare("SELECT id_theme FROM user WHERE id_user = ?");
            $stmt->execute([$userId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                return $result['id_theme'];
            } else {

                return null;
            }
        } catch(PDOException $exception) {
            echo "Erreur lors de la récupération de l'id_theme : " . $exception->getMessage();
            return null;
        }
    }
    public function updateUserThemeId($userId, $themeId) {
        try {
            $stmt = $this->conn->prepare("UPDATE user SET id_theme = :themeId WHERE id_user = :userId");
            $stmt->bindParam(':themeId', $themeId, PDO::PARAM_INT);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $exception) {
            error_log("Erreur lors de la mise à jour de l'id_theme : " . $exception->getMessage());
            return false;
        }
    }

}
