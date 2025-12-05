<?php 
$page_title = "Sites et Monuments"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>Sites et Monuments Historiques (Max 3)</h2>
    
    <div class="monument-item" style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px dashed #ccc;">
        <h3>1. La Grande Muraille</h3>
        

[Image of The Great Wall of China]

        <img src="images/grande_muraille.jpg" alt="La Grande Muraille de Chine" style="max-width: 100%; height: auto;">
        <p>
            C'est une série de fortifications militaires, construite, reconstruite et entretenue entre le Vᵉ siècle av. J.-C. et le XVIᵉ siècle pour protéger la frontière nord de la Chine.
        </p>
    </div>

    <div class="monument-item" style="margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px dashed #ccc;">
        <h3>2. L'Armée de Terre Cuite (Xi'an)</h3>
        

[Image of the Terracotta Army in Xi'an]

        <img src="images/armee_terre_cuite.jpg" alt="Armée de Terre Cuite" style="max-width: 100%; height: auto;">
        <p>
            Une collection de sculptures en terre cuite représentant les armées de Qin Shi Huang, le premier empereur de Chine. Découverte en 1974, elle est considérée comme l'une des plus grandes découvertes archéologiques.
        </p>
    </div>

    <div class="monument-item">
        <h3>3. La Cité Interdite (Pékin)</h3>
        <img src="images/cite_interdite.jpg" alt="La Cité Interdite" style="max-width: 100%; height: auto;">
        <p>
            Ancien palais impérial des dynasties Ming et Qing. Elle est le plus grand complexe de palais anciens au monde et est inscrite au patrimoine mondial de l'UNESCO.
        </p>
    </div>
    
</main>


<?php include 'sidebar_right.php'; ?>

<?php include 'footer.php'; ?>