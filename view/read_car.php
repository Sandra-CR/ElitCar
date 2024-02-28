
<?php 
include_once "../controller/admin/role.php";
include_once "include/base.php";
?>


<section class="readCar_section readCar_slider position-relative hidden">
    <div id="carouselExampleAutoplaying" class="carousel slide w-75 mx-auto my-4  " data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/voiture_caroussel4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/voiture_caroussel5.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/voiture_caroussel6.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="réservation_absolute réservation_absolute_slider text-center bg-light-subtle d-flex flex-column  position-absolute translate-middle bottom-0 end-0 p-0">
        <div class="bg-secondary-subtle h-25 d-flex justify-content-center align-items-center">
            <p class="slider_absolute_title m-0">75 614 CFA</p>
        </div>
        <div class=" d-flex flex-column justify-content-between h-75"><p>Pour 9 jours</p>
        <p>1400 km inclus</p>
        <button type="button" class="btn btn-warning text-light mb-3 w-50 h-auto mx-auto ">Réserver</button></div>
    </div>
    <div class="readCar_slider_descri w-75 mx-auto mt-2">
        <h3>Volkswagen Golf</h3>
        <div><p>2022<span> • </span>5 places</p></div>
        <div>
            <span>
            <img src="img/etoile.svg" alt="">
            <img src="img/etoile.svg" alt="">
            <img src="img/etoile.svg" alt="">
            <img src="img/etoile.svg" alt="">
            <img src="img/etoile_moitié.svg" alt="">
            </span>
            4.74(21)
        </div>
  </div> 
</section>


  <section class="readCar_section readCar_caroussel w-75 mx-auto mt-4 position-relative">
    <div class="readCar_carousel-container ">
      <div class="readCar_carousel-btn-container">
         <button class="readCar_carousel-btn" id="prevBtn">&#x27E8;</button>
         <button class="readCar_carousel-btn" id="nextBtn">&#12297;</button>
      </div>

      <div class="readCar_carousel-track" id="carouselTrack">
        <div class="readCar_carousel-slide ">
          <img src="img/voiture_caroussel4.jpg" alt="Image 1">
        </div>
        <div class="readCar_carousel-slide">
          <img src="img/voiture_caroussel4.jpg" alt="Image 1">
        </div>
        <div class="readCar_carousel-slide nomargin">
          <img src="img/voiture_caroussel4.jpg" alt="Image 1">
        </div>
        <div class="readCar_carousel-slide ">
          <img src="img/voiture_caroussel5.jpg" alt="Image 1">
        </div>
        <div class="readCar_carousel-slide">
          <img src="img/voiture_caroussel6.jpg" alt="Image 1">
        </div>
        <div class="readCar_carousel-slide nomargin">
          <img src="img/voiture_caroussel4.jpg" alt="Image 1">
        </div>
        <div class="readCar_carousel-slide">
          <img src="img/voiture_caroussel7.jpg" alt="Image 1">
        </div>
        <div class="readCar_carousel-slide">
          <img src="img/voiture_caroussel8.jpg" alt="Image 1">
        </div>
        <div class="readCar_carousel-slide">
          <img src="img/voiture_caroussel9.jpg" alt="Image 1">
        </div>
      </div>
        
    </div>

    
    <div class="réservation_absolute réservation_absolute_caroussel text-center bg-light-subtle d-flex flex-column justify-content-between position-absolute translate-middle  end-0 p-0">
        <div class="bg-secondary-subtle h-25 d-flex justify-content-center align-items-center">
            <p class="m-0">75 614 CFA</p>
        </div>
        <p>Pour 9 jours</p>
        <p>1400 km inclus</p>
        <div>
          <button type="button" class="btn btn-warning text-light ">Réserver</button>
        </div>
    </div>
    <div class="mt-3 mx-auto">
        <h3>Volkswagen Golf</h3>
        <div><p>2022<span> • </span>5 places</p></div>
        <div>
            <span>
            <img src="img/etoile.svg" alt="">
            <img src="img/etoile.svg" alt="">
            <img src="img/etoile.svg" alt="">
            <img src="img/etoile.svg" alt="">
            <img src="img/etoile_moitié.svg" alt="">
            </span>
            4.74(21)
        </div>
    </div>
 </section>






