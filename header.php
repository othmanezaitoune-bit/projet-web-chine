<?php
// Fonction utilitaire pour déterminer si un lien est actif
function is_active($page_name) {
    // Récupère le nom du script actuel (ex: index.php, contact.php)
    $current_page = basename($_SERVER['PHP_SELF']); 
    
    // Compare le nom du lien au nom du fichier actuel
    if ($current_page == $page_name) {
        return 'active';
    }
    return '';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? "Chine - Projet Web"; ?></title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <div id="container">
        <header id="header">
            <div id="banner">
                <h1>Bienvenue en Chine</h1>
            </div> 
            
            <nav id="top-menu">
                <a href="index.php" class="<?php echo is_active('index.php'); ?>">Accueil</a>
                <a href="plan_site.php" class="<?php echo is_active('plan_site.php'); ?>">Plan de site</a>
                <a href="qui_sommes_nous.php" class="<?php echo is_active('qui_sommes_nous.php'); ?>">Qui sommes-nous?</a>
                <a href="contact.php" class="<?php echo is_active('contact.php'); ?>">Contact</a>
            </nav>
        </header>

        <div id="content-wrapper">