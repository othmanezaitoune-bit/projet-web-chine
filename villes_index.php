<?php 
$page_title = "Index des Villes"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2>Index des Villes Principales (Max 3)</h2>
    
    <table class="villes-table">
        <thead>
            <tr>
                <th>Nom de la ville</th>
                <th>Superficie (km²)</th>
                <th>Population (estimation 2024)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Shanghai</td>
                <td>6 340</td>
                <td>~29 900 000</td>
            </tr>
            <tr>
                <td>Pékin (Beijing)</td>
                <td>16 410</td>
                <td>~22 400 000</td>
            </tr>
            <tr>
                <td>Guangzhou</td>
                <td>7 434</td>
                <td>~17 400 000</td>
            </tr>
        </tbody>
    </table>
    
    <p style="font-size: 0.9em; margin-top: 20px;">
        Ces données sont fournies à titre indicatif pour les besoins du mini-projet.
    </p>
    
</main>


<?php include 'sidebar_right.php'; ?>

<?php include 'footer.php'; ?>