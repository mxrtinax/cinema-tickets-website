<?php
session_start();
  if (isset($_SESSION["email"])) {
      if($_SESSION["isAdmin"]==1){
    include_once 'header.php';
    include_once 'adminPanel.php';}
      else {header('location: ../e404.php');}
  }
    else {header('location: ../e404.php');}
 ?>
