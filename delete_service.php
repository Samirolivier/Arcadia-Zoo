<?php
session_start();
include 'config/config.php';

// Vérifier si l'utilisateur est un administrateur
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: connexion.php');
    exit();
}

// Vérifier si l'ID du service est fourni
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $service_id = $_GET['id'];

    // Préparer et exécuter la requête de suppression
    $stmt = $pdo->prepare("DELETE FROM services WHERE id = ?");
    $stmt->execute([$service_id]);

    // Rediriger vers le tableau de bord après la suppression
    header('Location: admin_dashboard.php');
    exit();
} else {
    echo 'ID de service non valide.';
}
?>