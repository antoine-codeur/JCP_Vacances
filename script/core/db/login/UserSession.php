<?php
class UserSession {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function login($username, $password) {
        if ($username == "admin" && $password == "password") {
            $_SESSION['user'] = $username;
            return true;
        }
        return false;
    }
    public function logout() {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }    
    public function isLoggedIn() {
        return isset($_SESSION['user']);
    }
}
