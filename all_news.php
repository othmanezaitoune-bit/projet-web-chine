<?php
// Démarrer la session au cas où (bien que non obligatoire ici)
session_start();
require 'db_config.php';

// Paramètres de pagination
$news_par_page = 10;
$page = filter_input(INPUT_GET, 'p', FILTER_VALIDATE_INT) ?? 1;

if ($page < 1) {
    $page = 1;
}

// 1. Compter le nombre total de news et calculer le nombre total de pages
try {
    $total_news = $pdo->query('SELECT COUNT(*) FROM News')->fetchColumn();
    $total_pages = ceil($total_news / $news_par_page);
} catch (PDOException $e) {
    $total_news = 0;
    $total_pages = 1;
}

// Calcul de l'offset (point de départ pour la requête SQL)
$offset = ($page - 1) * $news_par_page;

// 2. Récupérer les news pour la page actuelle
try {
    $sql = "SELECT news_id, titre, résumé, date_publication FROM News 
            ORDER BY date_publication DESC 
            LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $news_par_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $news_list = $stmt->fetchAll();
} catch (PDOException $e) {
    $news_list = [];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Toutes les Actualités</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Styles pour la pagination */
        .pagination { margin-top: 20px; text-align: center; }
        .pagination a, .pagination strong {
            padding: 8px 12px;
            text-decoration: none;
            border: 1px solid #D52B1E;
            margin: 0 4px;
            border-radius: 3px;
        }
        .pagination strong {
            background-color: #D52B1E;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="container">
        <header id="header"></header>

        <div id="content-wrapper">
            <aside id="left-nav">...</aside>
            
            <main id="center-content">
                <h2>Toutes les Actualités (<?php echo $total_news; ?> trouvées)</h2>
                
                <?php if (empty($news_list)): ?>
                    <p>Aucune actualité à afficher pour le moment.</p>
                <?php else: ?>
                    
                    <?php foreach ($news_list as $news): ?>
                        <div class="news-item" style="margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid #eee;">
                            <h3><?php echo htmlspecialchars($news['titre']); ?></h3>
                            <p><em>Publié le: <?php echo htmlspecialchars($news['date_publication']); ?></em></p>
                            <p><?php echo nl2br(htmlspecialchars($news['résumé'])); ?></p>
                            <p><a href="news_details.php?id=<?php echo $news['news_id']; ?>">Cliquez ici pour plus de détail</a></p>
                        </div>
                    <?php endforeach; ?>

                    <?php if ($total_pages > 1): ?>
                        <div class="pagination">
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <?php if ($i == $page): ?>
                                    <strong><?php echo $i; ?></strong>
                                <?php else: ?>
                                    <a href="all_news.php?p=<?php echo