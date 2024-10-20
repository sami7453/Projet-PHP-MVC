<?php
require_once 'models/Database.php';
require_once 'models/User.php';
require_once 'config/session.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $database = new Database();
        $pdo = $database->connect();
        $this->userModel = new User($pdo);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $mot_de_passe = $_POST['mot_de_passe'];

            if ($this->userModel->register($nom, $prenom, $email, $tel, $mot_de_passe)) {
                header('Location: index.php?action=login');
            }
        }
        require 'views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $user = $this->userModel->login($email, $mot_de_passe);
            
            if ($user) {
                $_SESSION['user_id'] = $user['id_user'];
                header('Location: index.php');
            } else {
                $error = "Email ou mot de passe incorrect.";
            }
        }
        require 'views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php');
    }
}
?>
