# Manganelec — Site de rénovation avec back-end sécurisé

Site vitrine pour une entreprise de rénovation intérieure et extérieure, relié à une base de données MySQL pour la gestion des demandes de devis.

Projet réalisé dans le cadre d'un BTS SIO (alternance).

## Fonctionnalités

- Site vitrine responsive présentant les services et réalisations de l'entreprise
- Formulaire de contact enregistrant automatiquement les demandes de devis en base de données
- Espace administrateur sécurisé permettant de consulter et supprimer les demandes reçues
- Authentification par mot de passe haché et gestion de session PHP

## Stack technique

- **Front-end** : HTML5, CSS3
- **Back-end** : PHP (PDO)
- **Base de données** : MySQL
- **Sécurité** : `password_hash()` / `password_verify()`, requêtes préparées (protection contre les injections SQL), sessions PHP, `htmlspecialchars()` (protection contre les failles XSS)

## Structure du projet

```
manganelec/
├── index.html              # Page d'accueil du site
├── service-detail.html     # Détails des services proposés
├── style.css                # Feuille de style du site
├── config.php                # Connexion PDO à la base de données
├── traitement.php           # Traitement du formulaire de contact
├── database.sql              # Script de création de la base de données
└── admin/
    ├── login.php             # Connexion à l'espace admin
    ├── dashboard.php         # Tableau de bord des demandes reçues
    └── logout.php            # Déconnexion
```

## Base de données

Deux tables :

- **`demandes_devis`** : stocke chaque demande envoyée depuis le formulaire (nom, email, téléphone, message, date, statut)
- **`admin`** : stocke le compte administrateur (identifiant, mot de passe haché)

## Installation en local (XAMPP)

1. Placer le dossier du projet dans `C:\xampp\htdocs\`
2. Démarrer Apache et MySQL depuis le panneau XAMPP
3. Importer `database.sql` via phpMyAdmin (`http://localhost/phpmyadmin`)
4. Créer un compte admin en générant un mot de passe haché avec `password_hash()`, puis l'insérer dans la table `admin`
5. Accéder au site via `http://localhost/manganelec/index.html`

## Auteur

Projet réalisé par Djola Keita dans le cadre du BTS SIO.
