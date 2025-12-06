<?php
// Définir le titre
$page_title = "Toutes les Actualités"; 
session_start();
require 'db_config.php';

// --- LOGIQUE DE RECHERCHE ET DE PAGINATION ---
$news_par_page = 10;

// 1. Récupération du terme de recherche
$search_term = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
$where_clause = '';
$bind_params = [];
$total_news = 0;
$total_pages = 1;

if (!empty($search_term)) {
    // Si un terme est présent, on construit la clause WHERE
    $where_clause = " WHERE titre LIKE :search_term OR contenu LIKE :search_term ";
    // On utilise % autour du terme pour la recherche partielle
    $bind_params[':search_term'] = '%' . $search_term . '%';
}

// 2. Gestion du numéro de page
$page = filter_input(INPUT_GET, 'p', FILTER_VALIDATE_INT) ?? 1;
if ($page < 1) { $page = 1; }

// 3. Compter le nombre total de news (avec ou sans filtre)
try {
    $stmt_count = $pdo->prepare("SELECT COUNT(*) FROM News" . $where_clause);
    $stmt_count->execute($bind_params);
    $total_news = $stmt_count->fetchColumn();
    $total_pages = ceil($total_news / $news_par_page);
} catch (PDOException $e) {
    $total_news = 0;
}

// Calcul de l'offset
$offset = ($page - 1) * $news_par_page;

// 4. Récupérer les news pour la page actuelle (avec ou sans filtre)
$news_list = [];
if ($total_news > 0) {
    try {
        $sql = "SELECT news_id, titre, résumé, date_publication FROM News"
             . $where_clause
             . " ORDER BY date_publication DESC 
                LIMIT :limit OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        
        // Lier les paramètres de recherche et de pagination
        $final_params = array_merge($bind_params, [
            ':limit' => $news_par_page,
            ':offset' => $offset
        ]);
        
        // Exécuter la requête en passant les paramètres liés à PDO::PARAM_INT explicitement
        $stmt->bindValue(':limit', $news_par_page, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        if (!empty($search_term)) {
             $stmt->bindValue(':search_term', $bind_params[':search_term'], PDO::PARAM_STR);
        }
        $stmt->execute();
        
        $news_list = $stmt->fetchAll();
    } catch (PDOException $e) {
        // En cas d'erreur de requête
    }
}

include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>Toutes les Actualités (Page <?php echo $page; ?> sur <?php echo $total_pages; ?>)</h2>
    
    <form method="GET" action="all_news.php" style="margin-bottom: 20px; padding: 10px; background-color: #f0f0f0; border: 1px solid #eee;">
        <label for="search" style="font-weight: bold;">Rechercher une actualité :</label>
        <input type="text" name="search" id="search" placeholder="Entrez un mot-clé..." 
               value="<?php echo htmlspecialchars($search_term); ?>" 
               style="padding: 8px; width: 70%; border: 1px solid #ccc; margin-right: 10px;">
        <button type="submit" style="padding: 8px 15px; background-color: #D52B1E; color: white; border: none; cursor: pointer;">Rechercher</button>
    </form>
    
    <?php if (!empty($search_term) && empty($news_list)): ?>
        <p style="padding: 10px; background-color: #fff0f0; border: 1px solid #D52B1E;">Aucun résultat trouvé pour "<?php echo htmlspecialchars($search_term); ?>".</p>
    <?php elseif (empty($news_list)): ?>
        <p>Aucune actualité à afficher pour le moment. L'administrateur doit en ajouter.</p>
    <?php else: ?>
        
        <?php foreach ($news_list as $news): ?>
            <div class="news-item" style="margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px dashed #ccc;">
                <h3><?php echo htmlspecialchars($news['titre']); ?></h3>
                <p><em>Publié le: <?php echo htmlspecialchars($news['date_publication']); ?></em></p>
                <p><?php echo nl2br(htmlspecialchars($news['résumé'])); ?></p>
                <p><a href="news_details.php?id=<?php echo $news['news_id']; ?>">Cliquez ici pour plus de détail &rarr;</a></p>
            </div>
        <?php endforeach; ?>

        <?php if ($total_pages > 1): ?>
            <div class="pagination" style="text-align: center; margin-top: 30px;">
                <?php
                // Définir la base de l'URL pour la pagination (inclut le terme de recherche si présent)
                $pagination_base_url = 'all_news.php?';
                if (!empty($search_term)) {
                    // urlencode est essentiel pour que le terme de recherche soit correctement transmis dans l'URL
                    $pagination_base_url .= 'search=' . urlencode($search_term) . '&';
                }
                ?>
                
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <?php if ($i == $page): ?>
                        <strong style="background-color: #D52B1E; color: white; padding: 5px 10px; border-radius: 3px;"><?php echo $i; ?></strong>
                    <?php else: ?>
                        <a href="<?php echo $pagination_base_url; ?>p=<?php echo $i; ?>" style="border: 1px solid #D52B1E; padding: 5px 10px; text-decoration: none; color: #D52B1E;"><?php echo $i; ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
        
    <?php endif; ?>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>