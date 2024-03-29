
<div class="container-fluid menu-compte-container-fluid py-4">
      <!-- Menu List -->
      <ul class="list-group menu-compte-list-group list-group-flush mt-3 " >
        <li class="list-group-item menu-compte-list-group-item  <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'update_profile_professional.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="view/professional/update_profile_professional.php">Charte de confidentialités</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'settings_professional.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="view/professional/settings_professional.php"> Privacy</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'payment_method_professional.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="view/professional/payment_method_professional.php"> Terms of Service</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'subscription.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="view/professional/subscription.php"> Mention Légale</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'adress_professional.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="view/professional/adress_professional.php"> Conditions générales d’abonnement</a>
        </li>
      </ul>
  </div>