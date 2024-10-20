<?php
class Article {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer tous les articles
    public function getAllArticles() {
        $query = "SELECT id_article, titre, contenu, image, date_creation FROM article ORDER BY date_creation DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer les articles par catégorie
    public function getArticlesByCategorie($categorie) {
        $query = "SELECT a.id_article, a.titre, a.contenu, a.image, a.date_creation 
                  FROM article a 
                  JOIN categorie c ON a.id_categorie = c.id_categorie 
                  WHERE c.nom = :categorie 
                  ORDER BY a.date_creation DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajouter un nouvel article
    public function addArticle($id_user, $id_categorie, $titre, $contenu, $image) {
        $query = "INSERT INTO article (id_user, id_categorie, titre, contenu, image, date_creation) 
                  VALUES (:id_user, :id_categorie, :titre, :contenu, :image, NOW())";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_categorie', $id_categorie);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }
}
?>
