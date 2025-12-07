<?php 
$page_title = "Galerie Photos des Villes"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>Galerie Photos : Shanghai, Pékin et Guangzhou</h2>
    <p>Découvrez trois aspects majeurs de chacune de nos villes sélectionnées (neuf photos au total).</p>
    
    <style>
        .city-section { margin-top: 40px; padding-top: 15px; border-top: 2px solid #D52B1E; }
        .city-section h3 { color: #FFC72C; background-color: #333; padding: 5px 10px; display: inline-block; border-radius: 3px; }
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }
        .gallery-item {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
        .gallery-item img {
            width: 100%;
            height: 150px; 
            object-fit: cover;
            background: #eee;
            margin-bottom: 5px;
        }
        .gallery-item p { font-size: 0.9em; margin: 0; }
    </style>
    
    
    <div class="city-section">
        <h3>Shanghai</h3>
        <p>Le centre financier et la ville la plus peuplée de Chine.</p>
        <div class="gallery-grid">
            
            <div class="gallery-item">
                <img src="Shanghai pudong at dusk_ Shanghai pudong skyline….jfif" alt="Skyline de Shanghai">
                <p>La **Skyline de Pudong**, symbole de modernité.</p>
            </div>

            <div class="gallery-item">
                <img src="the bund shanghai.jfif" alt="Le Bund">
                <p>Le **Bund**, mélange d'architecture coloniale et moderne.</p>
            </div>

            <div class="gallery-item">
                <img src="La vibrante cuisine de rue locale shanghai.jfif" alt="Cuisine de rue">
                <p>La vibrante **cuisine de rue** locale.</p>
            </div>
            
        </div>
    </div>
    
    <div class="city-section">
        <h3>Pékin (Beijing)</h3>
        <p>Capitale politique et cœur historique et culturel du pays.</p>
        <div class="gallery-grid">
            
            <div class="gallery-item">
                <img src="la cite interdite.jpg" alt="La Cité Interdite">
                <p>La **Cité Interdite**, centre impérial historique.</p>
            </div>

            <div class="gallery-item">
                <img src="pekin2.jpg" alt="Temple du Ciel">
                <p>Le **Temple du Ciel**, architecture sacrée magnifique.</p>
            </div>

            <div class="gallery-item">
                <img src="les hutongs de pékin.jpg" alt="Hutongs de Pékin">
                <p>Les **Hutongs**, quartiers anciens traditionnels.</p>
            </div>
            
        </div>
    </div>
    
    <div class="city-section">
        <h3>Guangzhou</h3>
        <p>Un pôle commercial majeur avec une riche histoire marchande.</p>
        <div class="gallery-grid">
            
            <div class="gallery-item">
                <img src="guangzhou1.jpg" alt="Tour Canton">
                <p>La **Tour Canton**, un chef-d'œuvre de l'ingénierie moderne.</p>
            </div>

            <div class="gallery-item">
                <img src="la rivieres des perles guangzhou.jpg" alt="Rivière des Perles">
                <p>La **Rivière des Perles**, un axe de transport et de vie.</p>
            </div>

            <div class="gallery-item">
                <img src="Temple of the Six Banyon Trees, Guangzhou, China.jfif" alt="Temple des Six Banians">
                <p>Le **Temple des Six Banians**, un lieu historique et religieux.</p>
            </div>
            
        </div>
    </div>
    
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>