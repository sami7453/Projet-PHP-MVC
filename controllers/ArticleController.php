<?php
require_once 'models/Article.php';
require_once 'models/Database.php';

class ArticleController {
    private $articleModel;

    public function __construct() {
        $database = new Database();
        $pdo = $database->connect();
        $this->articleModel = new Article($pdo);
    }

    
    public function listArticles() {
        $categorie = isset($_GET['categorie']) ? $_GET['categorie'] : '';

        if ($categorie) {
            $articles = $this->articleModel->getArticlesByCategorie($categorie);
        } else {
            $articles = $this->articleModel->getAllArticles();
        }

        require 'views/articles.php';
    }
}
?>
