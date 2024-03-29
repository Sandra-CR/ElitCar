<?php 
session_start(); // Démarrer la session

if(isset($_SESSION['id'])){ // Vérifier si la session est démarrée et si l'ID de l'utilisateur est défini
    include_once "../../model/pdo.php"; // Inclure le fichier contenant la connexion à la base de données PDO
    
    $outgoing_id = $_SESSION['id']; // Récupérer l'ID de l'utilisateur actuellement connecté depuis la session
    $incoming_id = $_POST['incoming_id']; // Récupérer l'ID de l'utilisateur destinataire du message depuis les données POST (pas besoin d'échapper les caractères avec PDO)
    $message = $_POST['message']; // Récupérer le message depuis les données POST (pas besoin d'échapper les caractères avec PDO)

    try {
        if(!empty($message)){ // Vérifier si le message n'est pas vide
            $stmt = $pdo->prepare("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES (:incoming_id, :outgoing_id, :message)"); // Préparer la requête d'insertion du message dans la base de données
            $stmt->bindParam(':incoming_id', $incoming_id, PDO::PARAM_INT); // Lier l'ID de l'utilisateur destinataire à la requête
            $stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_INT); // Lier l'ID de l'utilisateur émetteur à la requête
            $stmt->bindParam(':message', $message, PDO::PARAM_STR); // Lier le message à la requête
            $stmt->execute(); // Exécuter la requête d'insertion
            echo "Message envoyé avec succès!"; // Afficher un message de succès
        } else {
            echo "Le message est vide."; // Afficher un message d'erreur si le message est vide
        }
    } catch(PDOException $e) { // Capturer les exceptions PDO
        echo "Erreur lors de l'insertion du message : " . $e->getMessage(); // Afficher un message d'erreur avec le détail de l'exception
    }
} else {
    header("location: users.php"); // Rediriger vers la page des utilisateurs si la session n'est pas démarrée
    exit; // Arrêter l'exécution du script après la redirection
}
?>
