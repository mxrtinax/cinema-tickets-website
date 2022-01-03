<?php
session_start();
  if (isset($_SESSION["email"])) {
    include_once 'header.php';
    include_once 'adminPanel.php';}
    else {header('location: ../e404.php');}
  //echo '<h1>--vtuv'.$_SESSION["email"].'</h1>';
 ?>
