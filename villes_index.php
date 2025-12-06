<?php 
$page_title = "Index des Villes (Shanghai, Pékin, Guangzhou)"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>Index des Villes Majeures</h2>
    <p>Découvrez nos trois villes phares, représentant le dynamisme économique, politique et culturel de la Chine.</p>
    
    <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #D52B1E; color: white;">
                <th style="padding: 10px;">Ville</th>
                <th style="padding: 10px;">Rôle Principal</th>
                <th style="padding: 10px;">Description Brève</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 10px; font-weight: bold;">Shanghai</td>
                <td style="padding: 10px;">Centre Financier et Commercial</td>
                <td style="padding: 10px;">Ville la plus peuplée et moteur économique de la Chine, connue pour son architecture futuriste (Pudong) et son histoire coloniale (Bund).</td>
            </tr>
            <tr>
                <td style="padding: 10px; font-weight: bold;">Pékin (Beijing)</td>
                <td style="padding: 10px;">Capitale Politique et Culturelle</td>
                <td style="padding: 10px;">Héberge le gouvernement central, la Cité Interdite, et est le cœur historique du pays.</td>
            </tr>
            <tr>
                <td style="padding: 10px; font-weight: bold;">Guangzhou (Canton)</td>
                <td style="padding: 10px;">Pôle Manufacturier et Commercial</td>
                <td style="padding: 10px;">Ville du sud, historique, célèbre pour son commerce international (Foire de Canton) et sa riche tradition culinaire.</td>
            </tr>
        </tbody>
    </table>
    
    <p style="margin-top: 30px;">Pour plus de photos, consultez la <a href="photos_galerie.php">Galerie Photos</a>.</p>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>