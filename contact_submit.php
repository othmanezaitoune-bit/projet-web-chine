<?php
session_start();
require 'db_config.php'; 

$errors = [];
$success = false;
$page_title = "Traitement du Contact";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($nom)) $errors[] = "Nom requis.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide.";
    if (empty($message)) $errors[] = "Message requis.";

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO Messages (nom_complet, email, message) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $email, $message]); // L'erreur de parenthèse était ici
            $success = true;
            $page_title = "Message Envoyé";
        } catch (PDOException $e) {
            $errors[] = "Erreur technique.";
        }
    }
} else {
    header("Location: contact.php");
    exit();
}

include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2 style="color: #2E8B57;">Statut</h2>
    <?php if ($success): ?>
        <div class="result-box success">
            <h3>✅ Message Reçu !</h3>
            <p>Merci <strong><?php echo htmlspecialchars($nom); ?></strong>.</p>
        </div>
    <?php else: ?>
        <div class="result-box error">
            <h3>❌ Erreur</h3>
            <ul><?php foreach($errors as $e) echo "<li>$e</li>"; ?></ul>
        </div>
    <?php endif; ?>
    <div style="text-align:center; margin-top:20px;"><a href="index.php" class="btn-primary">Accueil</a></div>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>