<?php
session_start();
include 'config/config.php';

// Vérifier si l'utilisateur est un vétérinaire
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'veterinaire') {
    header('Location: connexion.php');
    exit();
}

// Récupérer l'ID de l'utilisateur
$user_id = $_SESSION['user_id'];

// Récupérer les animaux
$stmt_animals = $pdo->prepare("SELECT id, name FROM animals ORDER BY name ASC"); //par ordre alphabétique
$stmt_animals->execute();
$animals = $stmt_animals->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les habitats
$stmt_habitats = $pdo->prepare("SELECT id, name FROM habitats ORDER BY name ASC"); //par ordre alphabétique
$stmt_habitats->execute();
$habitats = $stmt_habitats->fetchAll(PDO::FETCH_ASSOC);

// Gérer les rapports
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_report'])) {
    $animal_id = $_POST['animal_id'];
    $report_date = $_POST['report_date'];
    $description = $_POST['description'];
    $health_status = $_POST['health_status'];
    $feeding_comments = $_POST['feeding_comments'];
    $habitat_comments = $_POST['habitat_comments'];

    // Insérer le rapport dans la table reports
    $stmt_report = $pdo->prepare("INSERT INTO reports (veterinarian_id, animal_id, report_date, description, health_status, feeding_comments, habitat_comments) 
                                  VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt_report->execute([$user_id, $animal_id, $report_date, $description, $health_status, $feeding_comments, $habitat_comments]);

    // Mettre à jour l'état de santé de l'animal dans la table animals
    if (!empty($health_status)) {
        $stmt_update_health = $pdo->prepare("UPDATE animals SET health_status = ? WHERE id = ?");
        $stmt_update_health->execute([$health_status, $animal_id]);
    }

    echo '<p>Compte rendu ajouté et état de santé mis à jour avec succès !</p>';
}

// Gérer les commentaires sur les habitats
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_habitat_comment'])) {
    $habitat_id = $_POST['habitat_id'];
    $comment = $_POST['comment'];

    $stmt_habitat_comments = $pdo->prepare("INSERT INTO habitat_comments (habitat_id, veterinarian_id, comment) VALUES (?, ?, ?)");
    $stmt_habitat_comments->execute([$habitat_id, $user_id, $comment]);

    echo '<p>Commentaire sur l\'habitat ajouté avec succès !</p>';
}

// Récupérer les alimentations
$filter_animal = isset($_GET['animal_id']) ? $_GET['animal_id'] : null;
$sql_feedings = "SELECT a.name as animal_name, f.food_type, f.grammage, f.feeding_time 
                  FROM feeding_logs f 
                  JOIN animals a ON f.animal_id = a.id 
                  WHERE f.animal_id = :animal_id 
                  ORDER BY f.feeding_time DESC";

$stmt_feedings = $pdo->prepare($sql_feedings);

if ($filter_animal) {
    $stmt_feedings->bindParam(':animal_id', $filter_animal, PDO::PARAM_INT);
} else {
    $stmt_feedings->bindValue(':animal_id', 0, PDO::PARAM_INT); // pour éviter une erreur SQL si aucun filtre
}

$stmt_feedings->execute();
$feedings = $stmt_feedings->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Vétérinaire</title>
    <link rel="stylesheet" href="styles/vet_dashboard.css">
</head>
<body>
    <h1>Espace Vétérinaire</h1>

    <!-- Formulaire pour ajouter un compte rendu -->
    <h2>Ajouter un Compte Rendu</h2>
    <form method="POST" action="vet_dashboard.php">
        <label for="animal_id">Animal :</label>
        <select name="animal_id" id="animal_id" required>
            <?php foreach ($animals as $animal): ?>
                <option value="<?= $animal['id']; ?>"><?= htmlspecialchars($animal['name']); ?></option>
            <?php endforeach; ?>
        </select>

        <label for="report_date">Date du Rapport :</label>
        <input type="date" name="report_date" id="report_date" required>

        <label for="description">Description :</label>
        <textarea name="description" id="description" required></textarea>

        <label for="health_status">État de Santé :</label>
        <input type="text" name="health_status" id="health_status">

        <label for="feeding_comments">Commentaires sur l'Alimentation :</label>
        <textarea name="feeding_comments" id="feeding_comments"></textarea>

        <label for="habitat_comments">Commentaires sur l'Habitat :</label>
        <textarea name="habitat_comments" id="habitat_comments"></textarea>

        <button type="submit" name="submit_report">Ajouter le Compte Rendu</button>
    </form>

    <!-- Formulaire pour ajouter un commentaire sur l'habitat -->
    <h2>Ajouter un Commentaire sur l'Habitat</h2>
    <form method="POST" action="vet_dashboard.php">
        <label for="habitat_id">Habitat :</label>
        <select name="habitat_id" id="habitat_id" required>
            <?php foreach ($habitats as $habitat): ?>
                <option value="<?= $habitat['id']; ?>"><?= htmlspecialchars($habitat['name']); ?></option>
            <?php endforeach; ?>
        </select>

        <label for="comment">Commentaire :</label>
        <textarea name="comment" id="comment" required></textarea>

        <button type="submit" name="submit_habitat_comment">Ajouter le Commentaire sur l'Habitat</button>
    </form>

    <!-- Formulaire pour filtrer les alimentations -->
    <h2>Alimentations des Animaux</h2>
    <form method="GET" action="vet_dashboard.php">
        <label for="animal_id">Filtrer par animal :</label>
        <select name="animal_id" id="animal_id">
            <option value="">Tous</option>
            <?php foreach ($animals as $animal): ?>
                <option value="<?= $animal['id']; ?>" <?= $filter_animal == $animal['id'] ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($animal['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Filtrer</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Animal</th>
                <th>Type de Nourriture</th>
                <th>Quantité (grammes)</th>
                <th>Date et Heure</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($feedings as $feeding): ?>
                <tr>
                    <td><?= htmlspecialchars($feeding['animal_name']); ?></td>
                    <td><?= htmlspecialchars($feeding['food_type']); ?></td>
                    <td><?= htmlspecialchars($feeding['grammage']); ?></td>
                    <td><?= htmlspecialchars($feeding['feeding_time']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
