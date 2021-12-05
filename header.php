<?php
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/pc.ico" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/stil.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>


  </head>
  <body style="background-color:black;">
    <div class="w3-bar w3-black">
      <a href="home.php" class="w3-bar-item w3-button"><h1 class="w3-text-red" style="text-shadow:1px 1px 0 #444"><b>Cinema Cerce</b></h1></a>
      <a href="browse.php" class="w3-bar-item w3-button"><h1 class="w3-text-red" style="text-shadow:1px 1px 0 #444"><b>Filme</b></h1></a>
      <?php
        if (isset($_SESSION["email"])) {
          echo '<a href="user.php" class="w3-bar-item w3-button w3-right"><h1 class="w3-text-yellow" style="text-shadow:1px 1px 0 #444; margin-right:20px"><b>Users</b></h1></a>';

        }
       ?>

    </div>
