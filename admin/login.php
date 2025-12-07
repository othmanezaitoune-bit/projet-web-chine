<?php
session_start();

// --- DÉBUT DE LA CONFIGURATION DE SÉCURITÉ ---
// Identifiants STATIQUES pour la simplicité du mini-projet
$admin_login = "admin";

// LIGNE CRITIQUE : Remplacez "VOTRE_HASH_ICI" par la longue chaîne que vous avez générée.
// Cette chaîne doit TOUJOURS être entre guillemets.
$admin_hashed_password = '$2y$10$OzNHn64wyTLx7hPQOano1ee8Jq42Co/7Jk0IPACPbq7xS/mgZBFtS'; 
// --- FIN DE LA CONFIGURATION DE SÉCURITÉ ---

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Vérification sécurisée du mot de passe
    if ($login === $admin_login && password_verify($password, $admin_hashed_password)) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: news_management.php');
        exit();
    } else {
        $error = "Identifiants incorrects.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Administrateur</title>
    <link rel="stylesheet" href="../css/style.css"> 
    <style>
        #login-box { 
            width: 350px; 
            margin: 50px auto; 
            padding: 30px; 
            border: 1px solid #ccc; 
            background: white; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
            text-align: left;
        }
        #login-box input { width: 100%; padding: 10px; margin-bottom: 15px; box-sizing: border-box; }
        #login-box button { background-color: #D52B1E; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        .error { color: #D52B1E; font-weight: bold; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div id="container">
        <header id="header" style="text-align: center; padding: 20px;">Connexion Administration</header>
        <div id="login-box">
            <h2>Se connecter</h2>
            
            <?php if ($error): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <label for="login">Login (admin):</label>
                <input type="text" name="login" id="login" required>
                
                <label for="password">Mot de passe:</label>
                <input type="password" name="password" id="password" required>
                
                <button type="submit">Se connecter</button>
            </form>
            <p style="text-align: center; margin-top: 20px;"><a href="../index.php">Retour au site public</a></p>
        </div>
        <footer id="footer" style="text-align: center; padding: 10px; margin-top: 20px;">Copyright &copy; 2025-2026 Projet Dev Web - Tous droits réservés.</footer>
    </div>
</body>
</html>