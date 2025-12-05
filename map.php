<?php 
$page_title = "Carte de la Chine"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>Localisation de la Chine (Carte)</h2>
    <p>Visualisez la position géographique du pays.</p>
    
    <iframe id="map-iframe"
        src="https://maps.google.com/maps?q=Chine&t=&z=4&ie=UTF8&iwloc=&output=embed"
        allowfullscreen
        style="width: 100%; height: 600px; border: 1px solid #ccc;">
    </iframe>
    
</main>


<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>