<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';


$query = "SELECT * FROM sala where ;";
$result = $conn->query($query);

$num_results = $result->num_rows;
