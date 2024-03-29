<?php
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // Boucle while pour parcourir les résultats de la requête $stmt
    // Requête SQL pour sélectionner le dernier message échangé entre l'utilisateur actuel et l'utilisateur de la ligne en cours
    if (isset($_SESSION['role']) && $_SESSION['role'] <= Role::CUSTOMER->value) {
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = :row_id OR outgoing_msg_id = :row_id) 
            AND (outgoing_msg_id = :outgoing_id OR incoming_msg_id = :outgoing_id) 
            ORDER BY msg_id DESC LIMIT 1";
        $stmt2 = $pdo->prepare($sql2); // Préparer la requête SQL
        $stmt2->bindParam(':row_id', $row['id_user'], PDO::PARAM_INT); // Lier l'ID de l'utilisateur de la ligne en cours à la requête
        $stmt2->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_INT); // Lier l'ID de l'utilisateur actuel à la requête
        $stmt2->execute(); // Exécuter la requête SQL

        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC); // Récupérer la première ligne de résultat sous forme de tableau associatif

        $result = (isset($row2['msg'])) ? $row2['msg'] : "No message available"; // Récupérer le dernier message ou afficher un message par défaut s'il n'y a pas de message
        $msg = (strlen($result) > 28) ? substr($result, 0, 28) . '...' : $result; // Limiter la longueur du message à 28 caractères et ajouter des points de suspension si le message est plus long
        $you = ""; // Initialiser une variable pour indiquer si le message a été envoyé par l'utilisateur actuel

        if (isset($row2['outgoing_msg_id'])) { // Vérifier si l'utilisateur de la ligne en cours a envoyé le dernier message
            $you = ($outgoing_id == $row2['outgoing_msg_id']) ? "You: " : ""; // Si l'utilisateur actuel est l'expéditeur du dernier message, ajouter "You: " à la chaîne $you
        }

        $offline = ($row['status'] == "Offline now") ? "offline" : ""; // Vérifier si l'utilisateur est hors ligne
        $hid_me = ($outgoing_id == $row['id_user']) ? "hide" : ""; // Cacher le nom de l'utilisateur actuel s'il est l'utilisateur en cours de traitement
        
        // Déterminer le statut de l'utilisateur (en ligne ou hors ligne)
        $status_dot = ($offline === "offline") ? "offline" : "online";

        // Construire le HTML pour afficher les informations de l'utilisateur (nom, dernier message, statut en ligne/hors ligne)
        $output .= '<a href="view/messagerie/chat.php?id_user=' . $row['id_pro'] . '">
                    <div class="content">
                    <div class="details">
                        <span>' . $row['name'] . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>
                    <div class="status-dot ' . $status_dot . '"><i class="fas fa-circle"></i></div>
                </a>';
    } elseif (isset($_SESSION['role']) && $_SESSION['role'] >= Role::OWNER->value) {
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = :row_id OR outgoing_msg_id = :row_id) 
            AND (outgoing_msg_id = :outgoing_id OR incoming_msg_id = :outgoing_id) 
            ORDER BY msg_id DESC LIMIT 1";
        $stmt2 = $pdo->prepare($sql2); // Préparer la requête SQL
        $stmt2->bindParam(':row_id', $row['id_pro'], PDO::PARAM_INT); // Lier l'ID de l'utilisateur de la ligne en cours à la requête
        $stmt2->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_INT); // Lier l'ID de l'utilisateur actuel à la requête
        $stmt2->execute(); // Exécuter la requête SQL

        $row2 = $stmt2->fetch(PDO::FETCH_ASSOC); // Récupérer la première ligne de résultat sous forme de tableau associatif

        $result = (isset($row2['msg'])) ? $row2['msg'] : "No message available"; // Récupérer le dernier message ou afficher un message par défaut s'il n'y a pas de message
        $msg = (strlen($result) > 28) ? substr($result, 0, 28) . '...' : $result; // Limiter la longueur du message à 28 caractères et ajouter des points de suspension si le message est plus long
        $you = ""; // Initialiser une variable pour indiquer si le message a été envoyé par l'utilisateur actuel

        if (isset($row2['outgoing_msg_id'])) { // Vérifier si l'utilisateur de la ligne en cours a envoyé le dernier message
            $you = ($outgoing_id == $row2['outgoing_msg_id']) ? "You: " : ""; // Si l'utilisateur actuel est l'expéditeur du dernier message, ajouter "You: " à la chaîne $you
        }

        $offline = ($row['status'] == "Offline now") ? "offline" : ""; // Vérifier si l'utilisateur est hors ligne
        $hid_me = ($outgoing_id == $row['id_pro']) ? "hide" : ""; // Cacher le nom de l'utilisateur actuel s'il est l'utilisateur en cours de traitement
        
        // Déterminer le statut de l'utilisateur (en ligne ou hors ligne)
        $status_dot = ($offline === "offline") ? "offline" : "online";

        // Construire le HTML pour afficher les informations de l'utilisateur (nom, dernier message, statut en ligne/hors ligne)
        $output .= '<a href="view/messagerie/chat.php?id_pro=' . $row['id_user'] . '">
                    <div class="content">
                    <div class="details">
                        <span>' . $row['first_name'] . " " . $row['last_name'] . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>
                    <div class="status-dot ' . $status_dot . '"><i class="fas fa-circle"></i></div>
                </a>';
    } else {
        echo "Il y a une erreur";
    }
}
?>
