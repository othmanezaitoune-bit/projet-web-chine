<?php 
$page_title = "Plan Détaillé du Site"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    
    <div class="sitemap-header">
        <h2>Plan du Site</h2>
        <p>Retrouvez ci-dessous l'arborescence complète pour naviguer facilement.</p>
    </div>

    <div class="sitemap-container">
        
        <div class="sitemap-card">
            <div class="card-icon">🏠</div> <h3>Navigation Principale</h3>
            <ul class="sitemap-list">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="plan_site.php" class="current-page">Plan de site <small>(Cette page)</small></a></li>
                <li><a href="qui_sommes_nous.php">Qui sommes-nous?</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>

        <div class="sitemap-card">
            <div class="card-icon">🌏</div>
            <h3>Explorer la Chine</h3>
            <ul class="sitemap-list">
                <li><a href="sites_monuments.php">Sites et Monuments</a></li>
                <li><a href="villes_index.php">Index des villes</a></li>
                <li><a href="photos_galerie.php">Galerie Photos</a></li>
                <li><a href="map.php">Carte Google Map</a></li>
                <li><a href="liens_utiles.php">Liens utiles</a></li>
                <li><a href="all_news.php">Toutes les news</a></li>
            </ul>
        </div>

        <div class="sitemap-card">
            <div class="card-icon">⚙️</div>
            <h3>Espace Technique</h3>
            <ul class="sitemap-list">
                <li><a href="newsletter_subscribe.php">Inscription Newsletter</a></li>
                <li><a href="admin/login.php">Connexion Admin</a></li>
                <li><a href="admin/news_management.php">Gestion des News (CRUD)</a></li>
            </ul>
        </div>

    </div>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>