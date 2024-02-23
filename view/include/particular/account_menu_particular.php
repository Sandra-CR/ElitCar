
<div class="container-fluid menu-compte-container-fluid py-4">
      <!-- Menu List -->
      <ul class="list-group menu-compte-list-group list-group-flush mt-3 " >
        <li class="list-group-item menu-compte-list-group-item  <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'update_profile_particular.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="view/particular/update_profile_particular.php">Modifier mon profil</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'settings_particular.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="view/particular/settings_particular.php"> Paramètres du compte</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'payment_method_particular.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="view/particular/payment_method_particular.php"> Moyens de paiement</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'adress_particular.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="view/particular/adress_particular.php"> Adresse postale</a>
        </li>
      </ul>
  </div>