MANGANELEC - PARTIE BACK-END
=============================

CE QUI A ETE AJOUTE A TON SITE
-------------------------------
- Une base de données MySQL avec 2 tables : demandes_devis et admin
- Le formulaire de contact enregistre maintenant les demandes en base (traitement.php)
- Un espace admin protégé par mot de passe (dossier admin/) pour consulter
  et supprimer les demandes reçues

INSTALLATION (avec XAMPP ou WAMP)
-----------------------------------
1. Installe XAMPP (https://www.apachefriends.org) si ce n'est pas déjà fait.
2. Copie tout le dossier "manganelec-backend" dans le dossier htdocs
   (ex: C:\xampp\htdocs\manganelec)
3. Démarre Apache et MySQL depuis le panneau de contrôle XAMPP.
4. Va sur http://localhost/phpmyadmin
5. Onglet "Importer" > sélectionne le fichier database.sql > Exécuter.
   Cela crée la base "manganelec" et ses 2 tables.

CREER TON COMPTE ADMIN
-------------------------
1. Ouvre http://localhost/manganelec/generer_mot_de_passe.php dans ton
   navigateur. Change d'abord la valeur $mon_mot_de_passe dans le fichier
   si tu veux un autre mot de passe que "motdepasse123".
2. Copie le hash affiché (une longue chaîne commençant par $2y$...)
3. Dans phpMyAdmin, va dans la table "admin" > Insérer une ligne :
   - identifiant : admin (ou ce que tu veux)
   - mot_de_passe : colle le hash copié à l'étape 2
4. Supprime le fichier generer_mot_de_passe.php une fois que c'est fait
   (par sécurité, il ne doit pas rester en ligne).

TESTER LE SITE
-----------------
- Site public : http://localhost/manganelec/index.html
- Remplis le formulaire de contact en bas de page > la demande est
  enregistrée dans la table demandes_devis.
- Espace admin : http://localhost/manganelec/admin/login.php
  Connecte-toi avec l'identifiant et le mot de passe créés plus haut.
  Tu verras la liste des demandes reçues et pourras les supprimer.

POUR TON DOSSIER BTS
------------------------
Ce projet illustre :
- Une base de données relationnelle (MCD/MLD simple à refaire au propre :
  table demandes_devis + table admin)
- Un formulaire relié à la base de données (opération CRUD : Create)
- Une interface d'administration sécurisée (authentification avec
  mot de passe haché via password_hash, gestion de session PHP)
- Une opération de suppression (CRUD : Delete)

Si ton référentiel demande aussi de la modification (Update) ou plus de
tables (par ex. gérer les services depuis la base plutôt qu'en HTML en dur),
dis-le moi et je complète.
