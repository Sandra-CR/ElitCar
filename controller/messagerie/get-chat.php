<?php 
session_start(); // Démarrer la session

if(isset($_SESSION['id'])){ // Vérifier si la session est démarrée et si l'ID de l'utilisateur est défini
    include_once "../../model/pdo.php"; // Inclure le fichier contenant la connexion à la base de données PDO
    
    $outgoing_id = $_SESSION['id']; // Récupérer l'ID de l'utilisateur actuellement connecté depuis la session
    $incoming_id = $_POST['incoming_id']; // Récupérer l'ID de l'utilisateur destinataire des messages depuis les données POST (pas besoin d'échapper les caractères avec PDO)
    $output = ""; // Initialiser une chaîne de sortie vide

    // Requête SQL pour sélectionner les messages entre l'utilisateur actuel et le destinataire, ordonnés par ID de message
    $sql = "SELECT * FROM messages WHERE (outgoing_msg_id = :outgoing_id AND incoming_msg_id = :incoming_id)
            OR (outgoing_msg_id = :incoming_id AND incoming_msg_id = :outgoing_id) ORDER BY msg_id";
    $stmt = $pdo->prepare($sql); // Préparer la requête SQL
    $stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_INT); // Lier l'ID de l'utilisateur actuel à la requête
    $stmt->bindParam(':incoming_id', $incoming_id, PDO::PARAM_INT); // Lier l'ID de l'utilisateur destinataire à la requête
    $stmt->execute(); // Exécuter la requête SQL

    if ($stmt->rowCount() > 0) { // Vérifier s'il y a des messages disponibles
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // Parcourir les résultats de la requête
            if ($row['outgoing_msg_id'] === $outgoing_id) { // Vérifier si le message a été envoyé par l'utilisateur actuel
                // Construction du HTML pour afficher le message sortant
                $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>' . $row['msg'] . '</p>
                            </div>
                            </div>';
            } else { // Si le message a été reçu par l'utilisateur actuel
                // Construction du HTML pour afficher le message entrant
                $output .= '<div class="chat incoming">
                            <div class="details">
                                <p>' . $row['msg'] . '</p>
                            </div>
                            </div>';
            }
        }
    } else { // Si aucun message n'est disponible entre les utilisateurs
        $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>'; // Ajouter un message indiquant l'absence de messages
    }
    echo $output; // Afficher la sortie contenant les messages
} else {
    // header("location: /login.php"); // Rediriger vers la page de connexion si la session n'est pas démarrée
}
?>
