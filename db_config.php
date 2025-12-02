<?php
// Configuration de la connexion à la base de données
$host = 'localhost';
$db   = 'pays_website'; // Nom de la base de données que vous avez créé
$user = 'root';        // Utilisateur MySQL (typique sur XAMPP)
$pass = '';            // Mot de passe MySQL (typique sur XAMPP)
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     // Afficher un message d'erreur clair si la connexion échoue
     die("Erreur de connexion à la base de données. Vérifiez db_config.php et XAMPP : " . $e->getMessage());
}
?>