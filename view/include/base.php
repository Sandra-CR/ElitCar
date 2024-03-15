<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Elitcar">
    <base href="http://localhost/ElitCar/" target="_self">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/main.js"></script>
    <title>ElitCar</title>
</head>
<body>

<?php
    session_start(); 
    
?>


<nav class="base_navbar home-navbar navbar-expand-lg bg-body-light">
  <div class="home-container-fluid ">
    <a class="navbar-brand" target="_self" href="view/home"> Elit<span class="sub-navbar-brand">car</span> </a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse home-navbar-collapse" id="navbarNav">
      <ul class="navbar-nav home-navbar-nav">
        <?php if( !isset($_SESSION['name'])) {?>
          <li class="nav-item dropdown">
              <a class="nav-link home-nav-link dropdown-toggle"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Connexion
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" target="_self"  href="view/particular/login_particular">Particulier</a></li>
                <li><a class="dropdown-item" target="_self"  href="view/professional/login_professional">Professionel</a></li>
              </ul>
          </li>
        <?php }else { ?>
          <li class="nav-item">
              <a class="nav-link home-nav-link" target="_self" href="controller/admin/logout">Déconnexions</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link home-nav-link" target="_self" href="view/professional/professional.php">Agences</a>
        </li>
        <?php  if(isset($_SESSION['role']) && $_SESSION['role'] <= Role::CUSTOMER->value) {?>
          <li class="nav-item">
            <a class="nav-link home-nav-link" target="_self" href="view/particular/settings_particular.php"><?= $_SESSION['name'] ?></a>
          </li>
        <?php }else if (isset($_SESSION['role']) && $_SESSION['role'] == Role::ADMIN->value){ ?>
          <li class="nav-item">
            <a class="nav-link home-nav-link" target="_self" href="view/admin/settings_admin.php"><?= $_SESSION['name'] ?></a>
          </li>
        <?php }else if(isset($_SESSION['role']) && $_SESSION['role'] >= Role::OWNER->value){ ?>
          <li class="nav-item">
            <a class="nav-link home-nav-link" target="_self" href="view/professional/settings_professional.php"><?= $_SESSION['name'] ?></a>
          </li>
        <?php }else {?>
          <li class="nav-item">
            <a class="nav-link home-nav-link" target="_self" href="view/ElitCarFAQ"> FAQ ? </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

</section>
