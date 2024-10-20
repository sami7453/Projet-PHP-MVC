<?php include 'header.php'; ?>

<div class="modal-overlay">
    <div class="modal-content">
        <form method="POST" action="index.php?action=register">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="prenom">Prénom:</label>
            <input type="text" id="prenom" name="prenom" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="tel">Téléphone:</label>
            <input type="tel" id="tel" name="tel" required>

            <label for="mot_de_passe">Mot de passe:</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <button type="submit">S'inscrire</button>
        </form>

        <form action="index.php" method="GET">
            <button type="submit" class="retour">Retour à l'accueil</button>
        </form>
    </div>
</div>

