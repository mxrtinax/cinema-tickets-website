<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

for($i=1;$i<=20;$i++){
  for($j=1;$j<=15;$j++){
    $sql = "insert into loc(id_proiectie, rand,coloana, status) values (6,".$i.",".$j.",'LIBER');";
    $stmt = mysqli_stmt_init($conn);
    if ($conn->query($sql) === TRUE) {
      echo "loc inserat cu succes";
      //header("location: ../admin.php?error=none");
    } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
  }
}
