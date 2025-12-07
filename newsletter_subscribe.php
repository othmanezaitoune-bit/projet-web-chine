<?php
session_start();
require 'db_config.php'; 

$page_title = "Inscription Newsletter";
$status = 'error';
$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        // Insertion ou mise à jour de la date si l'email existe déjà
        $sql = "INSERT INTO Internaute (nom, prenom, email) VALUES ('N/A', 'N/A', ?) 
                ON DUPLICATE KEY UPDATE date_inscription = NOW()";
        try {
            $pdo->prepare($sql)->execute([$email]);
            $status = 'success';
            $msg = "L'adresse <strong>" . htmlspecialchars($email) . "</strong> a été ajoutée.";
        } catch (PDOException $e) {
            $msg = "Erreur technique.";
        }
    } else {
        $msg = "Email invalide.";
    }
} else {
    header("Location: index.php"); exit();
}

include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2 style="color: #2E8B57;">Newsletter</h2>

    <div class="result-box <?php echo $status; ?>">
        <?php if ($status == 'success'): ?>
            <h3 style="color: #2E8B57; margin-top: 0;">✅ Bienvenue !</h3>
        <?php else: ?>
            <h3 style="color: #c62828; margin-top: 0;">❌ Erreur</h3>
        <?php endif; ?>
        <p><?php echo $msg; ?></p>
    </div>

    <div style="text-align: center; margin-top: 30px;">
        <a href="index.php" class="btn-primary">Retour à l'accueil</a>
    </div>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>