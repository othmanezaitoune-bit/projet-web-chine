<?php
session_start();
// Config simple pour le projet
$admin_login = "binome";
// Hash du mot de passe (à remplacer par le tien si besoin)
$admin_hash = '$2y$10$5W47Dq/EMSrsfmWjw6bCiOwotEqlKLT7ufM1Y91LAv3ywiJPzKk0y'; 

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'] ?? '';
    $pass = $_POST['password'] ?? '';
    
    if ($login === $admin_login && password_verify($pass, $admin_hash)) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: news_management.php');
        exit();
    } else {
        $error = "Identifiants incorrects.";
    }
}

// Inclusion du header parent (remonte d'un dossier)
include '../header.php'; 
?>

<main id="center-content">
    <div style="max-width: 400px; margin: 50px auto; padding: 30px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); background-color: #fff;">
        <h2 style="text-align: center; color: #2E8B57; border-bottom: 2px solid #5DADE2; padding-bottom: 10px; margin-top: 0;">Connexion Admin</h2>
        
        <?php if ($error): ?>
            <div style="background: #FFEBEE; color: #c62828; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center; font-weight: bold;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; color: #333;">Login :</label>
                <input type="text" name="login" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; color: #333;">Mot de passe :</label>
                <input type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            
            <button type="submit" style="width: 100%; background-color: #2E8B57; color: white; padding: 12px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 1em;">Se connecter</button>
        </form>

        <div style="text-align: center; margin-top: 20px; padding-top: 15px; border-top: 1px solid #eee;">
            <a href="../index.php" style="color: #5DADE2; text-decoration: none; font-size: 0.95em; font-weight: 500;">&larr; Retour à l'accueil</a>
        </div>
    </div>
</main>

<?php include '../footer.php'; ?>