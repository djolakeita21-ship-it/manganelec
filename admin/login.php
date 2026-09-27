<?php
session_start();
require '../config.php';

$erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifiant = trim($_POST['identifiant'] ?? '');
    $motdepasse = trim($_POST['motdepasse'] ?? '');

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE identifiant = ?");
    $stmt->execute([$identifiant]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($motdepasse, $admin['mot_de_passe'])) {
        $_SESSION['admin_connecte'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $erreur = "Identifiant ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion Admin - Manganelec</title>
<style>
    body { font-family: Arial, sans-serif; background: #eee; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
    form { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.15); display: flex; flex-direction: column; gap: 12px; width: 300px; }
    input { padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
    button { background: #f0a500; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
    button:hover { background: #d99100; }
    .erreur { color: red; text-align: center; margin: 0; }
    h2 { text-align: center; margin: 0 0 10px; }
</style>
</head>
<body>
<form method="post">
    <h2>Espace Admin</h2>
    <?php if ($erreur): ?><p class="erreur"><?= htmlspecialchars($erreur) ?></p><?php endif; ?>
    <input type="text" name="identifiant" placeholder="Identifiant" required>
    <input type="password" name="motdepasse" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>
</body>
</html>
