<?php
session_start();

// Vérification de l'authentification
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

require '../db_config.php'; // Remonter au dossier parent pour la connexion BD

$message = '';
$action = $_GET['action'] ?? '';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// --- 1. Logique de Suppression (DELETE) ---
if ($action === 'delete' && $id) {
    try {
        $stmt = $pdo->prepare("DELETE FROM News WHERE news_id = ?");
        $stmt->execute([$id]);
        $message = "Actualité (ID: $id) supprimée avec succès.";
    } catch (PDOException $e) {
        $message = "Erreur lors de la suppression: " . $e->getMessage();
    }
    header('Location: news_management.php?message=' . urlencode($message));
    exit();
}

// --- 2. Logique d'Ajout/Modification (CREATE/UPDATE) ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'] ?? '';
    $resume = $_POST['resume'] ?? '';
    $contenu = $_POST['contenu'] ?? '';
    $news_id = filter_input(INPUT_POST, 'news_id', FILTER_VALIDATE_INT);

    if ($news_id) { // Modification (UPDATE)
        $sql = "UPDATE News SET titre=?, résumé=?, contenu=? WHERE news_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titre, $resume, $contenu, $news_id]);
        $message = "Actualité modifiée avec succès.";
    } else { // Ajout (CREATE)
        $sql = "INSERT INTO News (titre, résumé, contenu, date_publication) VALUES (?, ?, ?, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titre, $resume, $contenu]);
        $message = "Nouvelle actualité ajoutée avec succès.";
    }
    header('Location: news_management.php?message=' . urlencode($message));
    exit();
}

// Afficher un message de succès après redirection
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}

// --- 3. Récupération pour l'édition et l'affichage ---
$news_to_edit = null;
if ($action === 'edit' && $id) {
    $stmt = $pdo->prepare("SELECT * FROM News WHERE news_id = ?");
    $stmt->execute([$id]);
    $news_to_edit = $stmt->fetch();
}

// Récupérer toutes les news pour l'affichage de la liste
$stmt = $pdo->query("SELECT news_id, titre, date_publication FROM News ORDER BY date_publication DESC");
$all_news = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Actualités | Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .news-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .news-table th, .news-table td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        .news-table th { background-color: #FFC72C; }
        form input[type="text"], form textarea { width: 100%; padding: 10px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; }
        form label { font-weight: bold; display: block; margin-top: 10px; }
        .logout-link { float: right; margin-top: 10px; }
    </style>
</head>
<body>
    <div id="container" style="width: 80%; max-width: 1000px; padding: 20px;">
        <a href="logout.php" class="logout-link" style="color: #D52B1E;">Déconnexion</a>
        <h1>Administration des Actualités</h1>

        <?php if ($message): ?>
            <p style="color: green; font-weight: bold;"><?php echo $message; ?></p>
        <?php endif; ?>

        <h2><?php echo $news_to_edit ? 'Modifier l\'Actualité (ID: ' . $news_to_edit['news_id'] . ')' : 'Ajouter une Nouvelle Actualité'; ?></h2>
        
        <form action="news_management.php" method="POST">
            <?php if ($news_to_edit): ?>
                <input type="hidden" name="news_id" value="<?php echo $news_to_edit['news_id']; ?>">
            <?php endif; ?>

            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" required 
                   value="<?php echo $news_to_edit ? htmlspecialchars($news_to_edit['titre']) : ''; ?>">

            <label for="resume">Résumé:</label>
            <textarea id="resume" name="resume" rows="3" required><?php echo $news_to_edit ? htmlspecialchars($news_to_edit['résumé']) : ''; ?></textarea>

            <label for="contenu">Contenu:</label>
            <textarea id="contenu" name="contenu" rows="8" required><?php echo $news_to_edit ? htmlspecialchars($news_to_edit['contenu']) : ''; ?></textarea>

            <button type="submit"><?php echo $news_to_edit ? 'Enregistrer les modifications' : 'Ajouter la News'; ?></button>
            <?php if ($news_to_edit): ?>
                <a href="news_management.php" style="margin-left: 10px;">Annuler la modification</a>
            <?php endif; ?>
        </form>

        <hr>

        <h2>Liste des Actualités Actuelles</h2>
        <?php if (empty($all_news)): ?>
            <p>Aucune actualité n'a été trouvée.</p>
        <?php else: ?>
            <table class="news-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Date de publication</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_news as $news): ?>
                        <tr>
                            <td><?php echo $news['news_id']; ?></td>
                            <td><?php echo htmlspecialchars($news['titre']); ?></td>
                            <td><?php echo $news['date_publication']; ?></td>
                            <td>
                                <a href="news_management.php?action=edit&id=<?php echo $news['news_id']; ?>">Modifier</a> |
                                <a href="news_management.php?action=delete&id=<?php echo $news['news_id']; ?>" 
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>