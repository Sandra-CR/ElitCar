<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta tags nécessaires -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS local -->
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Elitcar</title>
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#"> Elit<span class="sub-navbar-brand">car</span> </a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">Se connecter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Agences</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">FAQ ?</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Section de recherche -->
<div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="search-area p-4">
                <h2 class="search-title">Louez votre voiture en <br>afrique.<br><span class="sub-search-title">Où allez-vous ?</span></h2>
                    <form class="form">
                        <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-car  fa-2x"></i></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Ville">
                            </div>
                        </div>
                        <div class="form-group d-flex">
                          <div class="input-group custom-margin">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-alt  fa-2x"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Début">
                          </div>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar-alt  fa-2x"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Fin">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Recherche</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 img-col">
              <img src="../images/phone.png" class="image-fluid" alt="">
            </div>
      </div>
</div>

<!-- Section principale avec titre et paragraphe -->
<div class="grey-decoration"></div>
<div class="grey-background">
  <div class="containerfiltre my-4">
    <!-- Section principale -->
    <div class="row justify-content-between">
      <div class="col-md-12">
        <h2>Découvrez la toute nouvelle <br>approche pour la location de voitures.</h2>
        <p>Sélectionnez parmi une variété de véhicules proposés par des <br>  professionnels à proximité de votre emplacement.</p>
      </div>
    </div>
     <!-- Colonne pour l'image -->
     <div class="col-lg-7 intro-img">
        <img src="../images/intro.png" class="img-fluid" alt=""style="transform: translateY(-50%);">
     </div>
    <!-- Cartes -->
    <div class="cards row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="icon-bg mb-3">
            <i class="fas fa-percent icon"></i>
            </div>
            <h5 class="card-title"> Les offres les plus avantageuses <br> sur les voitures.</h5>
            <p class="card-text">Explorez les propositions de <br> locations des diverses agences <br> dans plusieurs endroits.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="icon-bg mb-3">
              <i class="fas fa-calendar-check icon"></i>
            </div>
            <h5 class="card-title">Flexibilité tarifaire et possibilité <br> de réservation adaptable.</h5>
            <p class="card-text">Évitez les surprises avec un prix <br> clair dès le départ, une annulation <br> gratuite et nettoyage amélioré.</p>
          </div>
        </div>
      </div>
   </div>
  </div>
</div>

<!-- Section vehicules -->
<div class="container mt-5">
    <h2 class="mb-4">Trouvez des véhicules qui répondent <br> à vos exigences</h2>
    <div class="row row-cols-1 row-cols-md-4 g-4">
          <div class="col">
                <div class="card">
                    <img src="../images/citadine.png" class="card-img-top" alt="Citadine">
                    <div class="card-body-2">
                        <h5 class="card-title">Citadine</h5>
                    </div>
                </div>
          </div>
          <div class="col">
                <div class="card">
                    <img src="../images/monospace.png" class="card-img-top" alt="Monospace">
                    <div class="card-body-2">
                        <h5 class="card-title">Monospace</h5>
                    </div>
                </div>
          </div>
          <div class="col">
                <div class="card">
                    <img src="../images/utilitaire.png" class="card-img-top" alt="Utilitaire">
                    <div class="card-body-2">
                        <h5 class="card-title">Utilitaire</h5>
                    </div>
                </div>
          </div>
          <div class="col">
                <div class="card">
                    <img src="../images/suv.png" class="card-img-top" alt="SUV">
                    <div class="card-body-2">
                        <h5 class="card-title">SUV</h5>
                    </div>
                </div>
          </div>
    </div>        
</div>

<!-- Section villes -->
<div class="container my-5">
  <h2 class="text-city mb-4">Disponible dans 6 villes au Cameroun</h2>
  <div class="row">
    <!-- Première ligne d'accordéons -->
    <div class="col-lg-4">
      <div class="accordion" id="accordionExample1">
        <!-- Premier accordéon -->
        <div class="accordion-item">
          <!-- Entête de l'accordéon -->
          <h2 class="accordion-header" id="headingOne1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
              Location de voitures à Douala
            </button>
          </h2>
          <!-- Corps de l'accordéon -->
          <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1" data-bs-parent="#accordionExample1">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="accordion" id="accordionExample2">
        <!-- Deuxième accordéon -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
              Location de voitures à Douala
            </button>
          </h2>
          <div id="collapseOne2" class="accordion-collapse collapse" aria-labelledby="headingOne2" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="accordion" id="accordionExample3">
        <!-- Troisième accordéon -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="false" aria-controls="collapseOne3">
              Location de voitures à Douala
            </button>
          </h2>
          <div id="collapseOne3" class="accordion-collapse collapse" aria-labelledby="headingOne3" data-bs-parent="#accordionExample3">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Répétez la structure ci-dessus pour les autres éléments, en ajustant les IDs et les cibles de données appropriées -->
  </div>
  <div class="row">
    <!-- Première ligne d'accordéons -->
    <div class="col-lg-4">
      <div class="accordion" id="accordionExample1">
        <!-- Premier accordéon -->
        <div class="accordion-item">
          <!-- Entête de l'accordéon -->
          <h2 class="accordion-header" id="headingOne1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
              Location de voitures à Douala
            </button>
          </h2>
          <!-- Corps de l'accordéon -->
          <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1" data-bs-parent="#accordionExample1">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="accordion" id="accordionExample2">
        <!-- Deuxième accordéon -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
              Location de voitures à Douala
            </button>
          </h2>
          <div id="collapseOne2" class="accordion-collapse collapse" aria-labelledby="headingOne2" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="accordion" id="accordionExample3">
        <!-- Troisième accordéon -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3" aria-expanded="false" aria-controls="collapseOne3">
              Location de voitures à Douala
            </button>
          </h2>
          <div id="collapseOne3" class="accordion-collapse collapse" aria-labelledby="headingOne3" data-bs-parent="#accordionExample3">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Section conseils -->
