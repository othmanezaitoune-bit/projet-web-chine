<?php
session_start();
require '../db_config.php'; 

// 1. Vérification de l'authentification
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

$page_title = "Gestion des Actualités (CRUD)";
$error = '';
$success = '';
$current_action = 'list'; 
$edit_news = null; 

// --- TRAITEMENT DES ACTIONS ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';
    $titre = trim($_POST['titre'] ?? '');
    $resume = trim($_POST['resume'] ?? '');
    $contenu = trim($_POST['contenu'] ?? '');
    $news_id = filter_input(INPUT_POST, 'news_id', FILTER_VALIDATE_INT);
    
    if ($action != 'delete' && (empty($titre) || empty($resume) || empty($contenu))) {
        $error = "Tous les champs sont requis.";
        $current_action = ($action == 'update') ? 'edit' : 'add'; 
    } elseif ($action == 'add' && empty($error)) {
        try {
            // CORRECTION ICI : 'resume' (sans accent)
            $sql = "INSERT INTO News (titre, resume, contenu) VALUES (:titre, :resume, :contenu)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':titre' => $titre, ':resume' => $resume, ':contenu' => $contenu]);
            $success = "Nouvelle actualité ajoutée.";
        } catch (PDOException $e) { $error = "Erreur BDD: " . $e->getMessage(); }
    } elseif ($action == 'update' && empty($error) && $news_id) {
        try {
            // CORRECTION ICI : 'resume' (sans accent)
            $sql = "UPDATE News SET titre = :titre, resume = :resume, contenu = :contenu WHERE news_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':titre' => $titre, ':resume' => $resume, ':contenu' => $contenu, ':id' => $news_id]);
            $success = "Actualité modifiée.";
        } catch (PDOException $e) { $error = "Erreur BDD: " . $e->getMessage(); }
    } elseif ($action == 'delete' && $news_id) {
        try {
            $sql = "DELETE FROM News WHERE news_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$news_id]);
            $success = "Actualité supprimée.";
        } catch (PDOException $e) { $error = "Erreur BDD: " . $e->getMessage(); }
    }
} 

if (isset($_GET['action'])) {
    $current_action = $_GET['action'];
    if ($current_action == 'edit' && isset($_GET['id'])) {
        $news_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        try {
            $stmt = $pdo->prepare("SELECT * FROM News WHERE news_id = ?");
            $stmt->execute([$news_id]);
            $edit_news = $stmt->fetch();
        } catch (PDOException $e) { $error = "Erreur récupération."; }
    }
}

try {
    $stmt = $pdo->query("SELECT news_id, titre, date_publication FROM News ORDER BY date_publication DESC");
    $news_list = $stmt->fetchAll();
} catch (PDOException $e) { $news_list = []; }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="../css/style.css"> 
    <style>
        #admin-container { width: 90%; max-width: 1200px; margin: 20px auto; background: #fff; padding: 30px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        .admin-nav a { background-color: #333; color: white; padding: 10px 15px; text-decoration: none; margin-right: 10px; border-radius: 4px; display: inline-block; }
        
        /* Tableaux */
        .crud-table th, .crud-table td { padding: 12px; border: 1px solid #ddd; }
        .crud-table th { background-color: #eee; text-align: left; }
        
        /* Formulaire */
        .form-crud input[type="text"], .form-crud textarea { width: 100%; padding: 10px; margin-bottom: 15px; box-sizing: border-box; border: 1px solid #ccc; }
        .form-crud label { display: block; font-weight: bold; margin-bottom: 5px; }
        
        /* Nouveau style pour le bouton Ajouter */
        .btn-add {
            background-color: #28a745; /* Vert */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            font-size: 0.9em;
            display: inline-block;
        }
        .btn-add:hover { background-color: #218838; }

        /* Conteneur d'entête de liste */
        .list-header {
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }
    </style>
</head>
<body>
    <div id="admin-container">
        <h1>Administration du Site : Gestion des Actualités</h1>
        
        <nav class="admin-nav" style="margin-bottom: 30px;">
            <a href="news_management.php" style="background-color: #D52B1E;">Gérer les News (Actif)</a>
            <a href="messages.php">Voir les Messages</a>
            <a href="logout.php">Déconnexion</a>
        </nav>

        <?php if ($error): ?><p style="color: red; padding: 10px; border: 1px solid red; background: #ffe6e6;"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
        <?php if ($success): ?><p style="color: green; padding: 10px; border: 1px solid green; background: #e6ffe6;"><?php echo htmlspecialchars($success); ?></p><?php endif; ?>

        <?php if ($current_action == 'add' || $current_action == 'edit'): ?>
            <h2 style="color: #D52B1E;"><?php echo ($current_action == 'edit') ? 'Modifier' : 'Ajouter'; ?> une Actualité</h2>
            <form method="POST" action="news_management.php" class="form-crud" style="margin-bottom: 30px; border: 1px solid #FFC72C; padding: 20px;">
                <input type="hidden" name="action" value="<?php echo ($current_action == 'edit') ? 'update' : 'add'; ?>">
                <?php if ($current_action == 'edit' && $edit_news): ?><input type="hidden" name="news_id" value="<?php echo htmlspecialchars($edit_news['news_id']); ?>"><?php endif; ?>

                <label>Titre:</label>
                <input type="text" name="titre" required value="<?php echo htmlspecialchars($edit_news['titre'] ?? ''); ?>">
                <label>Résumé:</label>
                <textarea name="resume" rows="3" required><?php echo htmlspecialchars($edit_news['resume'] ?? $edit_news['résumé'] ?? ''); ?></textarea>
                <label>Contenu:</label>
                <textarea name="contenu" rows="10" required><?php echo htmlspecialchars($edit_news['contenu'] ?? ''); ?></textarea>
                
                <button type="submit" style="background-color: #D52B1E; color: white; padding: 10px 15px; border: none; cursor: pointer;">Sauvegarder</button>
                <a href="news_management.php" style="margin-left: 15px;">Annuler</a>
            </form>
        <?php endif; ?>

        <?php if ($current_action == 'list'): ?>
            
            <div class="list-header">
                <h2 style="color: #333; margin: 0;">Liste des Actualités</h2>
                <a href="news_management.php?action=add" class="btn-add">+ Ajouter une Actualité</a>
            </div>

            <table class="crud-table" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="width: 50px;">ID</th>
                        <th>Titre</th>
                        <th style="width: 150px;">Date</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($news_list)): ?>
                        <tr><td colspan="4" style="text-align: center; padding: 20px; color: #666;">Aucune actualité trouvée. Commencez par en ajouter une !</td></tr>
                    <?php else: ?>
                        <?php foreach ($news_list as $news): ?>
                            <tr>
                                <td><?php echo $news['news_id']; ?></td>
                                <td><strong><?php echo htmlspecialchars($news['titre']); ?></strong></td>
                                <td><?php echo date("d/m/Y", strtotime($news['date_publication'])); ?></td>
                                <td>
                                    <a href="news_management.php?action=edit&id=<?php echo $news['news_id']; ?>" style="color: blue; text-decoration: none; font-weight: bold;">Modifier</a> | 
                                    <form method="POST" action="news_management.php" style="display: inline-block;">
                                        <input type="hidden" name="action" value="delete">
                                        <input type="hidden" name="news_id" value="<?php echo $news['news_id']; ?>">
                                        <button type="submit" onclick="return confirm('Supprimer ?');" style="color: red; border: none; background: none; cursor: pointer; text-decoration: underline;">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>