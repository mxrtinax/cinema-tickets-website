<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
$date = date('y-m-d');


$query = "SELECT * FROM film INNER JOIN proiectie ON film.id_film = proiectie.id_film where proiectie.data < DATE_ADD((current_date()), INTERVAL 1 MONTH) and proiectie.data >= current_date() ;";
$result = $conn->query($query);

$num_results = $result->num_rows;

//echo "<p>Number of movies found: ".$num_results."</p>";

for ($i=0; $i <$num_results; $i++) {
   $row = $result->fetch_assoc();
   echo '<div class="card grid-container" style="margin-top: 1vw;">';
   echo '<div class="item1">';
   echo '<img src="img/'.htmlspecialchars(stripslashes($row['titlu'])).'.jpg" alt="" style="width:300px;height:200px;margin-top: 20%;">';
   echo '</div>';
   echo '<div class="item2">';
   echo '<h1>'.htmlspecialchars(stripslashes($row['titlu'])).'</h1>';
   echo '<p class="descriere">'.htmlspecialchars(stripslashes($row['descriere'])).'</p>';
   echo '<p>'.htmlspecialchars(stripslashes($row['data'])).'</p>';
   echo '<p>'.htmlspecialchars(stripslashes($row['ora'])).'</p>';
   echo '<p><a href = "bilet.php?proiectie='.$row['id_proiectie'].'"><button>Rezerva acum</button></a></p>';
   echo '</div>';
   echo '</div>';
}
