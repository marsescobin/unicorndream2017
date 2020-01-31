<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Unicorn Dream Ink</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php 
  if (isset($_SESSION['e_mail'])) {
    echo 
    '<div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Welcome back, $user
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="account-settings.php">Account Settings</a>
          <a class="dropdown-item" href="#">My Orders</a>
          <a class="dropdown-item" href="logout.php">Log Out</a>      
       </div>
      </li>
    <li><a href="><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
    </ul> 
    </div>'


  }

  else { echo 
  '<div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li>
    </ul>
  </div>
  '

  }
  ?>
</nav>