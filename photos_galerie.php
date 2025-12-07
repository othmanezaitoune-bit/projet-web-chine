<?php 
$page_title = "Galerie Photos"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2 style="color: #2E8B57;">Galerie Photos</h2>
    <p>Découvrez les trois visages de la Chine à travers nos villes sélectionnées.</p>
    
    <div class="gallery-section" style="margin-top: 40px;">
        <h3 style="color: #5DADE2; border-bottom: 2px solid #2E8B57; display: inline-block; margin-bottom: 15px;">Shanghai</h3>
        
        <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <div class="gallery-card">
                <img src="images/Shanghai pudong at dusk_ Shanghai pudong skyline….jfif" alt="Skyline" style="width: 100%; height: 240px; object-fit: cover; border-radius: 4px;">
                <p style="text-align: center; padding: 10px;"><strong>Skyline de Pudong</strong></p>
            </div>
            <div class="gallery-card">
                <img src="images/the bund shanghai.jfif" alt="Le Bund" style="width: 100%; height: 240px; object-fit: cover; border-radius: 4px;">
                <p style="text-align: center; padding: 10px;"><strong>Le Bund</strong></p>
            </div>
            <div class="gallery-card">
                <img src="images/La vibrante cuisine de rue locale shanghai.jfif" alt="Cuisine" style="width: 100%; height: 240px; object-fit: cover; border-radius: 4px;">
                <p style="text-align: center; padding: 10px;"><strong>Cuisine de rue</strong></p>
            </div>
        </div>
    </div>
    
    <div class="gallery-section" style="margin-top: 40px; border-top: 1px solid #eee; padding-top: 20px;">
        <h3 style="color: #5DADE2; border-bottom: 2px solid #2E8B57; display: inline-block; margin-bottom: 15px;">Pékin (Beijing)</h3>
        
        <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <div class="gallery-card">
                <img src="images/la cite interdite.jpg" alt="Cité Interdite" style="width: 100%; height: 240px; object-fit: cover; border-radius: 4px;">
                <p style="text-align: center; padding: 10px;"><strong>La Cité Interdite</strong></p>
            </div>
            <div class="gallery-card">
                <img src="images/pekin2.jpg" alt="Temple du Ciel" style="width: 100%; height: 240px; object-fit: cover; border-radius: 4px;">
                <p style="text-align: center; padding: 10px;"><strong>Temple du Ciel</strong></p>
            </div>
            <div class="gallery-card">
                <img src="images/les hutongs de pékin.jpg" alt="Hutongs" style="width: 100%; height: 240px; object-fit: cover; border-radius: 4px;">
                <p style="text-align: center; padding: 10px;"><strong>Les Hutongs</strong></p>
            </div>
        </div>
    </div>
    
    <div class="gallery-section" style="margin-top: 40px; border-top: 1px solid #eee; padding-top: 20px;">
        <h3 style="color: #5DADE2; border-bottom: 2px solid #2E8B57; display: inline-block; margin-bottom: 15px;">Guangzhou</h3>
        
        <div class="gallery-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <div class="gallery-card">
                <img src="images/guangzhou1.jpg" alt="Tour Canton" style="width: 100%; height: 240px; object-fit: cover; border-radius: 4px;">
                <p style="text-align: center; padding: 10px;"><strong>Tour Canton</strong></p>
            </div>
            <div class="gallery-card">
                <img src="images/la rivieres des perles guangzhou.jpg" alt="Rivière" style="width: 100%; height: 240px; object-fit: cover; border-radius: 4px;">
                <p style="text-align: center; padding: 10px;"><strong>Rivière des Perles</strong></p>
            </div>
            <div class="gallery-card">
                <img src="images/Temple of the Six Banyon Trees, Guangzhou, China.jfif" alt="Temple" style="width: 100%; height: 240px; object-fit: cover; border-radius: 4px;">
                <p style="text-align: center; padding: 10px;"><strong>Temple des Six Banians</strong></p>
            </div>
        </div>
    </div>
    
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>