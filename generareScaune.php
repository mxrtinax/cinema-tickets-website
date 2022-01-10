<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
//session_start();
$id_proiectie = $_GET['proiectie'];

$query2 = "select nr_randuri, nr_coloane from sala where id_sala = (Select id_sala from proiectie where id_proiectie = ".$id_proiectie.");";

$query = "SELECT * FROM proiectie INNER JOIN loc ON proiectie.id_proiectie = loc.id_proiectie where proiectie.id_proiectie = $id_proiectie;";
$result = $conn->query($query);
$result2 = $conn->query($query2);
$num_results = $result->num_rows;
$row = $result2->fetch_assoc();
//echo '<h1>Randuri:'.htmlspecialchars(stripslashes($row['nr_randuri'])).'</h1>';
//echo '<h1>Coloane:'.htmlspecialchars(stripslashes($row['nr_coloane'])).'</h1>';
//echo "<p>Number of movies found: ".$num_results."</p>";
echo "<br>";
$randuri = $row['nr_randuri'];
$coloane = $row['nr_coloane'];
for($i=1;$i<=$randuri;$i++){
  echo '<div class="row">';
  for($j=1;$j<=$coloane;$j++){
    $q = "select * from loc where rand=".$i." and coloana =".$j." and id_proiectie = '".$id_proiectie."';";
    $r = $conn->query($q);
    $ro=$r->fetch_assoc();
    if($ro['status']=="LIBER"){
      echo '<div onclick="select(\''.$i.'.'.$j.'\')" class="seat" id="'.$i.'.'.$j.'"></div>';
    }
    else{
      echo '<div class="seat occupied" ></div>';
    }
  }

  echo '</div>';
}
for ($i=0; $i <$num_results; $i++) {
   $row = $result->fetch_assoc();
   //echo '<h1>Rand:'.htmlspecialchars(stripslashes($row['rand'])).'</h1>';
   //echo '<h1>Coloana:'.htmlspecialchars(stripslashes($row['coloana'])).'</h1><br>';
}
