<?php
session_start();
include 'config/config.php';

// Vérifier si l'utilisateur est un administrateur ou un employé
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'employe')) {
    header('Location: connexion.php');
    exit();
}

// Identifier le rôle de l'utilisateur connecté
$is_admin = ($_SESSION['role'] === 'admin');
$is_employe = ($_SESSION['role'] === 'employe');

// Récupérer l'ID du service (s'il existe)
$service_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Récupérer les détails du service si l'ID est fourni
if ($service_id) {
    $stmt = $pdo->prepare("SELECT * FROM services WHERE id = ?");
    $stmt->execute([$service_id]);
    $service = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Gestion des modifications ou ajout
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    // Gestion de l'image
    if ($image['error'] === UPLOAD_ERR_OK) {
        $image_name = uniqid() . '_' . basename($image['name']);
        $image_path = 'images/services/' . $image_name;

        // Déplacer le fichier téléchargé dans le répertoire défini
        if (move_uploaded_file($image['tmp_name'], $image_path)) {
            // Si une image existait auparavant, la supprimer
            if (isset($service['image']) && file_exists('images/services/' . $service['image'])) {
                unlink('images/services/' . $service['image']);
            }
        } else {
            echo "<p>Erreur lors du téléchargement de l'image.</p>";
        }
    } else {
        // Conserver l'ancienne image si aucune nouvelle image n'est téléchargée
        $image_path = isset($service['image']) ? $service['image'] : null;
    }

    if ($service_id) {
        // Mise à jour du service
        $stmt = $pdo->prepare("UPDATE services SET name = ?, description = ?, image = ? WHERE id = ?");
        $stmt->execute([$name, $description, $image_path, $service_id]);
        echo "<p>Service mis à jour avec succès !</p>";
    } else {
        // Ajout d'un nouveau service
        $stmt = $pdo->prepare("INSERT INTO services (name, description, image) VALUES (?, ?, ?)");
        $stmt->execute([$name, $description, $image_path]);
        echo "<p>Service ajouté avec succès !</p>";
    }
    
    // Redirection en fonction du rôle après soumission
    $redirect_page = $is_admin ? 'admin_dashboard.php' : 'employe_dashboard.php';
    header("Location: $redirect_page");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $service_id ? "Modifier le Service" : "Ajouter un Service" ?></title>
    <link rel="stylesheet" href="styles/dashboard.css">
</head>
<body>
    <h1><?= $service_id ? "Modifier le Service" : "Ajouter un Service" ?></h1>
    <form method="POST" action="edit_service.php?id=<?= $service_id ?>" enctype="multipart/form-data">
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($service['name'] ?? '') ?>" required>

        <label for="description">Description :</label>
        <textarea name="description" id="description" rows="4" required><?= htmlspecialchars($service['description'] ?? '') ?></textarea>

        <label for="image">Image :</label>
        <input type="file" name="image" id="image">
        <?php if (isset($service['image']) && $service['image']): ?>
            <p><img src="images/services/<?= htmlspecialchars($service['image']) ?>" alt="<?= htmlspecialchars($service['name']) ?>" width="150"></p>
        <?php endif; ?>

        <button type="submit"><?= $service_id ? "Modifier le Service" : "Ajouter le Service" ?></button>
    </form>
    <a href="<?= $is_admin ? 'admin_dashboard.php' : 'employe_dashboard.php' ?>">⬅️Retourner au tableau de bord</a>
</body>
</html>
