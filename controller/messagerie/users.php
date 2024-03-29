<?php
session_start(); // Démarrer une session PHP
include_once "../../model/pdo.php"; // Inclure le fichier contenant la connexion à la base de données PDO
include_once "../admin/role.php";

$outgoing_id = $_SESSION['id']; // Récupérer l'ID de l'utilisateur actuellement connecté depuis la session

if (isset($_SESSION['role']) && $_SESSION['role'] <= Role::CUSTOMER->value) {
    $sql = "SELECT * FROM professional WHERE NOT id_pro = :outgoing_id ORDER BY id_pro DESC"; // Requête SQL pour sélectionner tous les utilisateurs autres que l'utilisateur actuel
    $stmt = $pdo->prepare($sql); // Préparer la requête SQL
    $stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_INT); // Lier la variable à la requête SQL
    $stmt->execute(); // Exécuter la requête SQL
  } elseif (isset($_SESSION['role']) && $_SESSION['role'] >= Role::OWNER->value) {
    $sql = "SELECT * FROM particular WHERE NOT id_user = :outgoing_id ORDER BY id_user DESC"; // Requête SQL pour sélectionner tous les utilisateurs autres que l'utilisateur actuel
    $stmt = $pdo->prepare($sql); // Préparer la requête SQL
    $stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_INT); // Lier la variable à la requête SQL
    $stmt->execute(); // Exécuter la requête SQL

  } else {
    echo"il y a une erreur";
  }
// $sql = "SELECT * FROM professional WHERE NOT id_pro = :outgoing_id ORDER BY id_pro DESC"; // Requête SQL pour sélectionner tous les utilisateurs autres que l'utilisateur actuel
// $stmt = $pdo->prepare($sql); // Préparer la requête SQL
// $stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_INT); // Lier la variable à la requête SQL
// $stmt->execute(); // Exécuter la requête SQL

$output = ""; // Initialiser une chaîne de sortie vide

if ($stmt->rowCount() == 0) { // Vérifier s'il n'y a aucun utilisateur disponible pour discuter
    $output .= "No users are available to chat"; // Ajouter un message indiquant qu'aucun utilisateur n'est disponible pour discuter
} elseif ($stmt->rowCount() > 0) { // Si des utilisateurs sont disponibles pour discuter
    include_once "data.php"; // Inclure un fichier pour traiter les données des utilisateurs disponibles
}

echo $output; // Afficher la sortie
?>
