<?php 
$page_title = "Plan Détaillé du Site"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>🗺️ Plan Détaillé du Site</h2>
    
    <p>Ce plan répertorie l'ensemble des pages et des fonctionnalités du site.</p>

    <h3>Menu Principal (Horizontal)</h3>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="plan_site.php">Plan de site</a> (Cette page)</li>
        <li><a href="qui_sommes_nous.php">Qui sommes-nous?</a></li>
        <li><a href="contact.php">Contact</a></li>
    </ul>
    
    <h3>Navigation Latérale (Exploration du Pays)</h3>
    <ul>
        <li><a href="sites_monuments.php">Sites et Monuments</a></li>
        <li><a href="villes_index.php">Index des villes (Shanghai, Pékin, Guangzhou)</a></li>
        <li><a href="photos_galerie.php">Photos de la ville (Galerie 3x3)</a></li>
        <li><a href="map.php">Carte (Google Map)</a></li>
        <li><a href="liens_utiles.php">Liens utiles</a></li>
        <li><a href="all_news.php">Toutes les news (avec recherche et pagination)</a></li>
    </ul>

    <h3>Fonctionnalités Dynamiques et Administration</h3>
    <ul>
        <li><a href="newsletter_subscribe.php">Inscription Newsletter</a> (Gestion de la table Internaute)</li>
        <li><a href="admin/login.php">Espace Admin</a> (Connexion sécurisée par Hash)</li>
        <li><a href="admin/news_management.php">Gestion des News</a> (Interface CRUD)</li>
    </ul>
    
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>