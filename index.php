<?php
require 'db_config.php';

// Récupération des news
try {
    $stmt = $pdo->query("SELECT news_id, titre, date_publication FROM News ORDER BY date_publication DESC LIMIT 3");
    $latest_news = $stmt->fetchAll();
} catch (PDOException $e) { $latest_news = []; }

// 1. INCLURE LE HEADER
include 'header.php'; 

// 2. INCLURE LA SIDEBAR GAUCHE
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>Bienvenue en Chine !</h2>
    
    <h3>Nos Coups de Cœur</h3>
    <div class="coups-de-coeur-gallery" style="display: flex; gap: 15px; margin-bottom: 30px;">
        <img src="images/coeur1.jpg" alt="Paysage 1" style="width: 30%; border: 2px solid #FFC72C;">
        <img src="images/coeur2.jpg" alt="Paysage 2" style="width: 30%; border: 2px solid #FFC72C;">
        <img src="images/coeur3.jpg" alt="Paysage 3" style="width: 30%; border: 2px solid #FFC72C;">
    </div>
    
    <hr>

    <h3>Dernières Actualités</h3>
    <?php if (!empty($latest_news)): ?>
        <?php foreach ($latest_news as $news): ?>
            <div class="news-summary" style="margin-bottom: 15px; padding-bottom:10px; border-bottom:1px dashed #ccc;">
                <span style="color:#D52B1E; font-size:0.9em;"><?php echo $news['date_publication']; ?></span>
                <h4 style="margin:5px 0;"><?php echo htmlspecialchars($news['titre']); ?></h4>
                <a href="news_details.php?id=<?php echo $news['news_id']; ?>">Lire la suite &rarr;</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucune actualité pour le moment.</p>
    <?php endif; ?>
    <p><a href="all_news.php" class="btn">>> Toutes les news</a></p>
</main>

<aside id="right-side">
    <div id="video-container">
        <video width="100%" height="auto" controls poster="images/poster_chine.jpg">
            <source src="video/docu_chine.mp4" type="video/mp4">
            Vidéo non supportée.
        </video>
    </div>
    
    <div id="newsletter-form-container">
        <h3>Newsletter</h3>
        <p>Recevez les dernières infos.</p>
        <form action="newsletter_subscribe.php" method="POST">
            <input type="email" name="email" placeholder="Votre email" required>
            <button type="submit">Je m'inscris</button>
        </form>
    </div>
</aside>

<?php 
// 5. INCLURE LE FOOTER
include 'footer.php'; 
?>