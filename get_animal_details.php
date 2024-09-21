<?php
include 'config/config.php';

// Vérifie si un ID d'animal est passé dans l'URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Vérifie si un nouvel état de santé est envoyé via POST
    if (isset($_POST['health_status'])) {
        $new_health_status = $_POST['health_status'];

        // Met à jour l'état de santé de l'animal
        $stmt_update_health = $pdo->prepare("UPDATE animals SET health_status = ? WHERE id = ?");
        $stmt_update_health->execute([$new_health_status, $id]);
    }

    // Récupérer les détails de l'animal à partir de la base de données
    $stmt_animal = $pdo->prepare("SELECT * FROM animals WHERE id = ?");
    $stmt_animal->execute([$id]);
    $animal = $stmt_animal->fetch(PDO::FETCH_ASSOC);

    if ($animal) {
        // Récupérer les détails de la dernière alimentation de l'animal
        $stmt_feeding = $pdo->prepare("
            SELECT food_type, grammage, feeding_time 
            FROM feeding_logs 
            WHERE animal_id = ? 
            ORDER BY feeding_time DESC 
            LIMIT 1
        ");
        $stmt_feeding->execute([$id]);
        $feeding = $stmt_feeding->fetch(PDO::FETCH_ASSOC);

        // Récupérer le nombre de vues
        $stmt_views = $pdo->prepare("SELECT views FROM animals WHERE id = ?");
        $stmt_views->execute([$id]);
        $views = $stmt_views->fetchColumn();

        // Mettre à jour le nombre de vues
        $sql_update = "UPDATE animals SET views = views + 1 WHERE id = ?";
        $stmt_update = $pdo->prepare($sql_update);
        $stmt_update->execute([$id]);

        // Préparer les données à envoyer en JSON
        $response = [
            'name' => $animal['name'],
            'image' => $animal['image'],
            'health_status' => $animal['health_status'], // État de santé mis à jour si applicable
            'food' => $feeding ? $feeding['food_type'] : 'N/A',
            'weight' => $feeding ? $feeding['grammage'] : 'N/A',
            'feeding_time' => $feeding ? $feeding['feeding_time'] : 'N/A',
            'views' => $views + 1 // On retourne le nouveau nombre de vues
        ];

        // Retourner la réponse en JSON
        echo json_encode($response);
    } else {
        // Retourner une erreur si l'animal n'est pas trouvé
        echo json_encode(['error' => 'Animal non trouvé']);
    }
} else {
    // Retourner une erreur si l'ID n'est pas fourni ou est invalide
    echo json_encode(['error' => 'ID non valide ou non fourni']);
}
