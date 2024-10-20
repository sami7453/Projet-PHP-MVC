<?php include 'header.php'; ?>

<main class="profile-page">
    <section class="profile-info">
        <h2>Mon Profil</h2>
        <p><strong>Nom:</strong> <?php echo htmlspecialchars($user['nom']); ?></p>
        <p><strong>Prénom:</strong> <?php echo htmlspecialchars($user['prenom']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    </section>

    <section class="post-article">
        <h3>Poster un article</h3>
        <form method="POST" enctype="multipart/form-data">
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" required>

            <label for="contenu">Contenu:</label>
            <textarea id="contenu" name="contenu" required></textarea>

            <label for="categorie">Catégorie:</label>
            <select id="categorie" name="categorie" required>
                <option value="1">Sport</option>
                <option value="2">Politique</option>
                <option value="3">Tech</option>
            </select>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required>

            <div class="form-buttons">
                <button type="submit">Publier</button>
                <button type="button" class="retour" onclick="window.location.href='index.php'">Retour à l'accueil</button>
            </div>
        </form>
    </section>
</main>


<?php include 'footer.php'; ?>
