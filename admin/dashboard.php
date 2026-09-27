<?php
session_start();
if (!isset($_SESSION['admin_connecte'])) {
    header("Location: login.php");
    exit;
}
require '../config.php';

// Suppression d'une demande
if (isset($_GET['supprimer'])) {
    $stmt = $pdo->prepare("DELETE FROM demandes_devis WHERE id = ?");
    $stmt->execute([$_GET['supprimer']]);
    header("Location: dashboard.php");
    exit;
}

$demandes = $pdo->query("SELECT * FROM demandes_devis ORDER BY date_demande DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Tableau de bord - Manganelec</title>
<style>
    body { font-family: Arial, sans-serif; background: #f7f7f7; padding: 30px; margin: 0; }
    table { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
    th { background: #222; color: white; }
    a.suppr { color: #c0392b; text-decoration: none; font-weight: bold; }
    .top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
    .top a { text-decoration: none; color: #222; }
    .vide { text-align: center; padding: 30px; color: #777; }
</style>
</head>
<body>
<div class="top">
    <h1>Demandes de devis reçues</h1>
    <a href="logout.php">Déconnexion</a>
</div>

<?php if (count($demandes) === 0): ?>
    <p class="vide">Aucune demande pour le moment.</p>
<?php else: ?>
<table>
<tr>
    <th>Nom</th><th>Email</th><th>Téléphone</th><th>Message</th><th>Date</th><th>Statut</th><th>Action</th>
</tr>
<?php foreach ($demandes as $d): ?>
<tr>
    <td><?= htmlspecialchars($d['nom']) ?></td>
    <td><?= htmlspecialchars($d['email']) ?></td>
    <td><?= htmlspecialchars($d['telephone']) ?></td>
    <td><?= htmlspecialchars($d['message']) ?></td>
    <td><?= htmlspecialchars($d['date_demande']) ?></td>
    <td><?= htmlspecialchars($d['statut']) ?></td>
    <td><a class="suppr" href="?supprimer=<?= (int)$d['id'] ?>" onclick="return confirm('Supprimer cette demande ?');">Supprimer</a></td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>
</body>
</html>
