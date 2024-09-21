<?php
session_start();
include 'config/config.php';

// Vérifier si l'utilisateur est un employé
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employe') {
    header('Location: connexion.php');
    exit();
}

// Validation ou invalidation des avis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['validate_review'])) {
    $review_id = $_POST['review_id'];
    $is_validated = $_POST['is_validated'] === '1' ? 1 : 0;

    try {
        $stmt = $pdo->prepare("UPDATE reviews SET is_validated = ? WHERE id = ?");
        $stmt->execute([$is_validated, $review_id]);
        echo "<p>Avis mis à jour avec succès !</p>";
    } catch (PDOException $e) {
        echo "<p>Erreur lors de la mise à jour de l'avis : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}

// Ajouter une alimentation quotidienne
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_feeding'])) {
    $animal_id = $_POST['animal_id'];
    $food_type = $_POST['food_type'];
    $grammage = $_POST['grammage'];
    $feeding_time = $_POST['feeding_time'];
    $user_id = $_SESSION['user_id'];

    try {
        $stmt = $pdo->prepare("INSERT INTO feeding_logs (animal_id, user_id, food_type, grammage, feeding_time) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$animal_id, $user_id, $food_type, $grammage, $feeding_time]);
        echo "<p>Alimentation ajoutée avec succès !</p>";
    } catch (PDOException $e) {
        echo "<p>Erreur lors de l'ajout de l'alimentation : " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}

// Gestion des services
$stmt_services = $pdo->prepare("SELECT id, name, description, image FROM services");
$stmt_services->execute();
$services = $stmt_services->fetchAll(PDO::FETCH_ASSOC);

// Gestion des avis
$stmt_reviews = $pdo->prepare("SELECT id, visitor_name, review, is_validated FROM reviews");
$stmt_reviews->execute();
$reviews = $stmt_reviews->fetchAll(PDO::FETCH_ASSOC);

// Gestion des animaux pour l'alimentation
$stmt_animals = $pdo->prepare("SELECT id, name FROM animals ORDER BY name ASC"); //par ordre alphabétique
$stmt_animals->execute();
$animals = $stmt_animals->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Employé</title>
    <link rel="stylesheet" href="dashboard1/style.css">
</head>
<body>
    <h1>Tableau de Bord Employé</h1>

    <!-- Section pour valider ou invalider les avis -->
    <h2>Gestion des Avis</h2>
    <table>
        <thead>
            <tr>
                <th>Nom du Visiteur</th>
                <th>Avis</th>
                <th>Validé</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?= htmlspecialchars($review['visitor_name']); ?></td>
                    <td><?= htmlspecialchars($review['review']); ?></td>
                    <td><?= $review['is_validated'] ? 'Oui' : 'Non'; ?></td>
                    <td>
                        <form method="POST" action="employe_dashboard.php">
                            <input type="hidden" name="review_id" value="<?= $review['id']; ?>">
                            <select name="is_validated">
                                <option value="1" <?= $review['is_validated'] ? 'selected' : ''; ?>>Valider</option>
                                <option value="0" <?= !$review['is_validated'] ? 'selected' : ''; ?>>Invalider</option>
                            </select>
                            <button type="submit" name="validate_review">Mettre à jour</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Section pour ajouter une alimentation quotidienne -->
    <h2>Ajouter une Alimentation</h2>
    <form method="POST" action="employe_dashboard.php">
        <label for="animal_id">Animal :</label>
        <select name="animal_id" id="animal_id" required>
            <?php foreach ($animals as $animal): ?>
                <option value="<?= $animal['id']; ?>"><?= htmlspecialchars($animal['name']); ?></option>
            <?php endforeach; ?>
        </select>

        <label for="food_type">Type de Nourriture :</label>
        <input type="text" name="food_type" id="food_type" required>

        <label for="grammage">Quantité (en grammes) :</label>
        <input type="number" name="grammage" id="grammage" step="0.01" required>

        <label for="feeding_time">Date et Heure :</label>
        <input type="datetime-local" name="feeding_time" id="feeding_time" required>

        <button type="submit" name="add_feeding">Ajouter</button>
    </form>

    <!-- Section pour gérer les services -->
    <h2>Gestion des Services</h2>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><img src="<?= htmlspecialchars($service['image']); ?>" alt="<?= htmlspecialchars($service['name']); ?>" width="100"></td>
                    <td><?= htmlspecialchars($service['name']); ?></td>
                    <td><?= htmlspecialchars($service['description']); ?></td>
                    <td>
                        <a href="edit_service.php?id=<?= $service['id']; ?>">Modifier</a>
                        <!-- désactivier pour l'utilisateur employé -->
                        <!--<a href="delete_service.php?id=<?= $service['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">Supprimer</a>--> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>