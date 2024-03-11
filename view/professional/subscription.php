
<?php
include_once "../../controller/admin/role.php";
include_once "../include/base.php";
include_once "../include/professional/dashboard_professional.php";

// Simuler la vérification de l'existence de l'abbonement
$subscription = false; 

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php include_once "../include/professional/account_menu_professional.php"; ?>
        </div>
        <div class="container col-md-10 mt-5 mb-5">
                <?php if (!$subscription): ?>
                    <!-- Message indiquant qu'aucun moyen de paiement n'est enregistré -->
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card text-center" style="padding: 40px!important;">
                                    <div class="card-body d-flex justify-content-center align-items-center" style="display:flex;flex-direction:column;">
                                        <!-- Icône de la carte, vous pouvez utiliser une image ou un icône ici -->
                                        <img src="img/credit-card1.png" alt="Card Icon" class="icon-card mb-3 col-md-2">
                                        <h8 class="card-title mb-3" style="font-weight:700 !important">Aucun abonnement actif.</h8>
                                        <p class="card-text mb-4">Un abonnement est obligatoire pour pouvoir mettre vos voitures en location sur notre plateforme. Souscrivez à un abonnement pour commencer.</p>
                                        <a href="" id="findVehicleBtn" class="btn" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;max-width:99%;padding: 15px;font-size:14px;">Souscrire à un abonnement</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php else: ?>
                    <!-- Affichage des moyens de paiement existants -->
                    <div class="container col-md-8 mt-5 mb-5" style="border: 2px solid #D8D8D8 !important; padding: 50px!important;">
                    <h5 class="mb-4" style="font-weight:700 !important">Détails de votre abonnement.</h5>
                    <a href="" class="btn" style="color:green;font-weight:700;font-size:16px;max-width:99%;padding: 0px;font-size:14px;">Passer à un autre abonnement</a>
                    <a href="" class="btn" style="color:red;font-weight:700;font-size:16px;max-width:99%;padding: 15px;font-size:14px;">Annuler votre abonnement</a>
                    </div>
                <?php endif; ?>
        </div>
    </div>
</div>

