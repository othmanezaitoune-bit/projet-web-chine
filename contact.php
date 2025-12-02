<?php 
$page_title = "Contactez-Nous"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>📧 Contactez-Nous</h2>
    <p>Remplissez le formulaire ci-dessous pour nous contacter. Le script.js validera le format de votre email.</p>

    <form id="contactForm" action="contact_submit.php" method="POST">
        
        <label for="nom">Nom Complet:</label>
        <input type="text" id="nom" name="nom" required>
        <span id="nomError" class="error-message"></span>

        <label for="email">Adresse Email:</label>
        <input type="email" id="email" name="email" required>
        <span id="emailError" class="error-message"></span>

        <label for="message">Votre Message:</label>
        <textarea id="message" name="message" rows="6" required></textarea>
        <span id="messageError" class="error-message"></span>

        <button type="submit">Envoyer le Message</button>
    </form>
</main>

<aside id="right-side">
    <h3>Infos Contact</h3>
    <p>Email: contact@chine-projet.ma</p>
    <p>Téléphone: +212 00 00 00 00</p>
</aside>

<?php include 'footer.php'; ?>