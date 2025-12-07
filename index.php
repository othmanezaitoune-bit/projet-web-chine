<?php
$page_title = "Accueil - Voyage en Chine"; 
require 'db_config.php'; 
session_start(); 

try {
    $stmt = $pdo->query("SELECT news_id, titre, date_publication FROM News ORDER BY date_publication DESC LIMIT 3");
    $latest_news = $stmt->fetchAll();
} catch (PDOException $e) { $latest_news = []; }

include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    
    <div style="background-color: #E8F5E9; border-left: 5px solid #2E8B57; padding: 20px; border-radius: 4px; margin-bottom: 30px;">
        <h2 style="margin-top:0; color:#2E8B57;">Bienvenue au cœur de la Chine !</h2>
        <p>De la Grande Muraille aux rizières en terrasses, explorez une culture millénaire.</p>
    </div>

    <hr style="border: 0; border-top: 1px solid #eee; margin: 30px 0;">
    
    <h3 style="color: #2E8B57;">🌿 Nos Coups de Cœur</h3>
    
    <div class="favorites-list" style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">
        
        <a href="detail_coeur1.php" class="favorite-card" style="width: 380px; text-decoration: none;">
            <img src="images/Rizières de Chine 🇨🇳.jfif" alt="Rizières" style="width: 100%; height: 260px; object-fit: cover; display: block;">
            <div class="card-title" style="padding: 15px; text-align: center; font-weight: bold; font-size: 1.1em;">Rizières en Terrasses</div>
        </a>
        
        <a href="detail_coeur2.php" class="favorite-card" style="width: 380px; text-decoration: none;">
            <img src="images/The mountains of Guilin are not as grand as those….jfif" alt="Montagnes" style="width: 100%; height: 260px; object-fit: cover; display: block;">
            <div class="card-title" style="padding: 15px; text-align: center; font-weight: bold; font-size: 1.1em;">Pics Karstiques de Guilin</div>
        </a>
        
        <a href="detail_coeur3.php" class="favorite-card" style="width: 380px; text-decoration: none;">
            <img src="images/From KlickPin CF Panda Bears Enjoying Bamboo in Chengdu China.jpg" alt="Pandas" style="width: 100%; height: 260px; object-fit: cover; display: block;">
            <div class="card-title" style="padding: 15px; text-align: center; font-weight: bold; font-size: 1.1em;">Pandas Géants du Sichuan</div>
        </a>

    </div>
    
    <hr style="border: 0; border-top: 1px solid #eee; margin: 30px 0;">

    <h3 style="color: #2E8B57;">📰 Dernières Actualités</h3>
    <?php if (!empty($latest_news)): ?>
        <?php foreach ($latest_news as $news): ?>
            <div style="border-bottom: 1px dashed #ddd; padding-bottom: 15px; margin-bottom: 15px;">
                <span style="color: #5DADE2; font-weight: bold; font-size: 0.9em;">
                    <?php echo date("d/m/Y", strtotime($news['date_publication'])); ?>
                </span>
                <h4 style="margin: 5px 0; color: #333;"><?php echo htmlspecialchars($news['titre']); ?></h4>
                <a href="news_details.php?id=<?php echo $news['news_id']; ?>" style="color: #2E8B57; text-decoration: none; font-weight: bold;">Lire la suite &rarr;</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucune actualité récente.</p>
    <?php endif; ?>
    
    <div style="text-align: right; margin-top: 20px;">
        <a href="all_news.php" class="btn-secondary">Toutes les news &rarr;</a>
    </div>

</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>