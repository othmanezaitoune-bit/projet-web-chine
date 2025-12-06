<?php
// Définir le titre avant d'inclure le header
$page_title = "Accueil - Découvrez la Chine"; 
require 'db_config.php';
session_start(); // Nécessaire si vous utilisez des sessions (pour les messages flash ou la démo)

// Récupération des 3 dernières news pour la page d'accueil
try {
    $stmt = $pdo->query("SELECT news_id, titre, date_publication FROM News ORDER BY date_publication DESC LIMIT 3");
    $latest_news = $stmt->fetchAll();
} catch (PDOException $e) { 
    // Gérer l'erreur de connexion/requête si nécessaire
    $latest_news = []; 
}

// --- INCLUSION DE LA STRUCTURE UNIFORME ---
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>Bienvenue au cœur de la Chine !</h2>
    
    <p>
        Explorez la diversité culturelle, les paysages époustouflants et les merveilles technologiques de la Chine. De la Grande Muraille aux pics karstiques de Guilin, votre voyage commence ici.
    </p>

    <hr>
    
    <h3>Nos Coups de Cœur (Plus de détails sur clic)</h3>
    <div class="coups-de-coeur-gallery" style="display: flex; gap: 15px; margin-bottom: 30px; justify-content: space-around; flex-wrap: wrap;">
        
        <a href="detail_coeur1.php" style="text-align: center; text-decoration: none; color: #333;">
            <img src="images/coeur1.jpg" alt="Rizières en terrasses" style="width: 150px; height: 100px; object-fit: cover; border: 2px solid #D52B1E;">
            <p style="margin-top: 5px; font-weight: bold;">Rizières</p>
        </a>
        
        <a href="detail_coeur2.php" style="text-align: center; text-decoration: none; color: #333;">
            <img src="images/coeur2.jpg" alt="Montagnes Karstiques" style="width: 150px; height: 100px; object-fit: cover; border: 2px solid #D52B1E;">
            <p style="margin-top: 5px; font-weight: bold;">Montagnes Karstiques</p>
        </a>
        
        <a href="detail_coeur3.php" style="text-align: center; text-decoration: none; color: #333;">
            <img src="images/coeur3.jpg" alt="Pandas Géants" style="width: 150px; height: 100px; object-fit: cover; border: 2px solid #D52B1E;">
            <p style="margin-top: 5px; font-weight: bold;">Pandas Géants</p>
        </a>
    </div>
    
    <hr>

    <h3>Dernières Actualités</h3>
    <?php if (!empty($latest_news)): ?>
        <?php foreach ($latest_news as $news): ?>
            <div class="news-summary" style="margin-bottom: 15px; padding-bottom:10px; border-bottom:1px dashed #ccc;">
                <span style="color:#D52B1E; font-size:0.9em;"><?php echo htmlspecialchars($news['date_publication']); ?></span>
                <h4 style="margin:5px 0;"><?php echo htmlspecialchars($news['titre']); ?></h4>
                <a href="news_details.php?id=<?php echo $news['news_id']; ?>">Cliquez ici pour plus de détail &rarr;</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucune actualité récente. Connectez-vous en Admin pour en ajouter.</p>
    <?php endif; ?>
    <p style="text-align: right;"><a href="all_news.php" class="btn">>> Toutes les news</a></p>
</main>

<?php include 'sidebar_right.php'; ?>

<?php include 'footer.php'; ?>