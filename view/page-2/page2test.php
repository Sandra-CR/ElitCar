<?php
include_once "../include/base.php";
?>



<input type="text" id="form-control home-form-control" placeholder="Rechercher...">

<script>
    // Récupère les informations de recherche stockées
    const searchTerm = localStorage.getItem('input.form-control');
    if (searchTerm) {
        // Affiche les informations de recherche dans la barre de recherche de la deuxième page
        document.getElementById('input.form-control').value = searchTerm;
    }
</script>






    <div class="container mx-6 my-3">
        <button type="button" class="btn btn-light rounded-pill dropdown-toggle" data-bs-toggle="dropdown"
            data-bs-auto-close="true" aria-expanded="false">
            Trier par
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Popularité</a></li>
            <li><a class="dropdown-item" href="#">Prix du plus bas au plus élevé</a></li>
            <li><a class="dropdown-item" href="#">Prix du plus élevé au plus bas</a></li>
        </ul>

        <button type="button" class="btn btn-light rounded-pill dropdown-toggle" data-bs-toggle="dropdown"
            data-bs-auto-close="true" aria-expanded="false">
            Nombre de passagers
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">2+</a></li>
            <li><a class="dropdown-item" href="#">4+</a></li>
            <li><a class="dropdown-item" href="#">5+</a></li>
        </ul>

        <button type="button" class="btn btn-light rounded-pill dropdown-toggle" data-bs-toggle="dropdown"
            data-bs-auto-close="true" aria-expanded="false">
            Type de vehicule
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Berline</a></li>
            <li><a class="dropdown-item" href="#">SUV</a></li>
            <li><a class="dropdown-item" href="#">Voiture électrique</a></li>
        </ul>

    </div>

    

    <div class="container overflow-hidden text-left p-3">

    <div class="row gy-5">


        <div class="col-lg-6 mb-3">
            <div class="border-secondary card flex-row bg-light">
                <div><img src="view/page-2/img/1.jpg" alt="Image 1" class="card-img-top"></div>
                <div class="card-body" style="width: 250%;">
                    <h5 class="card-title text-danger">Renault</h5>
                    <h6 class="card-title">Prix /jour</h6>
                    <h6 class="card-title">Total</h6> 
                    <a href="#" class="btn btn-primary">Réservez</a>
                </div>    
            </div>
        </div>


        <div class="col-lg-6 mb-3">
            <div class="border-secondary card flex-row bg-light">
                <div><img src="view/page-2/img/1.jpg" alt="Image 1" class="card-img-top"></div>
                <div class="card-body" style="width: 250%;">
                    <h5 class="card-title text-danger">Renault</h5>
                    <h6 class="card-title">Prix /jour</h6>
                    <h6 class="card-title">Total</h6> 
                    <a href="#" class="btn btn-primary">Réservez</a>
                </div>    
            </div>
        </div>



        <div class="col-lg-6 mb-3">
            <div class="border-secondary card flex-row bg-light">
                <div><img src="view/page-2/img/1.jpg" alt="Image 1" class="card-img-top"></div>
                <div class="card-body" style="width: 250%;">
                    <h5 class="card-title text-danger">Renault</h5>
                    <h6 class="card-title">Prix /jour</h6>
                    <h6 class="card-title">Total</h6> 
                    <a href="#" class="btn btn-primary">Réservez</a>
                </div>    
            </div>
        </div>


        <div class="col-lg-6 mb-3">
            <div class="border-secondary card flex-row bg-light">
                <div><img src="view/page-2/img/1.jpg" alt="Image 1" class="card-img-top"></div>
                <div class="card-body" style="width: 250%;">
                    <h5 class="card-title text-danger">Renault</h5>
                    <h6 class="card-title">Prix /jour</h6>
                    <h6 class="card-title">Total</h6> 
                    <a href="#" class="btn btn-primary">Réservez</a>
                </div>    
            </div>
        </div>


        <div class="col-lg-6 mb-3">
            <div class="border-secondary card flex-row bg-light">
                <div><img src="view/page-2/img/1.jpg" alt="Image 1" class="card-img-top"></div>
                <div class="card-body" style="width: 250%;">
                    <h5 class="card-title text-danger">Renault</h5>
                    <h6 class="card-title">Prix /jour</h6>
                    <h6 class="card-title">Total</h6> 
                    <a href="#" class="btn btn-primary">Réservez</a>
                </div>    
            </div>
        </div>


        <div class="col-lg-6 mb-3">
            <div class="border-secondary card flex-row bg-light">
                <div><img src="view/page-2/img/1.jpg" alt="Image 1" class="card-img-top"></div>
                <div class="card-body" style="width: 250%;">
                    <h5 class="card-title text-danger">Renault</h5>
                    <h6 class="card-title">Prix /jour</h6>
                    <h6 class="card-title">Total</h6> 
                    <a href="#" class="btn btn-primary">Réservez</a>
                </div>    
            </div>
        </div>


        <div class="col-lg-6 mb-3">
            <div class="border-secondary card flex-row bg-light">
                <div><img src="view/page-2/img/1.jpg" alt="Image 1" class="card-img-top"></div>
                <div class="card-body" style="width: 250%;">
                    <h5 class="card-title text-danger">Renault</h5>
                    <h6 class="card-title">Prix /jour</h6>
                    <h6 class="card-title">Total</h6> 
                    <a href="#" class="btn btn-primary">Réservez</a>
                </div>    
            </div>
        </div>


        <div class="col-lg-6 mb-3">
            <div class="border-secondary card flex-row bg-light">
                <div><img src="view/page-2/img/1.jpg" alt="Image 1" class="card-img-top"></div>
                <div class="card-body" style="width: 250%;">
                    <h5 class="card-title text-danger">Renault</h5>
                    <h6 class="card-title">Prix /jour</h6>
                    <h6 class="card-title">Total</h6> 
                    <a href="#" class="btn btn-primary">Réservez</a>
                </div>    
            </div>
        </div>
    </div>
</div>



    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center my-3">
            <li class="page-item"><a class="page-link rounded-pill mx-1 bg-light text-black " href="#">Précedent</a>
            </li>
            <li class="page-item active"><a class="page-link rounded-pill mx-1 " href="#">1</a></li>
            <li class="page-item"><a class="page-link rounded-pill mx-1 " href="#">2</a></li>
            <li class="page-item"><a class="page-link rounded-pill mx-1 " href="#">3</a></li>
            <li class="page-item"><a class="page-link rounded-pill mx-1 bg-light text-black" href="#">Suivant</a></li>
        </ul>
    </nav>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".pagination .page-link").on("click", function () {
                // Supprimer la classe 'active' de tous les éléments de pagination
                $(".pagination .page-item").removeClass("active");
                // Ajouter la classe 'active' à l'élément de pagination cliqué
                $(this).closest(".page-item").addClass("active");
            });
        });
    </script>
