<aside id="right-side">
    <div id="video-container">
        <video controls poster="<?php echo isset($path_prefix) ? $path_prefix : ''; ?>images/poster_chine.jpg">
            <source src="<?php echo isset($path_prefix) ? $path_prefix : ''; ?>documentaire.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la balise vidéo.
        </video>
    </div>
    
    <div id="newsletter-form-container">
        <h3>Newsletter</h3>
        <p>Recevez nos guides de voyage.</p>
        <form action="<?php echo isset($path_prefix) ? $path_prefix : ''; ?>newsletter_subscribe.php" method="POST">
            <input type="email" name="email" placeholder="Votre email..." required>
            <button type="submit">Je m'inscris</button>
        </form>
    </div>
</aside>