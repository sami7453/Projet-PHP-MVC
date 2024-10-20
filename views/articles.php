<?php include 'header.php'; ?>

    <main>
            <article>
                <?php if ($articles): ?>
                    <?php foreach ($articles as $article): ?>
                        <div class="article">
                            <img src="images/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['titre']); ?>">
                            <div class="article-content">
                                <h2><?php echo htmlspecialchars($article['titre']); ?></h2>
                                <p><?php echo htmlspecialchars($article['contenu']); ?></p>
                                <p>Date d'ajout : <?php echo htmlspecialchars($article['date_creation']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucun article disponible.</p>
                <?php endif; ?>
            </article>
    </main>

<?php include 'footer.php'; ?>


