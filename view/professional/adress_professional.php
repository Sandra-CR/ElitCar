<!-- dashboard -->
<?php 
include_once "../../controller/admin/role.php";
include_once "../include/base.php"; 
if (isset($_SESSION['role']) && $_SESSION['role'] >= Role::OWNER->value){
include_once "../include/professional/dashboard_professional.php";
?>

    <div class="container-fluid">
        <div class="row">
            <!-- Menu -->
            <div class="col-md-2">
            <?php include_once "../include/professional/account_menu_professional.php";?>
            </div>
            <!-- adresse postale --> 
            <div class="container col-md-8 mt-5 mb-5" style="border: 2px solid #D8D8D8 !important; padding: 50px!important;">
               <!-- Modifier l'adresse postale --> 
               <?php include_once "../message.php" ?>
            <form class="mb-4" action="controller/admin/traitement_contact.php" method="post">
                <h5 class="mb-4" style="font-weight:700 !important">Modifier mon adresse postale</h5>
                <div class="mb-3">
                    <label for="street-name" class="form-label" style="font-weight:700;">Nom de la rue</label>
                    <input type="text" class="form-control" id="street-name" name="votrerue" placeholder="Votre nom de rue">
                </div>
                <div class="mb-3">
                    <label for="neighborhood" class="form-label" style="font-weight:700;">Quartier</label>
                    <input type="text" class="form-control" id="neighborhood" name="quartier" placeholder="Votre quartier">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label" style="font-weight:700;">Ville</label>
                    <input type="text" class="form-control" id="city" name="ville" placeholder="Votre ville">
                </div>
                <div class="mb-3">
                    <label for="region" class="form-label" style="font-weight:700;">Région</label>
                    <input type="text" class="form-control" id="region" name="region" placeholder="Votre région">
                </div>
                <div class="mb-3">
                    <label for="postal-code" class="form-label" style="font-weight:700;">Code Postal</label>
                    <input type="text" class="form-control" id="postal-code" name="codepostale" placeholder="Votre code postal">
                </div>
                <div class="mb-3">
                    <label for="additional-description" class="form-label" style="font-weight:700;">Description supplémentaire</label>
                    <textarea class="form-control" id="additional-description" name="descrisup" placeholder="Toute information supplémentaire"></textarea>
                </div>
                <input class="envoyer_contact" type="submit" value="Envoyer"  id="envoyermessage">
            </form>
             
            </div>
        </div>
    </div>
</body>
<?php }?>