<?php
require 'db_config.php';

$news_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$news = false; 

if ($news_id) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM News WHERE news_id = ?");
        $stmt->execute([$news_id]);
        $news = $stmt->fetch();
    } catch (PDOException $e) {
        // En cas d'erreur de BD
        $error_message = "Impossible de récupérer l'actualité.";
    }
}

// Récupération complète de la structure uniforme pour l'affichage
// (Dans un vrai projet, on utiliserait un include pour le header et le footer)
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $news ? htmlspecialchars($news['titre']) : 'Actualité non trouvée'; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="container">
        <header id="header"></header>

        <div id="content-wrapper">
            <aside id="left-nav">...</aside>
            
            <main id="center-content">
                <?php if ($news): ?>
                    <p style="color:#666;">Publié le: <?php echo htmlspecialchars($news['date_publication']); ?></p>
                    <h2><?php echo htmlspecialchars($news['titre']); ?></h2>
                    
                    <h3>Résumé</h3>
                    <p style="font-style: italic;"><?php echo nl2br(htmlspecialchars($news['résumé'])); ?></p>
                    
                    <h3>Contenu</h3>
                    <div style="border-left: 3px solid #FFC72C; padding-left: 15px;">
                        <p><?php echo nl2br(htmlspecialchars($news['contenu'])); ?></p>
                    </div>

                <?php else: ?>
                    <h2>Actualité non trouvée</h2>
                    <p><?php echo isset($error_message) ? $error_message : "L'actualité demandée n'existe pas ou l'ID est invalide."; ?></p>
                <?php endif; ?>
                <p style="margin-top: 20px;"><a href="all_news.php">Retour à toutes les news</a></p>
            </main>

            <aside id="right-side">...</aside>
        </div>
        <footer id="footer">...</footer>
    </div>
</body>
</html>