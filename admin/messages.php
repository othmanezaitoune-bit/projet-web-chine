<?php
session_start();
// Le chemin doit être correct : remonter au dossier parent (..), puis trouver db_config.php
require '../db_config.php'; 

// 1. Vérification de l'authentification
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

$page_title = "Gestion des Messages de Contact";
$messages = [];
$error = '';

// 2. Récupération de tous les messages depuis la table Messages
try {
    // Assurez-vous que le nom 'Messages' correspond au nom de table que vous avez créé.
    $sql = "SELECT * FROM Messages ORDER BY date_soumission DESC";
    $stmt = $pdo->query($sql);
    $messages = $stmt->fetchAll();
} catch (PDOException $e) {
    $error = "Erreur de base de données. Impossible de récupérer la liste des messages. 
              Vérifiez la connexion (db_config.php) et l'existence de la table 'Messages'.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="../css/style.css"> 
    <style>
        /* Styles spécifiques à l'administration */
        #admin-container { 
            width: 90%; 
            max-width: 1400px; 
            margin: 20px auto; 
            background: #fff; 
            padding: 30px; 
            box-shadow: 0 0 15px rgba(0,0,0,0.1); 
        }
        .admin-nav a { 
            background-color: #333; 
            color: white; 
            padding: 10px 15px; 
            text-decoration: none; 
            margin-right: 10px; 
            border-radius: 4px; 
            display: inline-block; 
        }
        .message-box { 
            border: 1px solid #ddd; 
            margin-bottom: 20px; 
            padding: 15px; 
            border-radius: 4px; 
            background-color: #f9f9f9;
        }
        .message-box strong { color: #D52B1E; }
    </style>
</head>
<body>
    <div id="admin-container">
        <h1>Administration du Site : <?php echo $page_title; ?></h1>
        
        <nav class="admin-nav" style="margin-bottom: 30px;">
            <a href="news_management.php">Gérer les News</a>
            <a href="messages.php" style="background-color: #D52B1E;">Voir les Messages (Actif)</a>
            <a href="logout.php">Déconnexion</a>
        </nav>

        <?php if ($error): ?>
            <p style="color: red; font-weight: bold;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <h2>Liste des Messages Reçus (Total: <?php echo count($messages); ?>)</h2>
        
        <?php if (empty($messages) && empty($error)): ?>
            <p>Aucun message de contact n'a été soumis pour le moment.</p>
        <?php else: ?>
            <?php foreach ($messages as $msg): ?>
                <div class="message-box">
                    <p><strong>ID Message:</strong> <?php echo htmlspecialchars($msg['message_id']); ?></p>
                    <p><strong>Soumis le:</strong> <?php echo htmlspecialchars($msg['date_soumission']); ?></p>
                    <p><strong>De:</strong> <?php echo htmlspecialchars($msg['nom_complet']); ?></p>
                    <p><strong>Email:</strong> <a href="mailto:<?php echo htmlspecialchars($msg['email']); ?>"><?php echo htmlspecialchars($msg['email']); ?></a></p>
                    <hr>
                    <p><strong>Message:</strong></p>
                    <div style="background: white; padding: 10px; border: 1px dashed #ccc;">
                        <?php echo nl2br(htmlspecialchars($msg['message'])); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        
    </div>
</body>
</html>