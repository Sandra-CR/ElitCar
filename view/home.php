
<?php 
include_once "base.php";
?>

<?php if ( isset($_SESSION['name'])) {?>
          <p>Bonjour <?=  $_SESSION['name']?></p>
<?php }?>

<!-- Section de filtre -->
<div class="container home-container mt-5 home-mt-5">
        <div class="row home-row">
            <div class="col-md-6 home-col-md-6">
                <div class="search-area home-search-area p-4 home-p-4">
                <h2 class="search-title home-search-title">Louez votre voiture en <br>afrique.<br><span class="sub-search-title home-sub-search-title">Où allez-vous ?</span></h2>
                    <form class="form home-form">
                        <div class="form-group home-form-group">
                            <div class="input-group home-input-group">
                              <div class="input-group-prepend home-input-group-prepend">
                                <span class="input-group-text home-input-group-text"><i class="fas fa-car  fa-2x"></i></span>
                              </div>
                              <input type="text" class="form-control home-form-control" placeholder="Ville">
                            </div>
                        </div>
                        <div class="form-group home-form-group d-flex home-d-flex">
                          <div class="input-group home-input-group custom-margin home-custom-margin">
                            <div class="input-group-prepend home-input-group-prepend">
                              <span class="input-group-text home-input-group-text"><i class="fas fa-calendar-alt  fa-2x"></i></span>
                            </div>
                            <input type="text" class="form-control home-form-control" placeholder="Début">
                          </div>
                          <div class="input-group home-input-group">
                            <div class="input-group-prepend home-input-group-prepend">
                              <span class="input-group-text home-input-group-text"><i class="fas fa-calendar-alt  fa-2x"></i></span>
                            </div>
                            <input type="text" class="form-control home-form-control" placeholder="Fin">
                          </div>
                        </div>
                        <button type="submit" style="background-color:#FFAA00 !important; color:#ffffff" class="btn btn-warning home-btn-warning w-100">Recherche</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 home-col-md-6 img-col home-img-col">
              <img src="img/phone.png" class="image-fluid home-image-fluid" alt="">
            </div>
      </div>
</div>


<!-- Section offres-->
<div class="grey-decoration home-grey-decoration"></div>
<div class="grey-background home-grey-background">
  <div class="container home-containerfiltre my-4 home-my-4">
    <!-- Section principale -->
    <div class="column home-column ">
      <div class="col-md-12 home-col-md-12">
        <h2>Découvrez la toute nouvelle <br>approche pour la location de voitures.</h2>
        <p>Sélectionnez parmi une variété de véhicules proposés par des <br>professionnels à proximité de votre emplacement.</p>
      </div>
    </div>
     <!-- Colonne pour l'image -->
     <div class="col-lg-7 home-col-lg-7 intro-img home-intro-img">
        <img src="img/intro.png" class="img-fluid home-img-fluid" alt="" style="transform: translateY(-50%);">
     </div>
    <!-- Cartes -->
    <div class="cards home-cards row home-row justify-content-center home-justify-content-center">
      <div class="col-md-6 home-col-md-6">
        <div class="card home-card" style="height: 100%!important;">
          <div class="card-body home-card-body">
            <div class="icon-bg home-icon-bg mb-3 home-mb-3">
            <i class="fas fa-percent icon home-icon"></i>
            </div>
            <h5 class="card-title home-card-title"> Les offres les plus avantageuses <br> sur les voitures.</h5>
            <p class="card-text home-card-text" style ="display: flex; align-items: flex-start;">Explorez les propositions de <br> locations des diverses agences <br> dans plusieurs endroits.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 home-col-md-6">
        <div class="card home-card" style="height: 100%!important;">
          <div class="card-body home-card-body">
            <div class="icon-bg home-icon-bg mb-3 home-mb-3">
              <i class="fas fa-calendar-check icon home-icon"></i>
            </div>
            <h5 class="card-title home-card-title">Flexibilité tarifaire et possibilité <br> de réservation adaptable.</h5>
            <p class="card-text home-card-text" style ="display: flex; align-items: flex-start;">Évitez les surprises avec un prix <br> clair dès le départ et une annulation <br>gratuite et nettoyage amélioré.</p>
          </div>
        </div>
      </div>
   </div>
  </div>
</div>


