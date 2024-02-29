
<?php 
include_once "include/base.php";
?>

<div class="container home-container my-5 home-my-5">
  <h2 class="text-FAQ home-text-FAQ mb-4 home-mb-4">Foire aux questions</h2>
  <div class="row home-row">
    <!-- Première colonne d'accordéons -->
    <div class="col-md-6 home-col-md-6">
      <!-- Premier élément d'accordéon -->
      <div class="accordion home-accordion" id="home-accordionExample1">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne1">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne1" aria-expanded="true" aria-controls="home-collapseOne1">
            1. Qu'est-ce qu'ElitCar ? 
            </button>
          </h2>
          <div id="home-collapseOne1" class="accordion-collapse collapse" aria-labelledby="home-headingOne1" data-bs-parent="#home-accordionExample1">
            <div class="accordion-body home-accordion-body">
            - ElitCar est une plateforme de location de voitures en ligne qui permet aux utilisateurs de louer des véhicules rapidement et en toute sécurité. 
            </div>
          </div>
        </div>
      </div>
      <div class="accordion home-accordion" id="home-accordionExample2">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo2">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo2" aria-expanded="false" aria-controls="home-collapseTwo2">
            3. Quels types de voitures propose ElitCar ? 
            </button>
          </h2>
          <div id="home-collapseTwo2" class="accordion-collapse collapse" aria-labelledby="home-headingTwo2" data-bs-parent="#home-accordionExample2">
            <div class="accordion-body home-accordion-body">
            - ElitCar propose une large gamme de véhicules, allant des économiques aux luxueux, pour répondre à tous les besoins de location.
            </div>
          </div>
        </div>
      </div>
      <!-- Deuxième élément d'accordéon -->
      
      <div class="accordion home-accordion" id="home-accordionExample4">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo4">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo4" aria-expanded="false" aria-controls="home-collapseTwo4">
            5. Y a-t-il une assurance incluse dans la location ?  
            </button>
          </h2>
          <div id="home-collapseTwo4" class="accordion-collapse collapse" aria-labelledby="home-headingTwo4" data-bs-parent="#home-accordionExample4">
            <div class="accordion-body home-accordion-body">
            - Oui, chaque location est assortie d'une assurance de base, avec des options d'assurance supplémentaires disponibles.             </div>
          </div>
        </div>
      </div>
      <div class="accordion home-accordion" id="home-accordionExample2">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo2">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo2" aria-expanded="false" aria-controls="home-collapseTwo2">
            7. Quels sont les documents nécessaires pour louer une voiture avec ElitCar ?             </button>
          </h2>
          <div id="home-collapseTwo2" class="accordion-collapse collapse" aria-labelledby="home-headingTwo2" data-bs-parent="#home-accordionExample2">
            <div class="accordion-body home-accordion-body">
            - Vous aurez besoin d'un permis de conduire valide et d'une carte de crédit pour effectuer la réservation.            </div>
          </div>
        </div>
      </div>
      <div class="accordion home-accordion" id="home-accordionExample2">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo2">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo2" aria-expanded="false" aria-controls="home-collapseTwo2">
            9. Que se passe-t-il en cas de panne ou d'incident pendant la location ?            </button>
          </h2>
          <div id="home-collapseTwo2" class="accordion-collapse collapse" aria-labelledby="home-headingTwo2" data-bs-parent="#home-accordionExample2">
            <div class="accordion-body home-accordion-body">
            - Nous avons un service d'assistance routière disponible 24h/24 pour vous aider en cas de problème.
            </div>
          </div>
        </div>
      </div>
      <div class="accordion home-accordion" id="home-accordionExample2">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo2">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo2" aria-expanded="false" aria-controls="home-collapseTwo2">
            11. Quels sont les frais supplémentaires associés à la location ? 
            </button>
          </h2>
          <div id="home-collapseTwo2" class="accordion-collapse collapse" aria-labelledby="home-headingTwo2" data-bs-parent="#home-accordionExample2">
            <div class="accordion-body home-accordion-body">
            - Les frais supplémentaires peuvent inclure des options d'assurance supplémentaires, des frais de carburant ou des frais de kilométrage excessif. Tous les frais seront clairement indiqués au moment de la réservation.            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Seconde colonne d'accordéons -->
    <div class="col-md-6 home-col-md-6">
      <!-- Premier élément d'accordéon dans la seconde colonne -->
      <div class="accordion home-accordion" id="home-accordionExample3">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne3">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne3" aria-expanded="false" aria-controls="home-collapseOne3">
            2. Comment fonctionne ElitCar ?
            </button>
          </h2>
          <div id="home-collapseOne3" class="accordion-collapse collapse" aria-labelledby="home-headingOne3" data-bs-parent="#home-accordionExample3">
            <div class="accordion-body home-accordion-body">
            - Il vous suffit de télécharger l'application, de vous inscrire, de choisir votre voiture, de sélectionner les dates de location et de finaliser votre réservation en quelques clics. 
            </div>
          </div>
        </div>
      </div>
      <!-- Deuxième élément d'accordéon dans la seconde colonne -->
      <div class="accordion home-accordion" id="home-accordionExample4">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo4">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo4" aria-expanded="false" aria-controls="home-collapseTwo4">
            4. Comment ElitCar assure-t-il la sécurité des transactions ?  
            </button>
          </h2>
          <div id="home-collapseTwo4" class="accordion-collapse collapse" aria-labelledby="home-headingTwo4" data-bs-parent="#home-accordionExample4">
            <div class="accordion-body home-accordion-body">
            - ElitCar utilise des passerelles de paiement sécurisées et cryptées pour garantir la sécurité des transactions financières. 
            </div>
          </div>
        </div>
      </div>
      <div class="accordion home-accordion" id="home-accordionExample4">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo4">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo4" aria-expanded="false" aria-controls="home-collapseTwo4">
            6. Puis-je annuler ma réservation avec ElitCar ? 
            </button>
          </h2>
          <div id="home-collapseTwo4" class="accordion-collapse collapse" aria-labelledby="home-headingTwo4" data-bs-parent="#home-accordionExample4">
            <div class="accordion-body home-accordion-body">
            - Oui, vous pouvez annuler votre réservation sous certaines conditions. Consultez notre politique d'annulation pour plus de détails.            </div>
          </div>
        </div>
      </div>
      <div class="accordion home-accordion" id="home-accordionExample4">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo4">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo4" aria-expanded="false" aria-controls="home-collapseTwo4">
            8. Est-il possible de prolonger la durée de location ?  
            </button>
          </h2>
          <div id="home-collapseTwo4" class="accordion-collapse collapse" aria-labelledby="home-headingTwo4" data-bs-parent="#home-accordionExample4">
            <div class="accordion-body home-accordion-body">
            - Oui, vous pouvez prolonger votre location en nous contactant directement via l'application            </div>
          </div>
        </div>
      </div>
      <div class="accordion home-accordion" id="home-accordionExample4">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo4">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo4" aria-expanded="false" aria-controls="home-collapseTwo4">
            10. Est-ce que ElitCar propose des promotions ou des offres spéciales ? 
            </button>
          </h2>
          <div id="home-collapseTwo4" class="accordion-collapse collapse" aria-labelledby="home-headingTwo4" data-bs-parent="#home-accordionExample4">
            <div class="accordion-body home-accordion-body">
            - Oui, nous proposons régulièrement des promotions et des offres spéciales à nos clients. Assurez-vous de consulter notre application pour les dernières offres.             </div>
          </div>
        </div>
      </div>
      <div class="accordion home-accordion" id="home-accordionExample4">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo4">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo4" aria-expanded="false" aria-controls="home-collapseTwo4">
            12. Est-il possible de louer une voiture pour un aller simple avec ElitCar ?            </button>
          </h2>
          <div id="home-collapseTwo4" class="accordion-collapse collapse" aria-labelledby="home-headingTwo4" data-bs-parent="#home-accordionExample4">
            <div class="accordion-body home-accordion-body">
            - Oui, nous proposons des options de location en aller simple. Veuillez nous contacter pour plus de détails.            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include_once "footer.php";
 ?>