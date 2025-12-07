<?php
// Détection automatique : Si on est dans le dossier 'admin', on remonte d'un cran
$in_admin = strpos($_SERVER['PHP_SELF'], '/admin/') !== false;
$path_prefix = $in_admin ? '../' : '';

// Fonction pour ajouter la classe 'active' au lien du menu actuel
function is_active($page_name) {
    // basename récupère juste le nom du fichier (ex: index.php)
    return (basename($_SERVER['PHP_SELF']) == $page_name) ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? "Chine - Voyage & Découverte"; ?></title>
    
    <link rel="stylesheet" href="<?php echo $path_prefix; ?>css/style.css">
    <script src="<?php echo $path_prefix; ?>js/script.js" defer></script>
</head>
<body>
    <div id="container">
        <header id="header">
            <div id="banner">
                <h1>Bienvenue en Chine</h1>
            </div> 
            
            <nav id="top-menu">
                <a href="<?php echo $path_prefix; ?>index.php" class="<?php echo is_active('index.php'); ?>">Accueil</a>
                <a href="<?php echo $path_prefix; ?>plan_site.php" class="<?php echo is_active('plan_site.php'); ?>">Plan de site</a>
                <a href="<?php echo $path_prefix; ?>qui_sommes_nous.php" class="<?php echo is_active('qui_sommes_nous.php'); ?>">Qui sommes-nous?</a>
                <a href="<?php echo $path_prefix; ?>contact.php" class="<?php echo is_active('contact.php'); ?>">Contact</a>
            </nav>
        </header>

        <div id="content-wrapper">