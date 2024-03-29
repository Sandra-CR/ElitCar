<?php 
include_once "../../model/pdo.php"; // Inclure le fichier contenant la connexion à la base de données PDO
include_once "../../controller/admin/role.php"; // Inclure le fichier de gestion des rôles administrateurs
?>
<?php include_once "../include/base.php"; // Inclure le fichier de base pour les pages?> 

<main class="main-messagerie fondblanc">
    <div class="wrapper ">
        <section class="chat-area">
            <header>
                <?php 
                    if (isset($_SESSION['role']) && $_SESSION['role'] <= Role::CUSTOMER->value) {
                        $id_user = $_GET['id_user']; // Récupérer l'identifiant de l'utilisateur à partir de la requête GET
                
                        // Préparer et exécuter une requête pour obtenir les détails de l'utilisateur professionnel à partir de son identifiant
                        $stmt = $pdo->prepare("SELECT * FROM professional WHERE id_pro = :id_user");
                        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT); // Lier la variable à la requête
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupérer la première ligne de résultat sous forme de tableau associatif
                        
                        if($row) { // Vérifier si des données ont été retournées par la requête
                        ?>
                        <a href="view/home.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                        <div class="details">
                            <span><?php echo $row['name']; ?></span> <!-- Afficher le nom de l'utilisateur professionnel -->
                            <!-- Vous pouvez afficher d'autres détails pertinents ici -->
                        </div>
                        <?php
                        } else {
                            header("location: ../../view/messagerie/users.php"); // Rediriger vers la page d'affichage des utilisateurs de la messagerie
                            exit; // Arrêter l'exécution du script après la redirection
                        }
                      } elseif (isset($_SESSION['role']) && $_SESSION['role'] >= Role::OWNER->value) {
                        $id_user = $_GET['id_pro']; // Récupérer l'identifiant de l'utilisateur à partir de la requête GET
                
                        // Préparer et exécuter une requête pour obtenir les détails de l'utilisateur professionnel à partir de son identifiant
                        $stmt = $pdo->prepare("SELECT * FROM particular WHERE id_user = :id_pro");
                        $stmt->bindParam(':id_pro', $id_user, PDO::PARAM_INT); // Lier la variable à la requête
                        $stmt->execute();
                        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupérer la première ligne de résultat sous forme de tableau associatif
                        
                        if($row) { // Vérifier si des données ont été retournées par la requête
                        ?>
                        <a href="view/home.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                        <div class="details">
                            <span><?php echo $row['first_name']. " " . $row['last_name']; ?></span> <!-- Afficher le nom de l'utilisateur professionnel -->
                            <!-- Vous pouvez afficher d'autres détails pertinents ici -->
                        </div>
                        <?php
                        } else {
                            header("location: ../../view/messagerie/users.php"); // Rediriger vers la page d'affichage des utilisateurs de la messagerie
                            exit; // Arrêter l'exécution du script après la redirection
                            
                        }
   
                      } else {
                        echo"il y a une erreur";
                      }

                ?>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id_user; ?>" hidden> <!-- Champ caché pour stocker l'identifiant de l'utilisateur -->
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off"> <!-- Champ pour saisir le message -->
                <button><i class="fab fa-telegram-plane"></i></button> <!-- Bouton pour envoyer le message -->
            </form>
        </section>
    </div>
</main>
</body>
<script src="js/chat.js"></script> <!-- Inclure le script JavaScript pour la messagerie -->
