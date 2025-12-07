<?php
// Définir le titre avant d'inclure le header
$page_title = "Accueil - Découvrez la Chine"; 
require 'db_config.php';
session_start(); 

// Récupération des 3 dernières news
try {
    $stmt = $pdo->query("SELECT news_id, titre, date_publication FROM News ORDER BY date_publication DESC LIMIT 3");
    $latest_news = $stmt->fetchAll();
} catch (PDOException $e) { 
    $latest_news = []; 
}

include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    
    <div class="welcome-banner">
        <h2>Bienvenue au cœur de la Chine !</h2>
        <p>
            Explorez la diversité culturelle, les paysages époustouflants et les merveilles technologiques de la Chine. De la Grande Muraille aux pics karstiques de Guilin, votre voyage commence ici.
        </p>
    </div>

    <hr>
    
    <h3>Nos Coups de Cœur (Plus de détails sur clic)</h3>
    
    <div class="favorites-list">
        
        <a href="detail_coeur1.php" class="favorite-card">
            <img src="Rizières de Chine 🇨🇳.jfif" alt="Rizières en terrasses">
            <div class="card-title">Rizières en Terrasses</div>
        </a>
        
        <a href="detail_coeur2.php" class="favorite-card">
            <img src="The mountains of Guilin are not as grand as those….jfif" alt="Montagnes Karstiques">
            <div class="card-title">Montagnes Karstiques</div>
        </a>
        
        <a href="detail_coeur3.php" class="favorite-card">
            <img src="From KlickPin CF Panda Bears Enjoying Bamboo in Chengdu China.jpg" alt="Pandas Géants">
            <div class="card-title">Pandas Géants</div>
        </a>

    </div>
    
    <hr>

    <h3>Dernières Actualités</h3>
    <?php if (!empty($latest_news)): ?>
        <div class="news-list">
            <?php foreach ($latest_news as $news): ?>
                <div class="news-summary">
                    <span class="news-date"><?php echo htmlspecialchars($news['date_publication']); ?></span>
                    <h4><?php echo htmlspecialchars($news['titre']); ?></h4>
                    <a href="news_details.php?id=<?php echo $news['news_id']; ?>" class="read-more">Lire la suite &rarr;</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Aucune actualité récente.</p>
    <?php endif; ?>
    
    <p style="text-align: right; margin-top: 15px;">
        <a href="all_news.php" class="btn-all-news">>> Toutes les news</a>
    </p>

</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>