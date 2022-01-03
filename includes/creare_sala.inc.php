<?php
if (isset($_POST["salaNoua"])) {
  //echo "<h1>it works!</h1>";
  $numeSala = $_POST["numeSala"];
  $nrLocuri = $_POST["nrLocuri"];
  $nrColoane = $_POST["nrColoane"];
  $nrRanduri = $_POST["nrRanduri"];


  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';


  creareSala($conn,$numeSala, $nrLocuri, $nrColoane, $nrRanduri);

}
else{
  header("location: ../admin.php?error=isset");
}
?>
