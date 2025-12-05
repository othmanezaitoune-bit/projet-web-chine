<?php 
// Définir le titre spécifique de cette page
$page_title = "Liens Utiles"; 

// Inclure la configuration de la BD si la page en avait besoin, sinon on l'omettra ici.
// Pour les liens utiles, la BD n'est pas nécessaire.

include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>Liens vers les Établissements Publics (Max 3)</h2>
    
    <div class="link-item" style="display: flex; align-items: center; margin-bottom: 20px; padding: 15px; border: 1px solid #FFC72C;">
        <img src="images/logo_gouv.png" alt="Logo Gouvernement Chine" style="width: 70px; height: 70px; margin-right: 20px; border: 1px solid #ccc; background: white;">
        <div>
            <p style="margin:0;"><a href="http://www.gov.cn/english/" target="_blank">Portail du Gouvernement Central</a></p>
            <p style="margin:0; font-size: 0.9em;">Informations officielles et politiques.</p>
        </div>
    </div>

    <div class="link-item" style="display: flex; align-items: center; margin-bottom: 20px; padding: 15px; border: 1px solid #FFC72C;">
        <img src="images/logo_tourisme.png" alt="Logo Tourisme Chine" style="width: 70px; height: 70px; margin-right: 20px; border: 1px solid #ccc; background: white;">
        <div>
            <p style="margin:0;"><a href="http://www.cnta.gov.cn/" target="_blank">Administration Nationale du Tourisme</a></p>
            <p style="margin:0; font-size: 0.9em;">Guides officiels et ressources de voyage.</p>
        </div>
    </div>

    <div class="link-item" style="display: flex; align-items: center; margin-bottom: 20px; padding: 15px; border: 1px solid #FFC72C;">
        <img src="images/logo_education.png" alt="Logo Ministère Éducation Chine" style="width: 70px; height: 70px; margin-right: 20px; border: 1px solid #ccc; background: white;">
        <div>
            <p style="margin:0;"><a href="http://www.moe.gov.cn/en/" target="_blank">Ministère de l'Éducation</a></p>
            <p style="margin:0; font-size: 0.9em;">Informations sur les établissements d'enseignement supérieur.</p>
        </div>
    </div>
    
</main>
<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>