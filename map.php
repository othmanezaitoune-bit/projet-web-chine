<?php 
$page_title = "Localisation"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2 style="color: #2E8B57;">🗺️ Carte Interactive</h2>
    <p>Explorez la géographie de la Chine.</p>
    
    <div style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); margin-top: 20px;">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26875949.673809074!2d83.56230623340578!3d35.79545466367332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31508e64e5c642c1%3A0x951daa7c349f366f!2sChine!5e0!3m2!1sfr!2sfr!4v1701980000000!5m2!1sfr!2sfr" 
            width="100%" 
            height="500" 
            style="border:0; display: block;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>