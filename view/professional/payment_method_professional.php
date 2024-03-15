

<script src="https://js.stripe.com/v3/"></script>

<?php
 include_once "../../controller/admin/role.php";
 include_once "../include/base.php";
 if (isset($_SESSION['role']) && $_SESSION['role'] >= Role::OWNER->value){
 include_once "../include/professional/dashboard_professional.php";
 include_once "../../controller/check_payment_method.php";
 include_once "../include/professional/dashboard_professional.php";

//cartes de test 
////Carte Visa: 4242 4242 4242 4242
////Carte Mastercard: 5555 5555 5555 4444
////Carte Discover: 6011 1111 1111 1117


// Vérifier si l'utilisateur a demandé d'afficher le formulaire d'ajout
$form= isset($_GET['add-method']) && $_GET['add-method'] == 'true';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php include_once "../include/professional/account_menu_professional.php"; ?>
        </div>
        <div class="container col-md-10 mt-5 mb-5">
            <?php if ($form): ?>
                <!-- Formulaire d'ajout de moyen de paiement -->
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center" style="padding: 40px;">
                            <div class="card-body">
                              <form id="payment-form" action="controller/add_payment_method.php" method="post" style="max-width: 500px; margin: auto; border: 1px solid #ccc; border-radius: 5px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,.1);">
                                  <div id="card-errors" role="alert" style="color:red;"></div>

                                  <label for="cardholder-name" style="display: block; margin-top: 20px; margin-bottom: 10px;">Nom du titulaire de la carte</label>
                                  <input id="cardholder-name" type="text" class="form-control mb-3" style="border: 1px solid #ccc; border-radius: 4px; padding: 7px; width: 100%; box-sizing: border-box; margin-bottom: 16px;" onfocus="this.style.boxShadow='none';" onblur="this.style.boxShadow='';">

                                  <label for="card-element" style="display: block; margin-top: 20px;">Détails de la carte</label>
                                  <div id="card-element" class="form-control mb-3" style="border: 1px solid #ccc; border-radius: 4px; padding: 10px; margin-top: 10px;">
                                      <!-- Un div vide où Stripe va insérer l'élément de carte. -->
                                  </div>

                                  <button type="submit" class="btn btn-primary" style="background-color: #FFAA00 !important; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px; font-size: 16px;margin-bottom: 20px;margin-top: 30px;">Enregistrer</button>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php if (!$payment_method): ?>
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
                  <div class="container col-md-4 mt-5 mb-5 d-flex flex-column align-items-center justify-content-center" style="border: 2px solid #D8D8D8; padding: 50px;box-shadow: 0 4px 6px rgba(0,0,0,.1);">
                    <!-- Inclusion des détails de la méthode de paiement -->
                    <div class="text text-danger mb-3"> <?php include_once "../../controller/payment_method_status.php"; ?></div>
            
                    <?php include_once "../../controller/get_payment_method.php"; ?>
                    <p class="text-center mt-4" style="font-size: 14px; color: #6c757d;">
                        Votre méthode de paiement sécurisée assure une transaction fluide et sans tracas. 
                        Gardez vos informations à jour pour éviter toute interruption de service.
                    </p>
                    <a href="view/professional/payment_method_professional.php?add-method=true" class="btn" style="color:green;font-weight:700;font-size:16px;max-width:99%;padding: 0px;font-size:14px; margin-top:20px">Modifier votre moyen de paiement</a>
                    <p class="text-center mt-3" style="font-size: 14px; color: #6c757d;">
                        Des questions ? Notre <a href="#" style="color: #007bff;">équipe de support</a> est là pour aider.
                    </p>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

</body>
<?php }?>

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
  let form = document.getElementById('payment-form');
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    // Vérification du nom du titulaire de la carte
    let cardholderName = document.getElementById('cardholder-name').value.trim();
    if (!cardholderName) {
      let errorElement = document.getElementById('card-errors');
      errorElement.textContent = "Le nom du titulaire de la carte est obligatoire.";
      return; // Stop la fonction ici si le nom est vide
    }

    stripe.createToken(card, {name: cardholderName}).then(function(result) {
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

