
<div class="fluid-container dashboard-fluid-container mt-3">
  <ul class="nav nav-tabs dashboard-nav-tabs ">
    <li class="nav-item nav-tem-left">
      <a class="nav-link dashboard-nav-link dashboard-nav-link-left 
      <?php 
        $current_file = basename($_SERVER['SCRIPT_NAME']);
        echo ($current_file == 'rentals_particular.php') ? 'active-link' : ''; 
      ?>" 
      aria-current="page" href="view/particular/rentals_particular.php" >MES LOCATIONS</a>
    </li>
    <li class="nav-item nav-item-right">
      <a class="nav-link dashboard-nav-link dashboard-nav-link-right
      <?php 
        $current_file = basename($_SERVER['SCRIPT_NAME']);
        echo ($current_file == 'update_profile_particular.php' || $current_file == 'settings_particular.php' || $current_file == 'payment_method_particular.php' || $current_file == 'adress_particular.php') ? 'active-link' : ''; 
      ?>
    " aria-current="page" href="view/particular/update_profile_particular.php">MON COMPTE</a>
    </li>
  </ul>
</div> 

