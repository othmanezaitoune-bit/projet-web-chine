<?php
// Initialisation session et BDD
session_start();
require 'db_config.php';

$page_title = "Toutes les Actualités"; 

// --- LOGIQUE (Recherche & Pagination) ---
$news_par_page = 5; 
$page = filter_input(INPUT_GET, 'p', FILTER_VALIDATE_INT) ?? 1;
if ($page < 1) $page = 1;

$search_term = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS) ?? '';
$where_sql = '';
$params = [];

// Construction de la recherche CORRIGÉE
if (!empty($search_term)) {
    // CORRECTION : Avec ATTR_EMULATE_PREPARES = false, on ne peut pas réutiliser ":search" 3 fois.
    // On doit utiliser des marqueurs uniques (:s1, :s2, :s3).
    $where_sql = " WHERE titre LIKE :s1 OR resume LIKE :s2 OR contenu LIKE :s3 ";
    $term = '%' . $search_term . '%';
    
    $params[':s1'] = $term;
    $params[':s2'] = $term;
    $params[':s3'] = $term;
}

// 1. Compter le total (pour la pagination)
$total_pages = 1;
$total_news = 0; // Initialisation par défaut
try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM News" . $where_sql);
    $stmt->execute($params);
    $total_news = $stmt->fetchColumn();
    $total_pages = ceil($total_news / $news_par_page);
} catch (PDOException $e) { 
    // En cas d'erreur SQL, on garde 0 news
    $total_news = 0; 
}

// 2. Récupérer les articles
$offset = ($page - 1) * $news_par_page;
$news_list = [];

if ($total_news > 0) {
    $sql = "SELECT * FROM News" . $where_sql . " ORDER BY date_publication DESC LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    
    // Bind des paramètres de recherche
    foreach ($params as $key => $val) { 
        $stmt->bindValue($key, $val); 
    }
    
    // Bind des paramètres de pagination
    $stmt->bindValue(':limit', $news_par_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
    try {
        $stmt->execute();
        $news_list = $stmt->fetchAll();
    } catch (PDOException $e) {
        // Gestion silencieuse
    }
}

include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <div style="border-bottom: 1px solid #eee; margin-bottom: 20px; padding-bottom: 10px;">
        <h2 style="color: #2E8B57; margin: 0;">📰 Toutes les Actualités</h2>
    </div>
    
    <form method="GET" action="all_news.php" class="search-bar-form">
        <label for="search">Rechercher :</label>
        <input type="text" name="search" id="search" placeholder="Mots-clés..." value="<?php echo htmlspecialchars($search_term); ?>">
        <button type="submit">🔍</button>
        
        <?php if (!empty($search_term)): ?>
            <a href="all_news.php" class="reset-link">Effacer</a>
        <?php endif; ?>
    </form>
    
    <?php if (empty($news_list)): ?>
        <?php if (!empty($search_term)): ?>
            <div class="result-box error" style="text-align: center; margin-top: 20px;">
                <h3 style="margin-top:0; color:#c62828;">Aucun résultat</h3>
                <p>Aucune actualité ne contient le terme "<strong><?php echo htmlspecialchars($search_term); ?></strong>".</p>
                <a href="all_news.php" class="btn-secondary">Voir tout</a>
            </div>
        <?php else: ?>
            <p>Aucune actualité publiée pour le moment.</p>
        <?php endif; ?>
    <?php else: ?>
        
        <div class="news-feed">
            <?php foreach ($news_list as $news): ?>
                <div style="border: 1px solid #eee; border-radius: 8px; padding: 20px; margin-bottom: 20px; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.03); transition: transform 0.2s;">
                    <h3 style="margin-top: 0; margin-bottom: 10px;">
                        <a href="news_details.php?id=<?php echo $news['news_id']; ?>" style="text-decoration: none; color: #2E8B57;">
                            <?php echo htmlspecialchars($news['titre']); ?>
                        </a>
                    </h3>
                    <div style="font-size: 0.85em; color: #5DADE2; font-weight: bold; margin-bottom: 10px;">
                        📅 <?php echo date("d/m/Y", strtotime($news['date_publication'])); ?>
                    </div>
                    <p style="color: #555; line-height: 1.5;">
                        <?php echo nl2br(htmlspecialchars($news['resume'] ?? $news['résumé'] ?? '')); ?>
                    </p>
                    <a href="news_details.php?id=<?php echo $news['news_id']; ?>" style="color: #2E8B57; font-weight: bold; text-decoration: none; font-size: 0.95em;">
                        Lire la suite &rarr;
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ($total_pages > 1): ?>
            <div class="pagination" style="text-align: center; margin-top: 40px;">
                <?php 
                $url_param = !empty($search_term) ? "&search=" . urlencode($search_term) : ""; 
                ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?p=<?php echo $i . $url_param; ?>" 
                       style="display: inline-block; padding: 8px 12px; margin: 0 2px; border-radius: 4px; text-decoration: none; border: 1px solid #2E8B57; 
                       <?php echo ($i == $page) ? 'background-color: #2E8B57; color: white;' : 'background-color: white; color: #2E8B57;'; ?>">
                       <?php echo $i; ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

    <?php endif; ?>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>