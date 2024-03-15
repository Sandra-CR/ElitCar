<?php 
include_once "../../controller/admin/role.php";
include_once "../include/base.php";
if(isset($_SESSION['role']) && $_SESSION['role'] == Role::ADMIN->value) {
    include_once "../../model/pdo.php";
    if (isset ($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM professional WHERE id_pro='$id'"; 
        $stmt = $pdo->query($sql); // Exécution de la requête SQL
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // Récupération des résultats de la requête sous forme de tableau associatif
        //$d = new DateTime($user['birthdate']);
        
        $sql2 = "SELECT * FROM address_professional WHERE id_pro='$id'"; 
        $stmt2 = $pdo->query($sql2); // Exécution de la requête SQL
        $userAddress = $stmt2->fetch(PDO::FETCH_ASSOC); // Récupération des résultats de la requête sous forme de tableau associatif

        $sql3 = "SELECT * FROM subscription WHERE id_pro = '$id' "; 
        $stmt3 = $pdo->query($sql3); // Exécution de la requête SQL
        $pro = $stmt3->fetch(PDO::FETCH_ASSOC);
    }

?>

    <h1 class="text-center my-4"><?= "$user[name]" ?></h1>

    <h2 class="text-center " id="message"></h2>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="border border-3 text-center">
                    <img src="<?= htmlentities($user['profile_picture']) ?>" class="image-fluid rounded mt-5"  width="50%" alt="">
                </div>
            </div>
            <div class="col-6">
                <ul class="list-group mt-5">
                    <li class="list-group-item text-center">Email : <?= htmlentities($user['mail']) ?></li>
                    <li class="list-group-item text-center">Numéro de teléphone : <?= htmlentities($user['num_mobile']) ?></li>
                    <?php $roles = ["Visiteur","Client","Client-enregistré", "Locataire", "Agence", "Administrateur"]; ?>
                    <li class="list-group-item text-center">Role :  <?= $roles[$user['role']]?></li>
                    <?php $yn = ["No", "Yes"]; ?>
                    <li class="list-group-item text-center">Newsletters :  <?= $yn[$user['newsletters']]?></li>
                    <li class="list-group-item text-center">Politique :  <?= $yn[$user['politique']]?></li>
                </ul>
                <ul class="list-group my-2">
                    <?php if (isset($pro['plan_name'])) {?>
                        <li class="list-group-item text-center">Abonnement : <?= htmlentities($pro['plan_name']) ?></li>
                        <li class="list-group-item text-center">Status : <?= htmlentities($pro['status']) ?></li>
                    <?php }else {?>
                        <li class="list-group-item text-center">Aucun Abonnement</li>
                    <?php }?>
                </ul>
                <div class="rounded border-read-address col-6 my-2 overflow-auto h-25">
                    <h2 class="text-center mt-3"> Adresse : </h2>
                    <ul class="list-unstyled text-center">
                        <?php if (isset($userAddress['street_name'])) {?>
                            <li class="list-group-item text-center">Nom de Rue :  <?= htmlentities($userAddress['street_name']) ?></li>
                            <li class="list-group-item text-center">Quartier :  <?= htmlentities($userAddress['neighborhood']) ?></li> 
                            <li class="list-group-item text-center">Ville :  <?= htmlentities($userAddress['city']) ?></li>
                            <li class="list-group-item text-center">Région :  <?= htmlentities($userAddress['region']) ?></li>
                            <li class="list-group-item text-center">Code postal :  <?= htmlentities($userAddress['postal_code']) ?></li>
                            <li class="list-group-item text-center">Description Additional :  <?= htmlentities($userAddress['additional_description']) ?></li>
                        <?php }else {?>
                            <li class="list-group-item text-center">Aucune Adresse Connue</li>
                        <?php }?>
                    </ul>
                </div>
                <div class="container-btn-read">
                    <a class="btn btn-success my-2" href="view/admin/agency_table">Revenir au Tableau</a>
                    <a class="btn btn-warning" href="view/admin/update_admin_agenncy?id=<?= $id ?>"">Modifier La fiche de l'utilisateur</a>
                </div>
            </div> 
        </div>
    </div>

<?php }else{ 
    sendMessage("Page non autorisé", "failed", "../home.php", null);
} ?>
