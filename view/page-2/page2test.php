<?php
include_once "../include/base.php";
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


</html>



<body>

    <div class="container mx-0 my-2">
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


    //-----------------------------------------------------------------

    // BLOC VOITURES 1



    <div class="container overflow-hidden text-center p-5">
        <div class="row gy-5">
            <div class="col-6">
                <div class="p-3">Custom column padding</div>
            </div>
            <div class="col-6">
                <div class="p-3">Custom column padding</div>
            </div>
            <div class="col-6">
                <div class="p-3">Custom column padding</div>
            </div>
            <div class="col-6">
                <div class="p-3">Custom column padding</div>
            </div>
        </div>
    </div>

    //-----------------------------------------------------------------


    //BLOC VOITURES 2



    <div class="container overflow-hidden text-center p-5">
        <div class="row gy-5">
            <div class="col-6">
                <div class="p-3"><img src="view/page-2/img/1.jpg" alt="Image 1" class="img-fluid rounded-3"> </div>
            </div>
            <div class="col-6">
                <div class="p-3"><img src="view/page-2/img/2.jpg" alt="Image 2" class="img-fluid rounded-3"></div>
            </div>
            <div class="col-6">
                <div class="p-3"><img src="view/page-2/img/3.jpg" alt="Image 3" class="img-fluid rounded-3"></div>
            </div>
            <div class="col-6">
                <div class="p-3"><img src="view/page-2/img/4.jpg" alt="Image 4" class="img-fluid rounded-3"></div>
            </div>
        </div>
    </div>




    //-----------------------------------------------------------------


    //BLOC VOITURES 3



    <div class="bloc3">
        <div class="container overflow-hidden text-center p-5">
            <div class="row gy-5">
                <div class="col-6">
                    <div class="p-3">Custom column padding</div>
                </div>
                <div class="col-6">
                    <div class="p-3">Custom column padding</div>
                </div>
                <div class="col-6">
                    <div class="p-3">Custom column padding</div>
                </div>
                <div class="col-6">
                    <div class="p-3">Custom column padding</div>
                </div>
            </div>
        </div>



    </div>




    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item"><a class="page-link rounded-pill mx-1 bg-light text-black " href="#">Précedent</a>
            </li>
            <li class="page-item active"><a class="page-link rounded-pill mx-1 " href="#">1</a></li>
            <li class="page-item"><a class="page-link rounded-pill mx-1 " href="#">2</a></li>
            <li class="page-item"><a class="page-link rounded-pill mx-1 " href="#">3</a></li>
            <li class="page-item"><a class="page-link rounded-pill mx-1 bg-light text-black" href="#">Suivant</a></li>
        </ul>
    </nav>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

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

</body>
