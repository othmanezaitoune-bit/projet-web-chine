<?php 
$page_title = "Contactez-Nous"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>📧 Contactez-Nous</h2>
    <p>Une question sur votre voyage ? Remplissez le formulaire ci-dessous.</p>

    <form id="contactForm" action="contact_submit.php" method="POST" style="max-width: 600px; margin-top: 20px;">
        
        <div style="margin-bottom: 15px;">
            <label for="nom" style="display: block; font-weight: bold; margin-bottom: 5px;">Nom Complet :</label>
            <input type="text" id="nom" name="nom" required placeholder="Votre nom...">
            <span id="nomError" class="error-message" style="display: block; color: #c62828; margin-top: 5px;"></span>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email :</label>
            <input type="email" id="email" name="email" required placeholder="votre@email.com">
            <span id="emailError" class="error-message" style="display: block; color: #c62828; margin-top: 5px;"></span>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="message" style="display: block; font-weight: bold; margin-bottom: 5px;">Message :</label>
            <textarea id="message" name="message" rows="6" required placeholder="Comment pouvons-nous vous aider ?"></textarea>
            <span id="messageError" class="error-message" style="display: block; color: #c62828; margin-top: 5px;"></span>
        </div>

        <button type="submit" class="btn-send" style="width: 100%;">Envoyer le Message</button>
    </form>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>