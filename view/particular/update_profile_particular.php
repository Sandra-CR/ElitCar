
<!-- dashboard -->

<?php 
include_once "../../controller/admin/role.php";
include_once "../include/base.php";
if(isset($_SESSION['role']) && $_SESSION['role'] <= Role::CUSTOMER->value) {
include_once "../include/particular/dashboard_particular.php";
include_once "../../model/pdo.php";
if (isset ($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM particular WHERE id_user='$id'"; 
    $stmt = $pdo->query($sql); // Exécution de la requête SQL
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Récupération des résultats de la requête sous forme de tableau associatif
    $d = new DateTime($user['birthdate']);
}

?>


    <div class="container-fluid">
        <div class="row">
            <!-- Menu -->
            <div class="col-md-2">
            <?php include_once "../include/particular/account_menu_particular.php";?>
            </div>
            <!-- Modification du compte --> 
            <div class="container col-md-8 mt-5 mb-5" style="border: 2px solid #D8D8D8 !important; padding: 50px!important;">
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
                    <form id="form-update-particular">
                        
                        <input type="hidden" name="id_user" value="<?= htmlentities($user["id_user"])?>">
                        <div class="mb-3">
                            <label for="nom" class="form-label" style="font-weight:700;">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Votre nom" name="last_name" value="<?= htmlentities($user['last_name']) ?>">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label" style="font-weight:700;">Prénom</label>
                            <input type="text" class="form-control" id="prenom" placeholder="Votre prenom" name="first_name" id="" value="<?= htmlentities($user['first_name']) ?>">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="dateNaissance" class="form-label" style="font-weight:700;">Date de naissance</label>
                                <input type="date" class="form-control" id="dateNaissance" name="birthdate" value="<?=  $d->format('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="tel" class="form-label" style="font-weight:700;">Numéro de téléphone</label>
                                <input type="tel" class="form-control" id="tel" name="num_mobile" placeholder="Votre numéro de téléphone" value="<?= htmlentities($user['num_mobile']) ?>" >
                            </div>
                        </div>
                        <input type="submit" class="btn btn-warning mt-4" value="Sauvegarder les modifications" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;height:50px;max-width:99%">
                    </form>

                </div>
                
            </div>
        </div>
    </div>
</body>
<?php }?>
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