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
        <li><a href="index.php">Accueil</a> (Page d'index du site)</li>
        <li><a href="plan_site.php">Plan de site</a> (Cette page)</li>
        <li><a href="qui_sommes_nous.php">Qui sommes-nous?</a> (Informations sur l'équipe)</li>
        <li><a href="contact.php">Contact</a> (Formulaire de contact avec validation JavaScript)</li>
    </ul>
    
    <h3>Navigation Latérale (Exploration du Pays)</h3>
    <ul>
        <li><a href="sites_monuments.php">Sites et Monuments</a> (Description et photos de 3 monuments)</li>
        <li><a href="villes_index.php">Index des villes</a> (Tableau de 3 villes)</li>
        <li><a href="photos_galerie.php">Photos de la ville</a> (Galerie de 5 photos)</li>
        <li><a href="map.php">Carte (Google Map)</a> (Localisation du pays via iframe)</li>
        <li><a href="liens_utiles.php">Liens utiles</a> (3 liens vers des établissements publics)</li>
    </ul>

    <h3>Fonctionnalités Dynamiques (PHP/BD)</h3>
    <ul>
        <li><a href="all_news.php">Toutes les news</a> (Affichage des actualités avec pagination)</li>
        <li><a href="admin/login.php">Espace Admin</a> (Ajout/Modification/Suppression des news)</li>
        <li>Inscription Newsletter (Gestion de la table Internaute)</li>
    </ul>
    
</main>


<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>