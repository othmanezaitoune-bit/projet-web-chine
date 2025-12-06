<?php 
$page_title = "Carte de la Chine (Localisation)"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>🗺️ Localisation de la Chine (Google Maps)</h2>
    
    <p>Visualisez l'emplacement de la Chine et ses frontières en utilisant la carte interactive.</p>
    
    <div style="margin: 20px 0; border: 1px solid #ccc; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3550974.8715456334!2d103.01353102148108!3d35.63004354226388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31508e71887e1279%3A0x17c92b2361b9e075!2sChine!5e0!3m2!1sfr!2sma!4v1678890000000!5m2!1sfr!2sma" 
            width="100%" 
            height="500" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>