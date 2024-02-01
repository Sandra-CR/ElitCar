<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elitcar">
    <base href="http://localhost/ElitCar/" target="_blank">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script defer src="js/main.js"></script>
    <title>ElitCar</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a target="_self" href="index.php"><img src="img/Elitcar.png" alt="Logo" width="110px" height="27px" class="d-inline-block align-text-top"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-dark" target="_self" href="view/particuliar/create_particular.php">Crée un compte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" target="_self" href="view/login.php">Connexions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" target="_self" href="../controller/admin/logout.php">Déconnexions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" target="_self" href="view/particuliar/create_particular.php">Agences</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" target="_self" href="view/particuliar/faq.php">FAQ?</a>
            </li>
        </ul>
    </div>
  </div>
</nav>