
<div class="fluid-container dashboard-fluid-container mt-3">
  <ul class="nav nav-tabs dashboard-nav-tabs ">
    <li class="nav-item nav-tem-left">
      <a class="nav-link dashboard-nav-link dashboard-nav-link-left 
      <?php 
        $current_file = basename($_SERVER['SCRIPT_NAME']);
        echo ($current_file == 'advertisements.php') ? 'active-link' : ''; 
      ?>" 
      aria-current="page" href="view/professional/advertisements.php" >MES ANNONCES</a>
    </li>
    <li class="nav-item nav-item-right">
      <a class="nav-link dashboard-nav-link dashboard-nav-link-right
      <?php 
        $current_file = basename($_SERVER['SCRIPT_NAME']);
        echo ($current_file == 'update_profile_professional.php' || $current_file == 'settings_professional.php' || $current_file == 'payment_method_professional.php' || $current_file == 'adress_professional.php' || $current_file == 'subscription.php') ? 'active-link' : ''; 
      ?>
    " aria-current="page" href="view/professional/update_profile_professional.php">MON COMPTE</a>
    </li>
    <li class="nav-item nav-item-right">
      <a class="nav-link dashboard-nav-link dashboard-nav-link-right
      <?php 
        $current_file = basename($_SERVER['SCRIPT_NAME']);
        echo ($current_file == 'add_advertisement.php') ? 'active-link' : ''; 
      ?>
    " aria-current="page" href="view/professional/add_advertisement.php">AJOUTER UNE ANNONCE</a>
    </li>
  </ul>
</div> 

