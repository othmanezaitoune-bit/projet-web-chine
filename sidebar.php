<aside id="left-nav">
    <h3>Explorer la Chine</h3>
    <ul>
        <li><a href="<?php echo $path_prefix; ?>sites_monuments.php" class="<?php echo is_active('sites_monuments.php'); ?>">Sites et Monuments</a></li>
        <li><a href="<?php echo $path_prefix; ?>villes_index.php" class="<?php echo is_active('villes_index.php'); ?>">Index des villes</a></li>
        <li><a href="<?php echo $path_prefix; ?>photos_galerie.php" class="<?php echo is_active('photos_galerie.php'); ?>">Galerie Photos</a></li>
        <li><a href="<?php echo $path_prefix; ?>map.php" class="<?php echo is_active('map.php'); ?>">Carte Interactive</a></li>
        <li><a href="<?php echo $path_prefix; ?>liens_utiles.php" class="<?php echo is_active('liens_utiles.php'); ?>">Liens utiles</a></li>
        <li><a href="<?php echo $path_prefix; ?>all_news.php" class="<?php echo is_active('all_news.php'); ?>">Actualités</a></li>
    </ul>
    
    <a href="<?php echo $path_prefix; ?>admin/login.php" class="btn-admin-sidebar">⚙️ Espace Admin</a>
</aside>