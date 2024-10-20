<?php include 'header.php'; ?>

<div class="modal-overlay">
    <div class="modal-content">
        <form method="POST" action="index.php?action=login">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mot_de_passe">Mot de passe:</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <button type="submit">Connexion</button>
        </form>

        <form action="index.php" method="GET">
            <button type="submit" class="retour">Retour à l'accueil</button>
            <p>Pas encore inscrit ? <a href="index.php?action=register">S'inscrire</a></p>
        </form>
    </div>
</div>


