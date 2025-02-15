<?php
$host = 'localhost'; // ou l'adresse de votre serveur MySQL
$dbname = 'ARTICLES';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec de la connexion : ' . $e->getMessage();
}
?>
