<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($nom, $prenom, $email, $tel, $mot_de_passe) {
        $hashedPassword = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $query = "INSERT INTO utilisateur (nom, prenom, email, tel, mot_de_passe) VALUES (:nom, :prenom, :email, :tel, :mot_de_passe)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':mot_de_passe', $hashedPassword);
        return $stmt->execute();
    }

    public function login($email, $mot_de_passe) {
        $query = "SELECT * FROM utilisateur WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
            return $user;
        }
        return false;
    }

    public function getUserById($id_user) {
        $query = "SELECT nom, prenom, email FROM utilisateur WHERE id_user = :id_user";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