<!-- Section vehicules -->
<div class="container home-container mt-5 home-mt-5">
    <h2 class="mb-4 home-mb-4">Trouvez des véhicules qui répondent <br> à vos exigences</h2>
    <div class="row home-row row-cols-1 home-row-cols-1 row-cols-md-4 home-row-cols-md-4 g-4 home-g-4">
          <div class="col home-col">
                <div class="card home-card">
                    <img src="img/citadine.png" class="card-img-top home-card-img-top" alt="Citadine">
                    <div class="card-body-2 home-card-body-2">
                        <h5 class="card-title home-card-title">Citadine</h5>
                    </div>
                </div>
          </div>
          <div class="col home-col">
                <div class="card home-card">
                    <img src="img/monospace.png" class="card-img-top home-card-img-top" alt="Monospace">
                    <div class="card-body-2 home-card-body-2">
                        <h5 class="card-title home-card-title">Monospace</h5>
                    </div>
                </div>
          </div>
          <div class="col home-col">
                <div class="card home-card">
                    <img src="img/utilitaire.png" class="card-img-top home-card-img-top" alt="Utilitaire">
                    <div class="card-body-2 home-card-body-2">
                        <h5 class="card-title home-card-title">Utilitaire</h5>
                    </div>
                </div>
          </div>
          <div class="col home-col">
                <div class="card home-card">
                    <img src="img/suv.png" class="card-img-top home-card-img-top" alt="SUV">
                    <div class="card-body-2 home-card-body-2">
                        <h5 class="card-title home-card-title">SUV</h5>
                    </div>
                </div>
          </div>
    </div>        
</div>


<!-- Section villes -->
<div class="container home-container my-5 home-my-5">
  <h2 class="text-city home-text-city mb-4 home-mb-4">Disponible dans 6 villes au Cameroun</h2>
  <div class="row home-row">
    <!-- Première ligne d'accordéons -->
    <div class="col-lg-4 home-col-lg-4">
      <div class="accordion home-accordion" id="home-accordionExample1">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne1">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne1" aria-expanded="true" aria-controls="home-collapseOne1">
              Location de voitures à Douala
            </button>
          </h2>
          <div id="home-collapseOne1" class="accordion-collapse collapse home-accordion-collapse" aria-labelledby="home-headingOne1" data-bs-parent="#home-accordionExample1">
            <div class="accordion-body home-accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Deuxième accordéon -->
    <div class="col-lg-4 home-col-lg-4">
      <div class="accordion home-accordion" id="home-accordionExample2">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne2">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne2" aria-expanded="false" aria-controls="home-collapseOne2">
              Location de voitures à Yaoundé
            </button>
          </h2>
          <div id="home-collapseOne2" class="accordion-collapse collapse home-accordion-collapse" aria-labelledby="home-headingOne2" data-bs-parent="#home-accordionExample2">
            <div class="accordion-body home-accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Troisième accordéon -->
    <div class="col-lg-4 home-col-lg-4">
      <div class="accordion home-accordion" id="home-accordionExample3">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne3">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne3" aria-expanded="false" aria-controls="home-collapseOne3">
              Location de voitures à Garoua
            </button>
          </h2>
          <div id="home-collapseOne3" class="accordion-collapse collapse home-accordion-collapse" aria-labelledby="home-headingOne3" data-bs-parent="#home-accordionExample3">
            <div class="accordion-body home-accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Section conseils -->
