<?php
$cleardb_url = parse_url("mysql://bf5c8f7d96a88e:64840b04@eu-cluster-west-01.k8>

$host = $cleardb_url["host"];
$username = $cleardb_url["user"];
$password = $cleardb_url["pass"];
$database = substr($cleardb_url["path"], 1);

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion    la base de donn  es : " . $e->getMessage());
}                                                                                                                       ?>
