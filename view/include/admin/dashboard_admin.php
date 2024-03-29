
<div class="fluid-container dashboard-fluid-container mt-3">
  <ul class="nav nav-tabs dashboard-nav-tabs ">
    <li class="nav-item nav-tem-left">
      <a class="nav-link dashboard-nav-link dashboard-nav-link-left 
      <?php 
        $current_file = basename($_SERVER['SCRIPT_NAME']);
        echo ($current_file == 'advertisements.php') ? 'active-link' : ''; 
      ?>" 
      aria-current="page" href="view/admin/advertisements.php" >LES ANNONCES</a>
    </li>
    <li class="nav-item nav-item-right">
      <a class="nav-link dashboard-nav-link dashboard-nav-link-right
      <?php 
        $current_file = basename($_SERVER['SCRIPT_NAME']);
        echo ($current_file == 'notifications.php') ? 'active-link' : ''; 
      ?>
    " aria-current="page" href="view/admin/notifications.php">MES NOTIFICATIONS</a>
    </li>
    <li class="nav-item nav-item-right">
      <a class="nav-link dashboard-nav-link dashboard-nav-link-right
      <?php 
        $current_file = basename($_SERVER['SCRIPT_NAME']);
        echo ($current_file == 'messages.php') ? 'active-link' : ''; 
      ?>
    " aria-current="page" href="view/admin/messages.php">MES MESSAGES</a>
    </li>
    <li class="nav-item nav-item-right">
      <a class="nav-link dashboard-nav-link dashboard-nav-link-right
      <?php 
        $current_file = basename($_SERVER['SCRIPT_NAME']);
        echo ($current_file == 'agency_table.php' || $current_file =='particular_table.php') ? 'active-link' : ''; 
      ?>
    " aria-current="page" href="view/admin/agency_table.php">TABLEAU DES UTILISATEURS</a>
    </li>
    <li class="nav-item nav-item-right">
      <a class="nav-link dashboard-nav-link dashboard-nav-link-right
      <?php 
        $current_file = basename($_SERVER['SCRIPT_NAME']);
        echo ($current_file == 'settings_admin.php') ? 'active-link' : ''; 
      ?>
    " aria-current="page" href="view/admin/settings_admin.php">MODIFIER LES CONDITIONS D'UTILISATION</a>
    </li>
  </ul>
</div> 

