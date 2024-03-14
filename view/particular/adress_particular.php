<!-- dashboard -->
<?php
include_once "../../controller/admin/role.php";
include_once "../include/base.php";
if(isset($_SESSION['role']) && $_SESSION['role'] <= Role::CUSTOMER->value) {
include_once "../include/particular/dashboard_particular.php";
 ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Menu -->
            <div class="col-md-2">
            <?php include_once "../include/particular/account_menu_particular.php";?>
            </div>
            <!-- adresse postale --> 
            <div class="container col-md-8 mt-5 mb-5" style="border: 2px solid #D8D8D8 !important; padding: 50px!important;">
               <!-- Modifier l'adresse postale --> 
               <?php include_once "../message.php" ?>
            <form action="controller/admin/add_ctrl_adress_particular" method="post" class="mb-4">
                <h5 class="mb-4" style="font-weight:700 !important">Modifier mon adresse postale</h5>
                <div class="mb-3">
                    <label for="street_name" class="form-label" style="font-weight:700;">Nom de la rue</label>
                    <input type="text" class="form-control" name="street_name" placeholder="Votre nom de rue">
                </div>
                <div class="mb-3">
                    <label for="neighborhood" class="form-label" style="font-weight:700;">Quartier</label>
                    <input type="text" class="form-control" name="neighborhood" placeholder="Votre quartier" required>
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label" style="font-weight:700;">Ville</label>
                    <input type="text" class="form-control" name="city" placeholder="Votre ville" required>
                </div>
                <div class="mb-3">
                    <label for="region" class="form-label" style="font-weight:700;">Région</label>
                    <input type="text" class="form-control" name="region" placeholder="Votre région" required>
                </div>
                <div class="mb-3">
                    <label for="postal_code" class="form-label" style="font-weight:700;">Code Postal</label>
                    <input type="text" class="form-control" name="postal_code" placeholder="Votre code postal">
                </div>
                <div class="mb-3">
                    <label for="additional_description" class="form-label" style="font-weight:700;">Description supplémentaire</label>
                    <textarea class="form-control" name="additional_description" placeholder="Toute information supplémentaire"></textarea>
                </div>
                <input type="hidden" name="id_user" value="<?= htmlentities($_SESSION["id"])?>">
                <button type="submit" class="btn btn-warning col-md-3" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;height:50px;max-width:99%" name ="Changer mon adresse" >Changer mon adresse</button>
            </form>
             
            </div>
        </div>
    </div>
</body>
<?php }?>