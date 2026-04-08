<?php
// include '../../.env';
$host = 'db';
$dbname = 'veterinaire';
$username = 'root';
$password = '*%*a!@poX3kMQ0'; // Mot de passe vide par défaut sous Laragon

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    die();
}
