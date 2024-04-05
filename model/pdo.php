<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=elitcar", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    // Gérer ou enregistrer l'erreur de connexion
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}
