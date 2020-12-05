<?php

$s_credit = $c_Select->fn_SingleResponse($conn, "SELECT * FROM users WHERE username=?", "voucher", $_SESSION['username']);

echo '
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>    
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link"  data-slide="true" href="#" role="button">
          Credit : '.$s_credit.'
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="#" role="button">
          '.$_SESSION['username'].'
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  data-slide="true" href="logout" role="button">
          Logout
        </a>
      </li>
    </ul>
  </nav>';