<section class="readCar_section w-75 mx-auto">
    <h2>Adresse de départ et de retour</h2>
    <div class="bloc_map border">
        <div class="loc-map">
            <div><i class="fa-solid fa-location-dot fa-xl"></i></div>
            <div class="texte-loc">
                <p>Gare de Douala , Place</p>
                <p>Richard Bona, Douala, Cameroun</p>
            </div>
        </div>
        <div class="map">
            <img  src="img/map.png" alt="">
        </div>
    </div>
  </section>
    <section class="readCar_section w-75 mx-auto">
        <h2>Propriétaire</h2>
        <div class="border">
            <div class="readCar_avis">
              <div class="elitcar2" >
                <img src="img/ElitCar2.png" alt="">
              </div>
                <div class="readCar_avis_droit">
                    <div class="readCar_avis_haut">
                        <h3>EASYCAR</h3>
                        <img src="img/pro.png" alt="image_pro">
                    </div>
                    <div class="readCar_avis_bas">
                    <span>
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile_moitié.svg" alt="">
                    </span>
                        4.74(21)
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="readCar_section w-75 mx-auto">
      <h2>Description du véhicule</h2>
      <div class="description-vehicule">
        <div class="border">
            <div class="bloc_point_jaune">
                <div class="testpipi">
                    <div>
                        <img class="point-jaune" src="img/pointjaune.png" alt="point-jaune">
                    </div>
                    <p>Merci de respecter les règles sanitaires, ne laissez pas de déchets dans le véhicule</p>
                </div>

                <div  class="testpipi"> 
                    <div>
                      <img class="point-jaune" src="img/pointjaune.png" alt="point-jaune">
                    </div>
                    <p>Merci de respecter les règles sanitaires, ne laissez pas de déchets dans le véhicule</p>
                </div>

                <div class="testpipi"> 
                    <div>
                      <img class="point-jaune" src="img/pointjaune.png" alt="point-jaune">
                    </div>
                    <p>Merci de respecter les règles sanitaires, ne laissez pas de déchets dans le véhicule</p>
                </div>
            </div>
       
        <p class="vehicule">Véhicule NEUF, qui convient à vos déplacements courts en ville comme à de plus longs trajets. Les options vous assureront un grand confort.</p>

        <div class="testcaca">
        <img class="point-bleu" src="img/pointbleu.png" alt="pont-bleu-texte">
          <p>Bluetooth</p>
       </div>

      <div class="testcaca">
        <img class="point-bleu" src="img/pointbleu.png" alt="pont-bleu-texte">
        <p>GPS</p>  
      </div>

      <div class="testcaca">
        <img class="point-bleu" src="img/pointbleu.png" alt="pont-bleu-texte">
         <p>Climatisation</p>  
      </div>

      <div class="testcaca">
      <img class="point-bleu" src="img/pointbleu.png" alt="pont-bleu-texte">
      <p>Carplay,Android Auto</p>
      </div>

      <div class="testcaca">
      <img class="point-bleu" src="img/pointbleu.png" alt="pont-bleu-texte">
      <p>Attache ISOFIX</p>
      </div>

      <div class="testcaca">
      <img class="point-bleu" src="img/pointbleu.png" alt="pont-bleu-texte"> 
      <p>Caméra de recul</p>
      </div>
      
      <div class="point_noir">
        <span>•</span> <p>  Ce véhicule est disponible à Douala</p>
      </div>

      <div class="point_noir">
        <span>•</span> <p>  Le nettoyage est obligatoire, des pénalités seront appliquées en cas de non respect</p>
      </div>

      <div class="point_noir">
        <span>•</span> <p>  Des sièges enfants payants sont disponibles (Merci de faire la demande 48H MINIMUM 
        avant le début de votre location.)</p>
      </div>

      <div>
        <p>Voici les tarifs pour les sièges enfants:</p>
        <p>1 jour: 10€</p>
      </div>


      <div class="prix">
        <p>Week-end (vendredi soir-lundi matin) ou 2 jours semaine: 15€</p>
        <p>3 jours: 20€</p>
        <p>1 semaine: 30€</p>
        <p>2 semaines ou + : 50€</p>
      </div>

      <div>
        <p>📧 Nous communiquons principalement par la messagerie Elitcar</p>
      </div>
    </section>

    


<section class="readCar_section w-75 mx-auto ">
    <h2>Caution</h2>
    <div class="border">
        <p> 196 739 CFA bloqués jusqu'au 10/03/24</p>
    </div>
</section>

    
    
    </div>
</div>


<section class="readCar_section d-flex flex-column align-items-center">
    <div  class="d-flex justify-content-between w-75 align-items-center">
        <h2>Les annonces de ce pro</h2>
        <a href="#">Voir plus d'annonces   <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div id="read_card" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 w-75 ">
      <div class="col ps-0">
        <div class="card">
          <img src="img/card1.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Volkswagen Polo</h5>
            <p>2022<span> • </span>5 places</p>
            <span>
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile_moitié.svg" alt="">
                        4.74(21)
            </span>

            <div class="card-text">
            <p>75 650 CFA</p>
            <p>Pour 5 jours</p>
            </div>

          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="img/card2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Volkswagen Polo</h5>

            <p>2022<span> • </span>5 places</p>
            <span>
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile_moitié.svg" alt="">
                        4.74(21)
            </span>
            
            <div class="card-text">
            <p>75 650 CFA</p>
            <p>Pour 5 jours</p>
            </div>

          
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="img/card3.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Volkswagen Polo</h5>

            <p>2022<span> • </span>5 places</p>
            <span>
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile_moitié.svg" alt="">
                        4.74(21)
            </span>
            
            <div class="card-text">
            <p>75 650 CFA</p>
            <p>Pour 5 jours</p>
            </div>

          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <img src="img/card4.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Volkswagen Polo</h5>

            <p>2022<span> • </span>5 places</p>
            <span>
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile.svg" alt="">
                        <img src="img/etoile_moitié.svg" alt="">
                        4.74(21)
            </span>
            
            <div class="card-text">
            <p>75 650 CFA</p>
            <p>Pour 5 jours</p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


<?php include_once "footer.php"; ?>