<div class="container my-5">
    <h2 class="section-title">Conseils pour la location</h2>
    <p class="cont">Optez pour la location de voiture en toute assurance et vivez une aventure mémorable lors <br> de votre road trip grâce à nos recommandations.</p>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card2 h-100">
                <img src="../images/forest.png" class="card-img-top2" alt="Forêt">
                <div class="card-body2">
                    <h5 class="section-subtitle">Où se loger à Yaoundé ?</h5>
                    <p class="section-content">Pour les vacances, le travail, et de nombreuses <br> autres circonstances.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card2 h-100">
                <img src="../images/desert.png" class="card-img-top2" alt="Désert">
                <div class="card-body2">
                    <h5 class="section-subtitle">Conseils pour un road trip réussi</h5>
                    <p class="section-content">Pour la Saint-Valentin et bien d'autres occasions.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card2 h-100">
                <img src="../images/person.png" class="card-img-top2" alt="Personne">
                <div class="card-body2">
                    <h5 class="section-subtitle">Conseils pour un road trip réussi</h5>
                    <p class="section-content">Pour la Saint-Valentin et bien d'autres occasions.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Section FAQ -->
<div class="container my-5">
  <h2 class="text-FAQ mb-4">Foire aux questions</h2>
  <div class="row">
    <!-- First column of accordions -->
    <div class="col-md-6">
      <!-- First accordion item -->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Lorem ipsum dolor sit amet, consectetur <br>adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Second column of accordions -->
    <div class="col-md-6">
      <!-- Second accordion item -->
      <div class="accordion" id="accordionExample2">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- First column of accordions -->
    <div class="col-md-6">
      <!-- First accordion item -->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Lorem ipsum dolor sit amet, consectetur <br>adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Second column of accordions -->
    <div class="col-md-6">
      <!-- Second accordion item -->
      <div class="accordion" id="accordionExample2">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- First column of accordions -->
    <div class="col-md-6">
      <!-- First accordion item -->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Lorem ipsum dolor sit amet, consectetur <br>adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Second column of accordions -->
    <div class="col-md-6">
      <!-- Second accordion item -->
      <div class="accordion" id="accordionExample2">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- First column of accordions -->
    <div class="col-md-6">
      <!-- First accordion item -->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Lorem ipsum dolor sit amet, consectetur <br>adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Second column of accordions -->
    <div class="col-md-6">
      <!-- Second accordion item -->
      <div class="accordion" id="accordionExample2">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- First column of accordions -->
    <div class="col-md-6">
      <!-- First accordion item -->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Lorem ipsum dolor sit amet, consectetur <br>adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Second column of accordions -->
    <div class="col-md-6">
      <!-- Second accordion item -->
      <div class="accordion" id="accordionExample2">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Lorem ipsum dolor sit amet, consectetur <br> adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <!-- First column of accordions -->
    <div class="col-md-6">
      <!-- First accordion item -->
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Lorem ipsum dolor sit amet, consectetur <br>adipiscing elit, sed do eiusmod tempor?
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              Contenu ...
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Section solutions -->
<div class="container my-5">
  <div class="row">
    <div class="col-lg-12 mx-auto ">
      <div class="endcard  text-white mb-3" style="border-radius: 5px;">
        <div class="row g-0">
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title " style="font-weight: 700;font-size: 36px;">Vous êtes une agence de location de voitures ?</h3>
              <p class="card-text">Avec Africar, votre chiffre d'affaire augmente <br>de manière significative.</p>
              <a href="#" class="btn btn-warning" style="width: 40%; height: 100%; padding: 15px">Voir les solutions</a>
            </div>
          </div>
          <div class="col-md-4">
            <img src="../images/drive.png" class="img-fluid3" style="border-radius: 5px; height:100%" alt="Driving car">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Bootstrap JS local -->
<script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
