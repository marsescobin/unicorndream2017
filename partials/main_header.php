
<main >
  <nav class="navbar navbar-default custom-nav">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="assets/images/ui/logo.jpg" id="logo"></a>
      <a href="index.php"><h1 class="main-h1">Unicorn Dream Inc</h1></a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

      <!-- If user is logged in and if user is not -->
  
        <?php
        if (isset($_SESSION['e_mail'])) {
            echo 
            "<ul class='nav navbar-nav navbar-right'>
               <li><a href='shop.php'><h2>Shop</h2></a></li>
                <li class='dropdown'>
                  <a href= '' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><h2>Welcome back, user </h2><span class='caret'></span></a>
                    <ul class='dropdown-menu'>
                      <li><a href='account-settings.php'><h2>Account Settings</h2></a></li>
                      <li><a href='myorders.php'><h2>My Orders</h2></a></li>"; 
                      if ($_SESSION['roles'] == '1') {
                        echo '<li><a href="admin.php"><h2>Admin Settings</h2></a></li>';
                      }
                      echo 
                      "<li><a href='logout.php'><h2 style='color:black';>Log out</h2></a></li> 
                    </ul>
                </li>
                <li>
                  <a href='cart.php'>";

            if (isset($_SESSION['e_mail']) && isset($_SESSION['item_count'])) {
             echo '<h2 class="fa fa-shopping-bag"></h2><strong style="color:red; font-size:1.5em;">( '.$_SESSION['item_count'].' )</strong>'; // var_dump($_SESSION['item_count']);
            }
                 echo " </a>
              </li>
             </ul>";
        } else { echo "
        <ul class='nav navbar-nav navbar-right'>
        <li><a href='shop.php'><h2>Shop</h2></a></li>
        <li><a href='login.php'><h2>Log in</h2></a></li>
        <li><a href='register.php'><h2>Register</h2></a></li>
        <li><a href='login.php'><h2 class='fa fa-shopping-bag'></h2></a></li>
      </ul>";
        }
        ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>