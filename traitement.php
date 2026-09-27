<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = htmlspecialchars(trim($_POST['nom'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $telephone = htmlspecialchars(trim($_POST['telephone'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    // Vérification simple des champs obligatoires
    if (!empty($nom) && !empty($email)) {

        $stmt = $pdo->prepare("INSERT INTO demandes_devis (nom, email, telephone, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $email, $telephone, $message]);

        header("Location: index.html?success=1");
        exit;

    } else {
        header("Location: index.html?error=1");
        exit;
    }
}
