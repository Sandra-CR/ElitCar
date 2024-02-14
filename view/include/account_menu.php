<?php 
include_once "dashboard.php";
?>
<div class="container-fluid menu-compte-container-fluid py-4">
      <!-- Menu List -->
      <ul class="list-group menu-compte-list-group list-group-flush mt-3 " >
        <li class="list-group-item menu-compte-list-group-item  <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'update_profile.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="update_profile.php  <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'update_profile.php') ? 'active-item' : ''; ?>">Modifier mon profile</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'settings.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="settings.php"> Paramètres du compte</a>
        </li>
        <li class="list-group-item menu-compte-list-group-item mt-1 <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'payment_method.php') ? 'active-item' : ''; ?>">
          <a class="nav-link" aria-current="page" href="payment_method"> Moyens de paiement</a>
        </li>
      </ul>
  </div>
  <script>
  let menuItems = document.querySelectorAll('.menu-compte-list-group-item');
  function toggleActiveClass(event) {
    menuItems.forEach(function(item) {
      item.classList.remove('active-item');
    });
    event.currentTarget.classList.add('active-item');
  }
  menuItems.forEach(function(item) {
    item.addEventListener('click', toggleActiveClass);
  });
</script>