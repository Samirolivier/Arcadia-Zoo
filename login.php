<?php
include 'config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header('Location: admin_dashboard.php');
        } elseif ($user['role'] == 'employe') {
            header('Location: employe_dashboard.php');
        } elseif ($user['role'] == 'veterinaire') {
            header('Location: vet_dashboard.php');
        }
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
<?php include 'menu.php'; ?>    
<h1>Connexion</h1>
    <form action="login.php" method="POST">
        <label>Email :</label>
        <input type="email" name="email" required><br>
        <label>Mot de passe :</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Connexion">
    </form>
</body>
</html>
