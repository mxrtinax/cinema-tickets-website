<?php
  $serverName = "localhost";
  $dBUsername = "root";
  $dBPassword = "parola123";
  $dBName = "filme";

  $conn = new mysqli($serverName, $dBUsername, $dBPassword, $dBName);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //else{echo "it works";}
