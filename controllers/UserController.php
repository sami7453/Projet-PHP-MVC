<?php
require_once 'models/Database.php';
require_once 'models/User.php';
require_once 'models/Article.php';
require_once 'config/session.php';

class UserController {
    private $userModel;
    private $articleModel;

    public function __construct() {
        $database = new Database();
        $pdo = $database->connect();
        $this->userModel = new User($pdo);
        $this->articleModel = new Article($pdo);
    }

    public function profile() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $user = $this->userModel->getUserById($_SESSION['user_id']);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $id_categorie = $_POST['categorie'];
            $image = $_FILES['image']['name'];

            if ($this->articleModel->AddArticle($_SESSION['user_id'], $id_categorie, $titre, $contenu, $image)) {
                header('Location: index.php?action=profile');
            }
        }

        require 'views/profile.php';
    }
}
?>
