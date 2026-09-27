-- Base de données du site Manganelec
-- A importer dans phpMyAdmin (onglet "Importer") ou via la console MySQL

CREATE DATABASE IF NOT EXISTS manganelec CHARACTER SET utf8mb4;
USE manganelec;

-- Table qui stocke les demandes de devis envoyées depuis le formulaire de contact
CREATE TABLE demandes_devis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telephone VARCHAR(20),
    message TEXT,
    date_demande DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut VARCHAR(20) DEFAULT 'nouveau'
);

-- Table qui stocke le compte administrateur du site
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    identifiant VARCHAR(50) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL
);

-- IMPORTANT : le mot de passe ci-dessous doit être remplacé par un hash
-- généré avec generer_mot_de_passe.php (voir le README). Ne jamais stocker
-- un mot de passe en clair.
-- INSERT INTO admin (identifiant, mot_de_passe) VALUES ('admin', 'COLLER_LE_HASH_ICI');
