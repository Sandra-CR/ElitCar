

<div class="wrapper-messagerie">
    <section class="users">
      <header class="clickici">
        <div class="content">
          <?php 
            // Initialiser $userName pour éviter les erreurs de variable non définie
            $userName = "";

            // Vérifier le type de compte de l'utilisateur actuellement connecté
            if (isset($_SESSION['role']) && $_SESSION['role'] <= Role::CUSTOMER->value) {
              $sql = "SELECT * FROM particular WHERE id_user = {$_SESSION['id']}";
              $stmt = $pdo->query($sql); 
              $user = $stmt->fetch(PDO::FETCH_ASSOC); 
              $userName = $user['first_name'] . " " . $user['last_name'] ;
            } elseif (isset($_SESSION['role']) && $_SESSION['role'] >= Role::OWNER->value) {
              $sql = "SELECT * FROM professional WHERE id_pro = {$_SESSION['id']}";
              $stmt = $pdo->query($sql); 
              $user = $stmt->fetch(PDO::FETCH_ASSOC); 
              $userName = $user['name'];
            } else {
              echo"il y a une erreur";
            }
          ?>
          
          <div class="details">
            <span><?php echo $userName; ?></span>
          </div>
        </div>
        <i class="fa-solid fa-message"></i> 
      </header>
      <section class="div-users">
          <div class="search">
          <span class="text">Select an user to start chat</span>
          <input type="text" placeholder="Enter name to search...">
          <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">
    
        </div>
      </section>
      
    </section>
  </div>

<script src="js/users.js"></script>
