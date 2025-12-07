<?php
session_start();
require '../db_config.php'; 

// Sécurité
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php'); exit();
}

$action = $_REQUEST['action'] ?? 'list';
$error = ''; $success = '';
$edit_data = null;

// --- TRAITEMENT (POST) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = trim($_POST['titre'] ?? '');
    $resume = trim($_POST['resume'] ?? '');
    $contenu = trim($_POST['contenu'] ?? '');
    $id = filter_input(INPUT_POST, 'news_id', FILTER_VALIDATE_INT);
    
    if ($action === 'delete' && $id) {
        $pdo->prepare("DELETE FROM News WHERE news_id = ?")->execute([$id]);
        $success = "News supprimée.";
        $action = 'list';
    } elseif ($action === 'save') {
        if ($titre && $resume && $contenu) {
            if ($id) { // Update
                $stmt = $pdo->prepare("UPDATE News SET titre=?, resume=?, contenu=? WHERE news_id=?");
                $stmt->execute([$titre, $resume, $contenu, $id]);
                $success = "News mise à jour.";
            } else { // Insert
                $stmt = $pdo->prepare("INSERT INTO News (titre, resume, contenu) VALUES (?, ?, ?)");
                $stmt->execute([$titre, $resume, $contenu]);
                $success = "News créée.";
            }
            $action = 'list';
        } else {
            $error = "Tous les champs sont requis.";
            $action = ($id) ? 'edit' : 'add';
        }
    }
}

// --- PREPARATION DONNÉES (GET) ---
if ($action === 'edit' && isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM News WHERE news_id = ?");
    $stmt->execute([$_GET['id']]);
    $edit_data = $stmt->fetch();
    if (!$edit_data) $action = 'list'; // Retour liste si ID invalide
}

$news_list = $pdo->query("SELECT * FROM News ORDER BY date_publication DESC")->fetchAll();

include '../header.php'; 
?>

<main id="center-content">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 2px solid #2E8B57; padding-bottom: 15px;">
        <h2 style="color: #2E8B57; margin: 0;">Gestion des Actualités</h2>
        <div>
            <a href="messages.php" class="btn-secondary">Voir Messages</a>
            <a href="logout.php" style="margin-left: 10px; color: #c62828; font-weight: bold; text-decoration: none;">Déconnexion</a>
        </div>
    </div>

    <?php if ($success): ?><div style="background:#E8F5E9; color:#2E8B57; padding:10px; margin-bottom:20px; border-radius:4px;">✅ <?php echo $success; ?></div><?php endif; ?>
    <?php if ($error): ?><div style="background:#FFEBEE; color:#c62828; padding:10px; margin-bottom:20px; border-radius:4px;">❌ <?php echo $error; ?></div><?php endif; ?>

    <?php if ($action === 'add' || $action === 'edit'): ?>
        <div style="background: #f9f9f9; padding: 25px; border-radius: 8px; border: 1px solid #ddd;">
            <h3 style="margin-top: 0;"><?php echo ($action === 'edit') ? 'Modifier' : 'Ajouter'; ?> une actualité</h3>
            <form method="POST">
                <input type="hidden" name="action" value="save">
                <?php if ($edit_data): ?><input type="hidden" name="news_id" value="<?php echo $edit_data['news_id']; ?>"><?php endif; ?>
                
                <div style="margin-bottom: 15px;">
                    <label style="display:block; font-weight:bold; margin-bottom:5px;">Titre</label>
                    <input type="text" name="titre" value="<?php echo htmlspecialchars($edit_data['titre'] ?? ''); ?>" required>
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label style="display:block; font-weight:bold; margin-bottom:5px;">Résumé</label>
                    <textarea name="resume" rows="3" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;"><?php echo htmlspecialchars($edit_data['resume'] ?? ''); ?></textarea>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display:block; font-weight:bold; margin-bottom:5px;">Contenu Complet</label>
                    <textarea name="contenu" rows="8" required style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;"><?php echo htmlspecialchars($edit_data['contenu'] ?? ''); ?></textarea>
                </div>

                <button type="submit" class="btn-primary">Enregistrer</button>
                <a href="news_management.php" class="btn-secondary">Annuler</a>
            </form>
        </div>

    <?php else: ?>
        <div style="text-align: right; margin-bottom: 20px;">
            <a href="news_management.php?action=add" class="btn-primary" style="background-color: #2E8B57;">+ Nouvelle Actualité</a>
        </div>

        <table style="width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
            <thead style="background: #333; color: white;">
                <tr>
                    <th style="padding: 12px; text-align: left;">ID</th>
                    <th style="padding: 12px; text-align: left;">Titre</th>
                    <th style="padding: 12px; text-align: left;">Date</th>
                    <th style="padding: 12px; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($news_list as $n): ?>
                    <tr style="border-bottom: 1px solid #eee;">
                        <td style="padding: 12px;"><?php echo $n['news_id']; ?></td>
                        <td style="padding: 12px; font-weight: bold;"><?php echo htmlspecialchars($n['titre']); ?></td>
                        <td style="padding: 12px; color: #666;"><?php echo date("d/m/y", strtotime($n['date_publication'])); ?></td>
                        <td style="padding: 12px; text-align: right;">
                            <a href="?action=edit&id=<?php echo $n['news_id']; ?>" style="color: #5DADE2; font-weight: bold; margin-right: 10px; text-decoration: none;">Modifier</a>
                            
                            <form method="POST" style="display: inline;" onsubmit="return confirm('Confirmer suppression ?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="news_id" value="<?php echo $n['news_id']; ?>">
                                <button type="submit" style="background: none; border: none; color: #c62828; cursor: pointer; text-decoration: underline;">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

</main>

<?php include '../footer.php'; ?>