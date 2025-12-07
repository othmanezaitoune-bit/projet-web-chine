<?php
session_start();
require 'db_config.php'; // On inclut maintenant la connexion à la BDD

$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Récupération et Nettoyage des données
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // 2. Validation Serveur des champs (inchangée)
    
    if (empty($nom)) {
        $errors[] = "Le nom complet est requis.";
    } elseif (strlen($nom) < 2) {
        $errors[] = "Le nom doit contenir au moins 2 caractères.";
    }

    if (empty($email)) {
        $errors[] = "L'adresse email est requise.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Le format de l'adresse email est invalide.";
    }

    if (empty($message)) {
        $errors[] = "Le message est requis.";
    } elseif (strlen($message) < 10) {
        $errors[] = "Le message doit contenir au moins 10 caractères.";
    }

    // 3. Traitement si aucune erreur n'est trouvée
    if (empty($errors)) {
        
        try {
            // --- NOUVEAU : ENREGISTREMENT EN BASE DE DONNÉES ---
            $sql = "INSERT INTO Messages (nom_complet, email, message) VALUES (:nom, :email, :message)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':email' => $email,
                ':message' => $message
            ]);

            // Simulation d'envoi d'email (pour le projet, cela compte comme succès)
            $success = true;
            
        } catch (PDOException $e) {
            // Si l'insertion échoue (problème de BDD, etc.)
            $errors[] = "Erreur interne du serveur lors de l'enregistrement du message.";
            // $errors[] = "Debug: " . $e->getMessage(); // Pour le débogage seulement
        }
        
    }
} else {
    $errors[] = "Accès non autorisé.";
}

// --- AFFICHAGE DU RÉSULTAT (inchangé) ---
$page_title = $success ? "Message Envoyé" : "Erreur de Formulaire";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .result-box {
            padding: 20px;
            margin-top: 30px;
            border-radius: 5px;
            text-align: center;
        }
        .success { border: 2px solid green; background-color: #e6ffe6; color: green; }
        .error { border: 2px solid #D52B1E; background-color: #ffe6e6; color: #D52B1E; }
    </style>
</head>
<body>
    <div id="container">
        <header id="header" style="text-align: center; padding: 20px;">Traitement du Contact</header>

        <main id="center-content">
            <?php if ($success): ?>
                <div class="result-box success">
                    <h2>✅ Succès !</h2>
                    <p>Votre message a été soumis et enregistré avec succès (ID: <?php echo $pdo->lastInsertId(); ?>).</p>
                    <p>Nous vous répondrons dans les plus brefs délais.</p>
                </div>
            <?php else: ?>
                <div class="result-box error">
                    <h2>❌ Erreur de Soumission</h2>
                    <p>Votre message n'a pas pu être envoyé/enregistré pour les raisons suivantes :</p>
                    <ul>
                        <?php foreach ($errors as $err): ?>
                            <li><?php echo htmlspecialchars($err); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p>Veuillez revenir en arrière et corriger les erreurs.</p>
                </div>
            <?php endif; ?>
            <p style="text-align: center; margin-top: 30px;"><a href="contact.php">&larr; Retour au formulaire</a></p>
            <p style="text-align: center;"><a href="index.php">Accueil du site</a></p>
        </main>
        
        <footer id="footer">...</footer>
    </div>
</body>
</html>