<?php

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
$id_proiectie = $_GET['proiectie'];
$query2 = "Select nr_coloane from sala where id_sala = (Select id_sala from proiectie where id_proiectie = ".$id_proiectie.");";
$result2 = $conn->query($query2);
$row = $result2->fetch_assoc();
echo $row['nr_coloane']/2;