<div class="container home-container my-5 home-my-5">
    <h2 class="section-title home-section-title">Conseils pour la location</h2>
    <p class="cont home-cont">Optez pour la location de voiture en toute assurance et vivez une aventure mémorable lors de votre road trip grâce à nos recommandations.</p>
    <div class="row home-row row-cols-1 home-row-cols-1 row-cols-md-3 home-row-cols-md-3 g-4 home-g-4">
        <div class="col home-col">
            <div class="card2 home-card2 h-100 home-h-100">
                <img src="img/forest.png" class="card-img-top2 home-card-img-top2" alt="Forêt">
                <div class="card-body2 home-card-body2">
                    <h5 class="section-subtitle home-section-subtitle">Où se loger à Yaoundé ?</h5>
                    <p class="section-content home-section-content">Pour les vacances, le travail, et de nombreuses autres circonstances.</p>
                </div>
            </div>
        </div>
        <div class="col home-col">
            <div class="card2 home-card2 h-100 home-h-100">
                <img src="img/desert.png" class="card-img-top2 home-card-img-top2" alt="Désert">
                <div class="card-body2 home-card-body2">
                    <h5 class="section-subtitle home-section-subtitle">Conseils pour un road trip réussi</h5>
                    <p class="section-content home-section-content">Pour la Saint-Valentin et bien d'autres occasions.</p>
                </div>
            </div>
        </div>
        <div class="col home-col">
            <div class="card2 home-card2 h-100 home-h-100">
                <img src="img/person.png" class="card-img-top2 home-card-img-top2" alt="Personne">
                <div class="card-body2 home-card-body2">
                    <h5 class="section-subtitle home-section-subtitle">Conseils pour un road trip réussi</h5>
                    <p class="section-content home-section-content">Pour la Saint-Valentin et bien d'autres occasions.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section FAQ -->
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
            Lorem ipsum dolor sit amet?
            </button>
          </h2>
          <div id="home-collapseOne1" class="accordion-collapse collapse" aria-labelledby="home-headingOne1" data-bs-parent="#home-accordionExample1">
            <div class="accordion-body home-accordion-body">
              Réponse.
            </div>
          </div>
        </div>
      </div>
      <!-- Deuxième élément d'accordéon -->
      <div class="accordion home-accordion" id="home-accordionExample3">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingOne3">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseOne3" aria-expanded="false" aria-controls="home-collapseOne3">
            Sed do eiusmod tempor incididunt ut labore?
            </button>
          </h2>
          <div id="home-collapseOne3" class="accordion-collapse collapse" aria-labelledby="home-headingOne3" data-bs-parent="#home-accordionExample3">
            <div class="accordion-body home-accordion-body">
              Réponse.
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Seconde colonne d'accordéons -->
    <div class="col-md-6 home-col-md-6">
      <!-- Premier élément d'accordéon dans la seconde colonne -->
      <div class="accordion home-accordion" id="home-accordionExample2">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo2">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo2" aria-expanded="false" aria-controls="home-collapseTwo2">
              Consectetur adipiscing elit?
            </button>
          </h2>
          <div id="home-collapseTwo2" class="accordion-collapse collapse" aria-labelledby="home-headingTwo2" data-bs-parent="#home-accordionExample2">
            <div class="accordion-body home-accordion-body">
              Réponse.
            </div>
          </div>
        </div>
      </div>
      <!-- Deuxième élément d'accordéon dans la seconde colonne -->
      <div class="accordion home-accordion" id="home-accordionExample4">
        <div class="accordion-item home-accordion-item">
          <h2 class="accordion-header home-accordion-header" id="home-headingTwo4">
            <button class="accordion-button home-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#home-collapseTwo4" aria-expanded="false" aria-controls="home-collapseTwo4">
              Ut enim ad minim veniam, quis nostrud exercitation?
            </button>
          </h2>
          <div id="home-collapseTwo4" class="accordion-collapse collapse" aria-labelledby="home-headingTwo4" data-bs-parent="#home-accordionExample4">
            <div class="accordion-body home-accordion-body">
              Réponse.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Section solutions -->
<div class="container home-container my-5 home-my-5">
  <div class="row home-row">
    <div class="col-lg-12 home-col-lg-12 mx-auto home-mx-auto">
      <div class="endcard home-endcard text-white mb-3 home-mb-3" style="border-radius: 5px;">
        <div class="row g-0 home-g-0">
          <div class="col-md-8 home-col-md-8">
            <div class="card-body home-card-body">
              <h3 class="card-title home-card-title" style="font-weight: 700; font-size: 36px;">Vous êtes une agence de location de <br> voitures ?</h3>
              <p class="card-text home-card-text" style="display: flex; align-items: flex-start; flex-direction: column;">Avec Africar, votre chiffre d'affaire augmente <br>de manière significative.</p>
              <a href="#" class="btn btn-warning home-btn-warning" style="width: 40%; height: 100%; padding: 15px; background-color:#FFAA00 !important; color:#ffffff;">Voir les solutions</a>
            </div>
          </div>
          <div class="col-md-4 home-col-md-4">
            <img src="img/drive.png" class="img-fluid3 home-img-fluid3" style="border-radius: 5px; height:100%" alt="Driving car">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include_once "footer.php"; ?><?php include_once "footer.php"; ?>