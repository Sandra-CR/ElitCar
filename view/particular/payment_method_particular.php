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
            <!-- Moyens de paiment --> 
            <div class="container col-md-8 mt-5 mb-5" >
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card text-center" style="padding: 40px!important;">
                            <div class="card-body d-flex justify-content-center align-items-center" style="display:flex;flex-direction:column;">
                                <!-- Icône de la carte, vous pouvez utiliser une image ou un icône ici -->
                                <img src="img/credit-card1.png" alt="Card Icon" class="icon-card mb-3 col-md-2">
                                <h8 class="card-title mb-3" style="font-weight:700 !important">Vous n'avez enregistré aucun moyen de paiement.</h8>
                                <p class="card-text mb-4">L'ajout d'un nouveau moyen de paiement est uniquement disponible au moment de la réservation.</p>
                                <a href="#" class="btn" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;height:100%;max-width:99%;padding: 15px;font-size:14px;">Trouver un véhicule</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php }?>