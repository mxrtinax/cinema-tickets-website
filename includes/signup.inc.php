<?php
if (isset($_POST["submit"])) {
  //echo "<h1>it works!</h1>";
  $email = $_POST["email"];
  $nume = $_POST["nume"];
  $prenume = $_POST["prenume"];
  $parola = $_POST["pwd"];
  $parolaRepetata = $_POST["pwdrepeat"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  //echo $serverName." ".$email;
  if (emptyInputSignup($email,$nume,$prenume,$parola,$parolaRepetata)!==false) {
    header("location: ../signup.php?error=emptyinput");
    exit();
  }
  if (invalidMail($email)!==false) {
    header("location: ../signup.php?error=mailInvalid");
    exit();
  }
  if (specialChars($nume,$prenume,$email)!==false) {
    header("location: ../signup.php?error=CaractereSpecialeInterzise");
    exit();
  }
  //if (invalidPrenume($prenume)!==false) {
  //  header("location: ../home.php?=prenumeInvalid");
  //  exit();
  //}
  if (pwdStrong($parola)!==false) {
    header("location: ../signup.php?error=parolaEPreaSlaba");
    echo "<p style='color:white;'>Parola este prea slaba! Trebuie sa aiba minim 8 caractere, din care o litera mare, una mica, o cifra si un caracter special</p>";
    exit();  }
  if (pwdMatch($parola,$parolaRepetata)!==false) {
    header("location: ../signup.php?error=paroleleNuCorespund");
    echo "<h1>Parolele nu corespund!</h1>";
    exit();
  }
if (mailExists($conn, $email)!==false) {
    header("location: ../signup.php?error=mailulEsteFolosit");
    exit();
  }
  createUser($conn,$email, $nume, $prenume, $parola);

}
else{
  header("location: ../signup.php?error=isset");
}
?>
