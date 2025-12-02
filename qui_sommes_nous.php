<?php 
$page_title = "Qui Sommes-Nous ?"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>👤 L'Équipe du Projet</h2>
    <p>Ce mini-projet a été réalisé par le binôme suivant dans le cadre du module "Techniques Web et Multimédia" (2014/2015).</p>
    
    <div class="equipe-info" style="display: flex; align-items: center; gap: 40px; margin: 30px 0; padding: 15px; border: 1px solid #FFC72C;">
        <img src="images/othmane.png" alt="Photo de l'étudiant 1" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #D52B1E;">
        <div class="membre">
            <h3>Membre 1</h3>
            <p><strong>Nom :</strong> VOTRE NOM</p>
            <p><strong>Prénom :</strong> VOTRE PRÉNOM</p>
            <p><strong>CNE :</strong> A123456789</p>
            <p><strong>Adresse Email :</strong> votre.email1@etu.usmba.ac.ma</p>
        </div>
    </div>
    
    <div class="equipe-info" style="display: flex; align-items: center; gap: 40px; margin: 30px 0; padding: 15px; border: 1px solid #FFC72C;">
        <img src="images/photo_membre2.jpg" alt="Photo de l'étudiant 2" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #D52B1E;">
        <div class="membre">
            <h3>Membre 2</h3>
            <p><strong>Nom :</strong> NOM DU BINÔME</p>
            <p><strong>Prénom :</strong> PRÉNOM DU BINÔME</p>
            <p><strong>CNE :</strong> B987654321</p>
            <p><strong>Adresse Email :</strong> votre.email2@etu.usmba.ac.ma</p>
        </div>
    </div>
    
</main>

<aside id="right-side">
    <h3>Contactez-Nous</h3>
    <p>Utilisez le lien de contact dans le menu principal pour toute question sur le projet.</p>
</aside>

<?php include 'footer.php'; ?>