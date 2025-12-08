<?php 
$page_title = "Liens Utiles"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2 style="color: #2E8B57;">🔗 Liens Officiels</h2>
    <p>Ressources gouvernementales et touristiques officielles.</p>
    
    <div class="links-list" style="display: flex; flex-direction: column; gap: 20px; margin-top: 20px;">

       <div class="link-card" style="display: flex; align-items: center; border: 1px solid #5DADE2; padding: 15px; border-radius: 8px; background: white;">
    
    <a href="https://www.gov.cn/" target="_blank">
        <img src="images/gouvernement.jpg" alt="Logo" 
             style="width: 60px; height: 60px; border-radius: 50%; margin-right: 20px; object-fit: cover;">
    </a>

    <div style="flex-grow: 1;">
        <h3 style="margin: 0;">
            <a href="https://www.gov.cn/" target="_blank" 
               style="color: #2E8B57; text-decoration: none;">
                Gouvernement Central
            </a>
        </h3>
        <p style="margin: 5px 0 0; color: #666;">Portail officiel et actualités politiques.</p>
    </div>

    <a href="https://www.gov.cn/" target="_blank" class="btn-secondary" style="font-size: 0.8em;">
        Visiter
    </a>
</div>


        <div class="link-card" style="display: flex; align-items: center; border: 1px solid #5DADE2; padding: 15px; border-radius: 8px; background: white;">

    <a href="https://mct.gov.cn/" target="_blank">
        <img src="images/tourismes.jfif" alt="Logo" 
             style="width: 60px; height: 60px; border-radius: 50%; margin-right: 20px; object-fit: cover;">
    </a>

    <div style="flex-grow: 1;">
        <h3 style="margin: 0;">
            <a href="https://mct.gov.cn/" target="_blank" 
               style="color: #2E8B57; text-decoration: none;">
                Administration du Tourisme
            </a>
        </h3>
        <p style="margin: 5px 0 0; color: #666;">Guides de voyage et infos pratiques.</p>
    </div>

    <a href="https://mct.gov.cn/" target="_blank" class="btn-secondary" style="font-size: 0.8em;">
        Visiter
    </a>
</div>


       <div class="link-card" style="display: flex; align-items: center; border: 1px solid #5DADE2; padding: 15px; border-radius: 8px; background: white;">

    <a href="https://www.moe.gov.cn/" target="_blank">
        <img src="images/education.jpg" alt="Logo" 
             style="width: 60px; height: 60px; border-radius: 50%; margin-right: 20px; object-fit: cover;">
    </a>

    <div style="flex-grow: 1;">
        <h3 style="margin: 0;">
            <a href="https://www.moe.gov.cn/" target="_blank" 
               style="color: #2E8B57; text-decoration: none;">
                Ministère de l'Éducation
            </a>
        </h3>
        <p style="margin: 5px 0 0; color: #666;">Universités et système éducatif.</p>
    </div>

    <a href="https://www.moe.gov.cn/" target="_blank" class="btn-secondary" style="font-size: 0.8em;">
        Visiter
    </a>
</div>


    </div>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>