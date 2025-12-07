<?php 
$page_title = "Index des Villes"; 
include 'header.php'; 
include 'sidebar.php'; 
?>

<main id="center-content">
    <h2 style="color: #2E8B57;">Index des Villes Majeures</h2>
    <p>Comparatif des trois métropoles principales.</p>
    
    <div class="table-container" style="overflow-x: auto; margin-top: 20px;">
        <table class="cities-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #2E8B57; color: white; text-align: left;">
                    <th style="padding: 15px;">Ville</th>
                    <th style="padding: 15px;">Rôle Principal</th>
                    <th style="padding: 15px;">Description</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px; font-weight: bold; color: #2E8B57;">Shanghai</td>
                    <td style="padding: 15px;">Finance & Commerce</td>
                    <td style="padding: 15px;">Moteur économique, connue pour le Bund et Pudong.</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee; background-color: #f9f9f9;">
                    <td style="padding: 15px; font-weight: bold; color: #2E8B57;">Pékin (Beijing)</td>
                    <td style="padding: 15px;">Politique & Culture</td>
                    <td style="padding: 15px;">Capitale historique abritant la Cité Interdite.</td>
                </tr>
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 15px; font-weight: bold; color: #2E8B57;">Guangzhou</td>
                    <td style="padding: 15px;">Commerce & Industrie</td>
                    <td style="padding: 15px;">Pôle du sud célèbre pour sa foire internationale.</td>
                </tr>
            </tbody>
        </table>
    </div>
</main>

<?php include 'sidebar_right.php'; ?>
<?php include 'footer.php'; ?>