<?php
//session_start();
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
$id_user = $_SESSION["id_user"];
$query = "SELECT * FROM  users where id_user =".$id_user.";";
$result = $conn->query($query);

$num_results = $result->num_rows;

//echo "<p>Number of movies found: ".$num_results."</p>";

for ($i=0; $i <$num_results; $i++) {
  $row = $result->fetch_assoc();

  echo '<p><b>Nume:</b></p><p>'.$row["nume"].'</p>' ;
  echo '<p><b>Prenume:</b></p><p>'.$row["prenume"].'</p>';
  echo '<p><b>Email:</b></p><p>'.$row["mail"].'</p>';
}
