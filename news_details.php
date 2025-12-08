<?php
require 'db_config.php';
$news = false; // Initialisation pour éviter l'erreur
$news_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($news_id) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM News WHERE news_id = ?");
        $stmt->execute([$news_id]);
        $news = $stmt->fetch();
    } catch (PDOException $e) {}
}

$page_title = $news ? htmlspecialchars($news['titre']) : "Introuvable"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <?php if ($news): ?>
        <article>

            <?php
            // Formatage de la date de publication (si elle existe)
            $datePub = '';
            if (!empty($news['date_publication'])) {
                $datePub = date('d/m/Y à H:i', strtotime($news['date_publication']));
            }
            ?>

            <h2 style="color: #2E8B57;"><?php echo htmlspecialchars($news['titre']); ?></h2>

            <!-- Affichage de la date -->
            <?php if ($datePub): ?>
                <p style="color: gray; font-size: 14px;">
                    Publié le : <?php echo $datePub; ?>
                </p>
            <?php endif; ?>

            <div style="background:#EBF5FB; padding:15px; border-left:4px solid #5DADE2; margin:20px 0;">
                <?php echo nl2br(htmlspecialchars($news['resume'] ?? '')); ?>
            </div>

            <div>
                <?php echo nl2br(htmlspecialchars($news['contenu'])); ?>
            </div>
        </article>
    <?php else: ?>
        <p>Article introuvable.</p>
    <?php endif; ?>

    <div style="margin-top:30px;">
        <a href="all_news.php" class="btn-secondary">← Retour</a>
    </div>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>
