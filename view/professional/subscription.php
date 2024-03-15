
<?php
include_once "../../controller/admin/role.php";
include_once "../include/base.php";
include_once "../../controller/check_subscription.php";
include_once "../../controller/check_payment_method.php";
include_once "../include/professional/dashboard_professional.php";
include_once "../../model/pdo.php"; 
require '../../vendor/autoload.php';

//recuperer les abonnements 
\Stripe\Stripe::setApiKey('sk_test_51Oqj2dAR8KMrJQF3YheNPGZRQ4sj8ndDMHGT9ocOgmpOcdGBp0y6sAdPnkw1vXEe6rQw7iI6DYceEus8627TShsb00Wcth9X4L');
$prices = \Stripe\Price::all(['active' => true, 'limit' => 3, 'expand' => ['data.product']]);
// Vérifier si l'utilisateur a demandé d'afficher les abonnements dispo
$sub= isset($_GET['add-subscription']) && $_GET['add-subscription'] == 'true';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php include_once "../include/professional/account_menu_professional.php"; ?>
        </div>
        <div class="container col-md-10 mt-5 mb-5">
            <?php if (!$payment_method): ?>
                    <!-- Message indiquant qu'aucun moyen de paiement n'est enregistré -->
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card text-center" style="padding: 40px!important;">
                                <div class="card-body d-flex justify-content-center align-items-center" style="display:flex;flex-direction:column;">
                                    <!-- Icône de la carte, vous pouvez utiliser une image ou un icône ici -->
                                    <img src="img/credit-card1.png" alt="Card Icon" class="icon-card mb-3 col-md-2">
                                    <h8 class="card-title mb-3" style="font-weight:700 !important">Ajout d'un moyen de paiement nécessaire.</h8>
                                    <p class="card-text mb-4">Pour souscrire à un abonnement et commencer à mettre vos voitures en location sur notre plateforme, l'enregistrement d'un moyen de paiement est indispensable.</p>
                                    <a href="view/professional/payment_method_professional.php?add-method=true" id="findVehicleBtn" class="btn" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;max-width:99%;padding: 15px;font-size:14px;">Ajouter un moyen de paiement</a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php else:?> 
                <?php if ($sub): ?>
                    <!-- Les abonnements -->
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <h3 style="color:black; font-weight: 600; margin-bottom:20px;">Choisissez le meilleur plan<span style="color:grey">, avec ou sans engagement</span></h3>
                        <div class="d-flex flex-column flex-md-row flex-wrap align-items-center justify-content-center">  
                            <?php foreach ($prices->data as $price): ?>
                                <form class="mt-5 mb-3" action="controller/choose_subscription.php" method="post" style="margin-right: 20px;">
                                    <div class="card text-center" style="padding: 40px; max-width:300px; box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;">
                                        <input type="hidden" name="price_id" value="<?php echo htmlspecialchars($price->id); ?>">
                                        <h4 style="color:#FFAA00; font-weight: 600; margin-bottom:30px"><?php echo htmlspecialchars($price->product->name); ?></h4>
                                        <p style=" margin-top:15px; font-size:16px;"><?php echo htmlspecialchars($price->product->description); ?></p>
                                        <p style="font-size: 22px; margin-top:15px"><span><?php echo htmlspecialchars(($price->unit_amount / 100)); ?></span> <span style="font-size: 22px;">XAF <span style="font-size: 14px;">/ <?php echo $price->recurring->interval; ?></span></span></p>
                                        <button type="submit" class="btn mt-2 mb-5" 
                                            style="background-color:black;color:white;padding: 5px 25px 5px 25px;"
                                            onmouseover="this.style.backgroundColor='grey';" 
                                            onmouseout="this.style.backgroundColor='black'; this.style.color='white';">
                                            Sélectionner
                                        </button>
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <?php if (!$hasActiveSubscription ): ?>
                        <!-- Message indiquant qu'aucun abonnement n'est active -->
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="card text-center" style="padding: 40px!important;">
                                        <div class="card-body d-flex justify-content-center align-items-center" style="display:flex;flex-direction:column;">
                                            <i  class="fas fa-sync-alt fa-2x icon-subscription" style="margin-bottom:20px;"></i>                                        <h8 class="card-title mb-3" style="font-weight:700 !important">Aucun abonnement actif.</h8>
                                            <p class="card-text mb-4">Un abonnement est obligatoire pour pouvoir mettre vos voitures en location sur notre plateforme. Souscrivez à un abonnement pour commencer.</p>
                                            <a href="view/professional/subscription.php?add-subscription=true" id="findVehicleBtn" class="btn" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;max-width:99%;padding: 15px;font-size:14px;">Souscrire à un abonnement</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php else: ?>
                        <!-- Abonnement active -->
                        <div class="container col-md-8 mt-5 mb-5" style="border: 2px solid #D8D8D8 !important; padding: 50px!important;">
                        <?php include_once "../../controller/get_subscription.php";?> <br>
                        <div class="d-flex flex-row justify-content-center">
                        <a href="" class="btn" style="color:red;font-weight:700;font-size:16px;max-width:99%;padding: 0px;font-size:14px; margin-top:20px">Annuler votre abonnement</a>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

