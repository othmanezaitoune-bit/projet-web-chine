<?php 
$page_title = "Qui Sommes-Nous ?"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    
    <div class="about-header" style="border-bottom: 1px solid #eee; margin-bottom: 30px;">
        <h2 style="color: #2E8B57;">👤 L'Équipe du Projet</h2>
        <p>Ce site a été réalisé par le binôme suivant dans le cadre du module "Techniques Web".</p>
    </div>
    
    <div class="team-container" style="display: flex; flex-direction: column; gap: 30px;">
        
        <div class="team-member-card" style="display: flex; align-items: center; gap: 20px; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
            <div class="member-photo">
                <img src="images/othmane.png" alt="Etudiant 1" style="width: 100px; height: 100px; border-radius: 50%; border: 3px solid #2E8B57; object-fit: cover;">
            </div>
            <div class="member-info">
                <h3 style="margin: 0 0 10px 0; color: #2E8B57;">Membre 1</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li><strong>Nom :</strong> VOTRE NOM</li>
                    <li><strong>Prénom :</strong> VOTRE PRÉNOM</li>
                    <li><strong>CNE :</strong> CNE DU BINÔME</li>
                    <li><strong>Email :</strong> <a href="mailto:email@etu.ma" style="color: #5DADE2;">votre.email@etu.ma</a></li>
                </ul>
            </div>
        </div>
        
        <div class="team-member-card" style="display: flex; align-items: center; gap: 20px; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
            <div class="member-photo">
                <img src="images/photo_membre2.jpg" alt="Etudiant 2" style="width: 100px; height: 100px; border-radius: 50%; border: 3px solid #2E8B57; object-fit: cover;">
            </div>
            <div class="member-info">
                <h3 style="margin: 0 0 10px 0; color: #2E8B57;">Membre 2</h3>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li><strong>Nom :</strong> NOM DU BINÔME</li>
                    <li><strong>Prénom :</strong> PRÉNOM</li>
                    <li><strong>CNE :</strong> CNE DU BINÔME</li>
                    <li><strong>Email :</strong> <a href="mailto:email2@etu.ma" style="color: #5DADE2;">binome.email@etu.ma</a></li>
                </ul>
            </div>
        </div>

    </div>
    
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>