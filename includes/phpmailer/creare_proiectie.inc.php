<?php
if (isset($_POST["proiectieNoua"])) {
  //echo "<h1>it works!</h1>";
  $titlu = $_POST["titlu"];
  $sala = $_POST["sala"];
  $data = $_POST["data"];
  $ora = $_POST["ora"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  $line = mysqli_query($conn,"select * from sala where nume = '$sala'");
  if (mysqli_num_rows($line)>0) {
    if($rowData = mysqli_fetch_array($line)){
      $id_sala = $rowData["id_sala"];
      $nr_randuri = $rowData["nr_randuri"];
      $nr_coloane = $rowData["nr_coloane"];
    }
  }
  echo "-".$titlu."-";
  $line = mysqli_query($conn,"select * from film where titlu = '$titlu'");
    if (mysqli_num_rows($line)>0) {
      if($rowData = mysqli_fetch_array($line)){
        $id_film = $rowData['id_film'];
      }
    }
  $sql = "INSERT INTO proiectie(id_film, id_sala, data, ora) VALUES ('".$id_film."',".$id_sala.",'".$data."','".$ora."');";
  $stmt = mysqli_stmt_init($conn);
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    //header("location: ../signup.php?error=none");
  } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
  echo $id_film;
  echo $sala;
  echo "-".$ora."   ".$data."   ".$id_sala;
  //$sql = "select * from proiectie where id_film = 1 and id_sala = 1 and data = '2021-12-31' and ora = '14:30';";
  $sql = "select * from proiectie where id_film='".$id_film."' and id_sala = '".$id_sala."' and data ='".$data."'and ora='".$ora."';";
  if ($result = $conn->query($sql)){
    while($row = $result->fetch_assoc()){
      if($row['id_proiectie']){
        $id_proiectie = $row["id_proiectie"];
        break;
      }
    }
  }
  else {
    echo "fals";
  }
echo $id_proiectie;
  for($i=1;$i<=$nr_randuri;$i++){
    for($j=1;$j<=$nr_coloane;$j++){
      $sql = "insert into loc(id_proiectie, rand,coloana, status) values (".$id_proiectie.",".$i.",".$j.",'LIBER');";
      $stmt = mysqli_stmt_init($conn);
      if ($conn->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
    }
  }
  header("location: ../admin.php?error=none");
$conn->close();
  exit();
}
