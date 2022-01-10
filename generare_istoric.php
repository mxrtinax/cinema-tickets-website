<?php
//session_start();
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
$id_user = $_SESSION["id_user"];
//$sql2 = "select * from film where id_film =1";
//echo $sql2;
//$result2 = $conn->query($sql2);
//while($row2= $result2 -> fetch_assoc()){
  //echo $row2["titlu"];
//if($result2 = $conn->query($sql2)){
  //echo $result2->num_rows;
//$row2 = $result2.fetch_assoc();
//}

$query = 'SELECT * FROM  proiectie where id_proiectie in (select id_proiectie from loc where id_loc in (select id_loc from rezervare where id_user = '.$id_user.'));';

$result = $conn->query($query);

$num_results = $result->num_rows;

//echo "<p>Number of movies found: ".$num_results."</p>";

for ($i=0; $i <$num_results; $i++) {
  $row = $result->fetch_assoc();
  $sql2 = "select * from film where id_film =".$row["id_film"];
  $result2 = $conn->query($sql2);
  while($row2= $result2 -> fetch_assoc()){
    $titlu = $row2["titlu"];
}

  $sql3 = "select nume from sala where id_sala = ".$row["id_sala"].";";
  $result3 = $conn->query($sql3);
  while($row3= $result3 -> fetch_assoc()){
    $numeSala = $row3["nume"];
}
  echo '<tr>';
  echo  '<td>'.$i+1 .'</td>';
  echo  '<td>'.$titlu.'</td>';
  echo  '<td>'.$numeSala.'</td>';
  echo  '<td>'.$row["data"].'</td>';
  echo  '<td>'.$row["ora"].'</td>';
  echo '</tr>';

  //echo '<p><b>id proiectie:</b></p><p>'.$row["id_proiectie"].'</p>' ;
  //echo '<p><b>id film:</b></p><p>'.$row["id_film"].'</p>';
  //echo '<p><b>id sala:</b></p><p>'.$row["id_sala"].'</p>';

  //echo '<p><b>data:</b></p><p>'.$row["data"].'</p>';
  //echo '<p><b>ora:</b></p><p>'.$row["ora"].'</p>';
}
