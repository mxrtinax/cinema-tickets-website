<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
$date = date('y-m-d');


$query = "SELECT * FROM film INNER JOIN proiectie ON film.id_film = proiectie.id_film where proiectie.data < DATE_ADD((current_date()), INTERVAL 1 MONTH) and proiectie.data >= current_date() ;";
$result = $conn->query($query);


//echo "<p>Number of movies found: ".$num_results."</p>";

for ($i=0; $i <$4; $i++) {
  $row = $result->fetch_assoc();
   $sql = $query = "SELECT nume FROM sala where id_sala = '".$row["id_sala"]."';";
   $res2 = $conn->query($sql);
   $row2 = $res2->fetch_assoc();
   echo '<div class="card grid-container" style="margin-top: 1vw;">';
   echo '<div class="item1" style="width:400px;">';
   echo '<img src="img/'.htmlspecialchars(stripslashes($row['titlu'])).'.jpg" alt="" style="width:300px;height:200px;margin-top: 20px;">';
   echo '</div>';
   echo '<div class="item2">';
   echo '<h1>'.htmlspecialchars(stripslashes($row['titlu'])).'</h1>';
   echo '<p class="descriere">'.htmlspecialchars(stripslashes($row['descriere'])).'</p>';
   echo '<p>'.htmlspecialchars(stripslashes($row['data'])).'  '.htmlspecialchars(stripslashes($row2['nume'])).'</p>';
   echo '<p>'.htmlspecialchars(stripslashes($row['ora'])).'</p>';
   echo '<p><a href = "bilet.php?proiectie='.$row['id_proiectie'].'"><button>Rezerva acum</button></a></p>';
   echo '</div>';
   echo '</div>';
}
