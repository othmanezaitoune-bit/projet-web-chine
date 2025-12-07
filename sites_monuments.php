<?php 
$page_title = "Sites et Monuments"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <div class="monuments-header" style="border-bottom: 1px solid #eee; padding-bottom: 15px; margin-bottom: 30px;">
        <h2 style="color: #2E8B57;">Sites et Monuments Historiques</h2>
        <p>Explorez les merveilles architecturales qui ont façonné l'histoire de la Chine.</p>
    </div>
    
    <div class="monuments-list" style="display: flex; flex-direction: column; gap: 40px;">

        <article class="monument-card" style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
            <h3 style="background-color: #2E8B57; color: white; padding: 12px 20px; margin: 0;">1. La Grande Muraille</h3>
            <div class="monument-img-wrapper">
                <img src="images/great-wall-of-china.jpg" alt="Grande Muraille" style="width: 100%; height: auto; display: block;">
            </div>
            <div class="monument-content" style="padding: 20px;">
                <p>La Grande Muraille est une série de fortifications militaires, construite pour protéger la frontière nord de la Chine.</p>
            </div>
        </article>

        <article class="monument-card" style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
            <h3 style="background-color: #2E8B57; color: white; padding: 12px 20px; margin: 0;">2. L'Armée de Terre Cuite (Xi'an)</h3>
            <div class="monument-img-wrapper">
                <img src="images/Image of the Terracotta Army in Xi'an.jpg" alt="Armée de Terre Cuite" style="width: 100%; height: auto; display: block;">
            </div>
            <div class="monument-content" style="padding: 20px;">
                <p>C'est une collection de sculptures en terre cuite représentant les armées de Qin Shi Huang.</p>
            </div>
        </article>

        <article class="monument-card" style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
            <h3 style="background-color: #2E8B57; color: white; padding: 12px 20px; margin: 0;">3. La Cité Interdite (Pékin)</h3>
            <div class="monument-img-wrapper">
                <img src="images/la cite interdite.jpg" alt="La Cité Interdite" style="width: 100%; height: auto; display: block;">
            </div>
            <div class="monument-content" style="padding: 20px;">
                <p>Ancien palais impérial des dynasties Ming et Qing situé au cœur de Pékin.</p>
            </div>
        </article>
        
    </div>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>