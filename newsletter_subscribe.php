<?php
// Utilisation des sessions au cas où vous voudriez stocker un message de succès
session_start();
require 'db_config.php'; 

// Simulation d'une page HTML/CSS simple pour le feedback utilisateur
echo "<!DOCTYPE html><html lang='fr'><head><meta charset='UTF-8'><title>Inscription Newsletter</title><link rel='stylesheet' href='css/style.css'></head><body><div id='container'><main id='center-content'>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    // Simplification : nous supposons que le formulaire ne demande pas Nom/Prénom (comme dans index.php)
    $nom = 'N/A'; 
    $prenom = 'N/A';
    
    // Vérification de la structure de l'email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $sql = "INSERT INTO Internaute (nom, prenom, email) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE date_inscription = NOW()";
        
        try {
            $stmt= $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $email]);
            echo "<h2>✅ Inscription Réussie</h2>";
            echo "<p>Votre adresse <strong>" . htmlspecialchars($email) . "</strong> a été ajoutée à notre mailing-list. Merci !</p>";
        } catch (PDOException $e) {
            // Gérer les erreurs (par exemple si la table n'existe pas)
            echo "<h2>❌ Erreur d'Inscription</h2>";
            echo "<p>Une erreur est survenue lors de l'enregistrement. Veuillez réessayer. (Détail: " . $e->getMessage() . ")</p>";
        }
    } else {
        echo "<h2>❌ Erreur de Validation</h2>";
        echo "<p>L'adresse email fournie n'est pas valide.</p>";
    }
} else {
    echo "<h2>Accès Interdit</h2><p>Veuillez utiliser le formulaire d'inscription sur la page d'accueil.</p>";
}

echo "<p><a href='index.php'>Retour à l'accueil</a></p>";
echo "</main></div></body></html>";
exit();
?>