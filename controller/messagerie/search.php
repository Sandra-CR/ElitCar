<?php
session_start(); // Démarrer la session

include_once "../../model/pdo.php"; // Inclure le fichier contenant la connexion à la base de données PDO

if (isset($_SESSION['id'])) { // Vérifier si la session est démarrée
    $outgoing_id = $_SESSION['id']; // Récupérer l'ID de l'utilisateur actuellement connecté depuis la session
    $searchTerm = $_POST['searchTerm']; // Récupérer le terme de recherche à partir des données POST (pas besoin d'échapper les caractères avec PDO)

    // Requête SQL pour rechercher des utilisateurs dont le prénom ou le nom correspond au terme de recherche et qui ne sont pas l'utilisateur actuel
    $sql = "SELECT * FROM particular WHERE NOT id_user = :outgoing_id AND (first_name LIKE :searchTerm OR last_name LIKE :searchTerm)";
    $stmt = $pdo->prepare($sql); // Préparer la requête SQL
    $stmt->bindValue(':outgoing_id', $outgoing_id, PDO::PARAM_INT); // Lier la variable à la requête SQL
    $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR); // Lier la variable à la requête SQL en ajoutant des jokers "%" pour la recherche partielle
    $stmt->execute(); // Exécuter la requête SQL

    $output = ""; // Initialiser une chaîne de sortie vide

    if ($stmt->rowCount() > 0) { // Vérifier s'il y a des résultats correspondant à la recherche
        include_once "data.php"; // Inclure un fichier pour traiter les données des utilisateurs trouvés
    } else {
        $output .= 'No user found related to your search term'; // Ajouter un message indiquant qu'aucun utilisateur n'a été trouvé correspondant au terme de recherche
    }

    echo $output; // Afficher la sortie
} else {
    echo "Session is not started."; // Si la session n'est pas démarrée
}
?>
