<?php
session_start();
require '../db_config.php'; 

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php'); exit();
}

// Récupération des messages
$messages = [];
try {
    $messages = $pdo->query("SELECT * FROM Messages ORDER BY date_soumission DESC")->fetchAll();
} catch (PDOException $e) { /* Erreur silencieuse */ }

include '../header.php'; 
?>

<main id="center-content">
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 20px;">
        <h2 style="color: #2E8B57; margin: 0;">Boîte de Réception</h2>
        <div>
            <a href="news_management.php" class="btn-secondary">Gérer les News</a>
            <a href="logout.php" style="margin-left: 10px; color: #c62828; text-decoration: none; font-weight: bold;">Déconnexion</a>
        </div>
    </div>

    <?php if (empty($messages)): ?>
        <p>Aucun message reçu.</p>
    <?php else: ?>
        <div style="display: grid; gap: 20px;">
            <?php foreach ($messages as $msg): ?>
                <div style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; background: #fff;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; border-bottom: 1px dashed #eee; padding-bottom: 10px;">
                        <strong>De: <?php echo htmlspecialchars($msg['nom_complet']); ?></strong>
                        <span style="color: #888; font-size: 0.9em;"><?php echo $msg['date_soumission']; ?></span>
                    </div>
                    <div style="color: #5DADE2; margin-bottom: 10px;">Email: <?php echo htmlspecialchars($msg['email']); ?></div>
                    <div style="background: #f9f9f9; padding: 15px; border-radius: 4px; color: #555;">
                        <?php echo nl2br(htmlspecialchars($msg['message'])); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php include '../footer.php'; ?>