<?php 
include_once "../../controller/admin/role.php";
include_once "../include/base.php";
if(isset($_SESSION['role']) && $_SESSION['role'] == Role::ADMIN->value) {
    include_once "../../model/pdo.php";
    if (isset ($_GET['id'])) {
        $token = $_SESSION['token'];
        $id = $_GET['id'];
        $sql = "SELECT * FROM particular WHERE id_user='$id'"; 
        $stmt = $pdo->query($sql); // Exécution de la requête SQL
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Récupération des résultats de la requête sous forme de tableau associatif
        //$d = new DateTime($user['birthdate']);
    }

?>
    <div class="container-fluid">
            <div class="row">
                <!-- Modification du compte --> 
                <div class="container col-md-8 mt-5 mb-2" style="border: 2px solid #D8D8D8 !important; padding: 50px!important;">
                    <!-- la photo -->
                    <div class="col-md-2">
                        <div class="mb-3 mt-3 d-flex flex-column align-items-center text-center">
                            <h5 class="mb-4" style="font-weight:700 !important">Photo de profil</h5>
                            <div class="border rounded d-flex justify-content-center align-items-center" style="width: 120px; height: 100px; background-color:#D9D9D9;">
                                <i class="fa fa-user" aria-hidden="true" style="font-size: 50px;"></i>  
                            </div>
                            <a href="#"style="color:black;">Modifier</a>
                        </div>
                    </div>
                    <!-- les informations personnelles -->
                    <div class="col-md-8">
                        <h5 class="mb-4 mt-5" style="font-weight:700 !important">Informations personnelles</h5>

                        <h3 id="message"></h3>
                        <form class="form" id="form-update-particular">
                            
                            <input type="hidden" name="id_user" value="<?= htmlentities($user["id_user"])?>">
                            <div class="mb-3">
                                <label for="last_name" class="form-label" style="font-weight:700;">Nom</label>
                                <input type="text" class="form-control" placeholder="Votre nom" name="last_name" value="<?= htmlentities($user['last_name']) ?>">
                            </div>
                            <div class="mb-3">
                                <label for="first_name" class="form-label" style="font-weight:700;">Prénom</label>
                                <input type="text" class="form-control"  placeholder="Votre prenom" name="first_name" id="" value="<?= htmlentities($user['first_name']) ?>">
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="birthdate" class="form-label" style="font-weight:700;">Date de naissance</label>
                                    <input type="date" class="form-control"  name="birthdate" value="">
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="num_mobile" class="form-label" style="font-weight:700;">Numéro de téléphone</label>
                                    <input type="tel" class="form-control" name="num_mobile" placeholder="Votre numéro de téléphone" value="<?= htmlentities($user['num_mobile']) ?>" >
                                </div>
                            </div>
                            <input type="submit" class="btn btn-warning mt-4" value="Sauvegarder les modifications" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;height:50px;max-width:99%">
                        </form>
                    </div>
                    
                </div>
                <div class="container-btn-read mx-auto col-8">
                    <a class="btn btn-success mt-2" href="view/admin/particular_table">Revenir au Tableau</a>
                    <a class="btn btn-warning my-2" href="view/admin/read_admin_particular?id=<?= $id ?>"">Revenir à la fiche Client</a>
                    <a class="btn btn-danger mb-2 bomb" data-bs-toggle="modal" data-bs-target="#validation_delete" data-link="controller//admin/delete_ctrl_particular.php?id=<?= $id ?>">Supprimée l'utilisateur</a>
                </div>
            </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="validation_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez vous vraiment supprimée cet(te) utilisateur ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <a class="btn btn-danger" id="delete" >SUPPRIMER</a></button>
      </div>
    </div>
  </div>
</div>

<?php }else{ 
    sendMessage("Page non autorisé", "failed", "../home.php", null);
} ?>
<script>
    // Récupération du formulaire et de l'élément d'affichage du message
    const formUpdate = document.getElementById('form-update-particular');
    const msgUpdate = document.getElementById('message');

    // Ajout d'un écouteur d'événement pour soumettre le formulaire
    formUpdate.addEventListener("submit", function(e) {
        e.preventDefault(); // Empêcher le comportement par défaut du formulaire

        const formData = new FormData(e.target); // Récupération des données du formulaire

        const data = {
            method: "POST",
            body: formData,
        };

        // Envoi des données du formulaire via une requête fetch
        fetch("controller/admin/ajax_update_ctrl_particular.php", data)
            .then(response => response.json()) // Conversion de la réponse en format JSON
            .then(data => {
                console.log(data); // Affichage des données reçues dans la console
                msgUpdate.innerHTML = data.message; // Affichage du message de la réponse
            });
    });
</script>