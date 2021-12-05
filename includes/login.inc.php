<?php

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $parola = $_POST["pwd"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  if (emptyInputLogin($email,$parola)!==false) {
    header("location: ../login.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $email,$parola);
}
else {
  header("location: ../login.php?error=isset");
}
