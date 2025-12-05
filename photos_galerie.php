<?php 
$page_title = "Galerie Photos"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>Galerie Photos (5 photos au maximum)</h2>
    <p>Un aperçu des endroits, personnes et cultures de la Chine.</p>
    
    <div class="gallery-container" style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center;">
        
        <div class="gallery-item">
            <img src="images/photo1_cuisine.jpg" alt="Plat traditionnel chinois" style="width: 200px; height: 150px; object-fit: cover; background: #ddd;">
            <p>Délices de la cuisine locale.</p>
        </div>

        <div class="gallery-item">
            <img src="images/photo2_temple.jpg" alt="Temple bouddhiste" style="width: 200px; height: 150px; object-fit: cover; background: #ddd;">
            <p>Architecture traditionnelle.</p>
        </div>

        <div class="gallery-item">
            <img src="images/photo3_skyline.jpg" alt="Skyline de Shanghai" style="width: 200px; height: 150px; object-fit: cover; background: #ddd;">
            <p>Modernité des grandes villes.</p>
        </div>

        <div class="gallery-item">
            <img src="images/photo4_panda.jpg" alt="Pandas géants" style="width: 200px; height: 150px; object-fit: cover; background: #ddd;">
            <p>La faune chinoise.</p>
        </div>

        <div class="gallery-item">
            <img src="images/photo5_festival.jpg" alt="Festival des lanternes" style="width: 200px; height: 150px; object-fit: cover; background: #ddd;">
            <p>Festivités culturelles.</p>
        </div>
        
    </div>
    
</main>


<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>