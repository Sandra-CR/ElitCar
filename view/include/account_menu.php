
<div class="container-fluid menu-compte-container-fluid py-4">
      <!-- Menu List -->
      <ul class="list-group menu-compte-list-group list-group-flush mt-3 " >
        <li class="list-group-item menu-compte-list-group-item  <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'update_profile.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="view/update_profile.php">Modifier mon profile</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'settings.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="settings.php"> Paramètres du compte</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'payment_method.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="payment_method.php"> Moyens de paiement</a>
        </li>
      </ul>
  </div>