
<script src="https://js.stripe.com/v3/"></script>

<?php
include_once "../../controller/admin/role.php";
include_once "../include/base.php";
include_once "../include/professional/dashboard_professional.php";

// Simuler la vérification de l'existence des moyens de paiement
$moyensDePaiementExistants = true; // Changez cette valeur en fonction de la logique de votre application

// Vérifier si l'utilisateur a demandé d'afficher le formulaire d'ajout
$afficherFormulaireAjout = isset($_GET['add-method']) && $_GET['add-method'] == 'true';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php include_once "../include/professional/account_menu_professional.php"; ?>
        </div>
        <div class="container col-md-10 mt-5 mb-5">
            <?php if ($afficherFormulaireAjout): ?>
                <!-- Formulaire d'ajout de moyen de paiement -->
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card text-center" style="padding: 40px;">
                            <div class="card-body">
                                <h5 class="card-title "  style="font-weight:700 !important">Ajouter un moyen de paiement</h5>
                                <form id="payment-form" class="mt-5" action="controller/add_payment_method.php" method="post">
                                    <div class="mb-3" id="card-errors" style="color:red;" role="alert"></div>
                                    <div id="card-element">
                                        <!-- Un div vide où Stripe va insérer l'élément de carte. -->
                                    </div>
                                    <button type="submit" class="btn mt-5" style="background-color:#FFAA00;color:white;padding: 5px 25px 5px 25px;">Enregistrer</button>
                                </form>
                                <button type="button" class="btn" style="background-color:#d3d4d5;padding: 5px 25px 5px 25px;" onclick="history.back();">Retourner</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php if (!$moyensDePaiementExistants): ?>
                    <!-- Message indiquant qu'aucun moyen de paiement n'est enregistré -->
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card text-center" style="padding: 40px!important;">
                                    <div class="card-body d-flex justify-content-center align-items-center" style="display:flex;flex-direction:column;">
                                        <!-- Icône de la carte, vous pouvez utiliser une image ou un icône ici -->
                                        <img src="img/credit-card1.png" alt="Card Icon" class="icon-card mb-3 col-md-2">
                                        <h8 class="card-title mb-3" style="font-weight:700 !important">Vous n'avez enregistré aucun moyen de paiement.</h8>
                                        <p class="card-text mb-4">L'ajout d'un moyen de paiement est indispensable pour souscrire à un abonnement et ainsi mettre vos voitures à la location sur notre plateforme.</p>
                                        <a href="view/professional/payment_method_professional.php?add-method=true" id="findVehicleBtn" class="btn" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;max-width:99%;padding: 15px;font-size:14px;">Ajouter un moyen de paiement</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php else: ?>
                    <!-- Affichage des moyens de paiement existants -->
                    <div class="container col-md-8 mt-5 mb-5" style="border: 2px solid #D8D8D8 !important; padding: 50px!important;">
                    <p>Vos moyens de paiement.</p>
                    <a href="view/professional/payment_method_professional.php?add-method=true" class="btn" style="background-color:#FFAA00;color:white;font-weight:700;font-size:16px;max-width:99%;padding: 15px;font-size:14px;">Ajouter un nouveau moyen de paiement</a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
  let stripe = Stripe('pk_test_51Oqj2dAR8KMrJQF3peadp8hsf1JmdO0LQFFRSxz1Tx1HtaG8OAeRqAqnWnBbgbnH29RllWRYyVwXDm6BWTmFXa6z00qxZqZRew');
  let elements = stripe.elements();
  let style = {
    base: {
      fontSize: "16px",
      "::placeholder": {
      color: "#aab7c4"
    }
    },
    invalid: {
      color: "#fa755a",
      iconColor: "#fa755a"
    }
  };

  let card = elements.create('card', {style: style});
  card.mount('#card-element');

  // Ajouter un gestionnaire d'événements pour le formulaire
  let  form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Informer l'utilisateur s'il y a une erreur
        let errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Envoyer le token à votre serveur
        stripeTokenHandler(result.token);
      }
    });
  });

  function stripeTokenHandler(token) {
    // Insérer le token ID dans le formulaire pour qu'il soit soumis au serveur
    let form = document.getElementById('payment-form');
    let hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    form.submit();
  }
</script>
