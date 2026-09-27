<?php
// Paramètres de connexion à la base de données
// A adapter si besoin (identifiants par défaut de XAMPP/WAMP : root / mot de passe vide)
$host = 'localhost';
$dbname = 'manganelec';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
