<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
if (isset($_POST["filmNou"]) /*&& isset($_FILES["file"])*/) {
  //echo "<h1>it works!</h1>";
  $titlu = mysqli_real_escape_string($conn,$_POST["titlu"]);
  $descriere = mysqli_real_escape_string($conn,$_POST["descriere"]);
  $durata = mysqli_real_escape_string($conn,$_POST["durata"]);


  $sql = "INSERT INTO film(titlu, descriere,durata) VALUES ('".$titlu."','".$descriere."','".$durata."');";
  $stmt = mysqli_stmt_init($conn);
  $targetDir = "img/";
  print_r($_FILES);
  $dirpath = dirname(getcwd());
  //echo getcwd();
  //echo $dirpath;
  $fileName = basename($_FILES["file"]["name"]);

  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

  if(!empty($fileName)){
      $allowTypes = array('jpg','png','jpeg','gif','pdf');
      if(in_array($fileType, $allowTypes)){
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].'/img/'.$titlu.'.'.$fileType)){
              $insert = $conn->query("INSERT into imagini (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
              if($insert){
                  $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                  header("location: ../admin.php?error=none");
              }else{
                  $statusMsg = "File upload failed, please try again.";
              }
          }else{
              $statusMsg = "Sorry, there was an error uploading your file.";
          }
      }else{
          $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
      }
  }else{
      $statusMsg = 'Please select a file to upload.';
  }

  // Display status message
  echo $statusMsg;


  if ($conn->query($sql) === TRUE) {
    echo "Film introdus cu succes";
    //header("location: ../admin.php?error=none");
  } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

  $conn->close();
  exit();
}
else{
  header("location: ../admin.php?error=isset");
}
?>
