<?php

use App\Core\User;
// checks if the user is logged
if (!empty($_SESSION['name'])) {
  // get balance from current user and passes to var
  $currentBalance = json_decode(User::getBalance($_SESSION['name']), true);
  $_SESSION['balance'] = ($currentBalance[0]['balance']);
}
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-black text-light">
  <ul class="navbar-nav mr-auto pl-3 mb-2 mb-lg-0" aria-labelledby="UserMenuButton">
    <li class="nav-item">
      <p class="nav-text text-muted pt-4">Welcome back
      </p>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto pr-3 mb-2 mb-lg-0">
    <li class="nav-item">
      <a class="nav-link" href="">
        <?php if (isset($_SESSION['balance'])) {
          echo 'Balance: $' . $_SESSION['balance'];
        }
        ?>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
                                  echo '/profile';
                                } else {
                                  echo 'login';
                                }
                                ?>">
        <?php
        if (isset($_SESSION['name'])) {
          echo $_SESSION['name'];
        } else {
          echo 'Guest';
        }
        ?>
        <i class="fa fa-user"></i>
      </a>
    </li>
    <?php if (isset($_SESSION['name'])) { ?>
      <li class="nav-item">
        <a class="nav-link" href="/logout">
          <i class="fa fa-power-off"></i>
        </a>
      </li class="nav-item">
    <?php } ?>
  </ul>
</nav>
<nav class="navbar navbar-expand-sm navbar-light bg-faded text-center">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle Navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarToggler">
      <a class="navbar-brand" href="/">
        <img src="res/logo-min.png" alt="Storelle" class="d-inline-block align-top" width="132" height="72">
      </a>
      <ul class="navbar-nav mr-auto pr-5 font-weight-bold">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/"><i class="fa fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products"><i class="fa fa-shopping-bag"></i> Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shopping-cart"><i class="fa fa-shopping-cart"></i> Shopping Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about"><i class="fa fa-info-circle"></i> About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact"><i class="fa fa-address-card"></i> Contact</a>
        </li>
      </ul>
    </div>
    </ul>
    </li>
    </ul>
  </div>
  </div>
</nav>