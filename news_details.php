<?php
require 'db_config.php';
$news_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$news = false; 

if ($news_id) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM News WHERE news_id = ?");
        $stmt->execute([$news_id]);
        $news = $stmt->fetch();
    } catch (PDOException $e) { /* Gérer l'erreur silencieusement */ }
}

$page_title = $news ? htmlspecialchars($news['titre']) : "Actualité non trouvée"; 

include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <?php if ($news): ?>
        <p style="color:#666; font-size:0.9em;">Publié le: <?php echo htmlspecialchars($news['date_publication']); ?></p>
        
        <h2><?php echo htmlspecialchars($news['titre']); ?></h2>
        
        <h3 style="color: #D52B1E;">Résumé</h3>
        <p style="font-style: italic; font-weight: bold;">
            <?php echo nl2br(htmlspecialchars($news['resume'] ?? $news['résumé'] ?? '')); ?>
        </p>
        
        <hr>

        <h3 style="color: #D52B1E;">Contenu</h3>
        <div style="line-height: 1.8;">
            <?php echo nl2br(htmlspecialchars($news['contenu'])); ?>
        </div>

    <?php else: ?>
        <h2>Actualité non trouvée</h2>
        <p>L'actualité demandée n'existe pas ou l'ID est invalide.</p>
    <?php endif; ?>
    
    <p style="margin-top: 30px;">
        <a href="all_news.php" style="text-decoration: none; color: #333; font-weight: bold;">&larr; Retour à toutes les news</a>
    </p>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>