<?php
session_start();
require '../db_config.php'; 

// Vérification de sécurité
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php'); exit();
}

// Récupération de la liste des inscrits
$subscribers = [];
try {
    $stmt = $pdo->query("SELECT * FROM Internaute ORDER BY date_inscription DESC");
    $subscribers = $stmt->fetchAll();
} catch (PDOException $e) {
    // Erreur silencieuse ou message
}

include '../header.php'; 
?>

<main id="center-content">
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 2px solid #2E8B57; padding-bottom: 15px;">
        <h2 style="color: #2E8B57; margin: 0;">Liste des Inscrits Newsletter</h2>
        <div style="display: flex; gap: 10px;">
            <a href="news_management.php" class="btn-secondary">News</a>
            <a href="messages.php" class="btn-secondary">Messages</a>
            <a href="newsletter_list.php" class="btn-primary" style="background-color: #2E8B57;">Newsletter</a>
            <a href="logout.php" style="margin-left: 10px; color: #c62828; font-weight: bold; text-decoration: none; display: flex; align-items: center;">Déconnexion</a>
        </div>
    </div>

    <div class="table-container" style="overflow-x: auto; background: white; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #2E8B57; color: white; text-align: left;">
                    <th style="padding: 15px;">Email</th>
                    <th style="padding: 15px;">Date d'inscription</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($subscribers)): ?>
                    <tr>
                        <td colspan="2" style="padding: 20px; text-align: center; font-style: italic; color: #666;">
                            Aucun inscrit pour le moment.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($subscribers as $sub): ?>
                        <tr style="border-bottom: 1px solid #eee;">
                            <td style="padding: 15px; font-weight: bold; color: #333;">
                                <?php echo htmlspecialchars($sub['email']); ?>
                            </td>
                            <td style="padding: 15px; color: #5DADE2;">
                                📅 <?php echo date("d/m/Y à H:i", strtotime($sub['date_inscription'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 20px; text-align: right; color: #666;">
        Total inscrits : <strong><?php echo count($subscribers); ?></strong>
    </div>

</main>

<?php include '../footer.php'; ?>