<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
$query = "SELECT * FROM film;";
$result = $conn->query($query);

$num_results = $result->num_rows;

//echo "<p>Number of movies found: ".$num_results."</p>";

for ($i=0; $i <$num_results; $i++) {
   $row = $result->fetch_assoc();
   echo '<option style="color:black;" value ="'.htmlspecialchars(stripslashes($row['titlu'])).'">';
}
