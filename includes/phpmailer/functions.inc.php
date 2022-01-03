<?php

function emptyInputSignup($email,$nume,$prenume,$parola,$parolaRepetata){
  $result;
  if(empty($nume) || empty($prenume) || empty($email) || empty($parola) || empty($parolaRepetata)){
    $result = true;
  }
  else {
  $result = false;
  }
  return $result;
}
function invalidMail($email){
$result;
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $result = true;
}
else {
$result = false;
}
return $result;
}

function pwdMatch($parola,$parolaRepetata){
$result;
if(filter_var($parola !== $parolaRepetata)){
  $result = true;
}
else {
$result = false;
}
return $result;
}

function mailExists($conn, $email){
  $sql = "SELECT * FROM users WHERE mail = '".$email."';";
  $result = $conn->query($sql);
  $stmt = mysqli_stmt_init($conn);
  if ($result->num_rows > 0) {
    return true;
    exit();
  }
  return false;
}


function createUser($conn,$email, $nume, $prenume, $parola){
  $hashedPassword = password_hash($parola, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users(mail, nume, prenume,parola) VALUES ('".$email."','".$nume."','".$prenume."','".$hashedPassword."');";
  $stmt = mysqli_stmt_init($conn);

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    require_once 'phpmailer/mailContNou.php';
    header("location: ../home.php");
    }
  else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

$conn->close();
  exit();
}
//------------------------------------------------------------------
function creareSala($conn,$numeSala, $nrLocuri, $nrColoane, $nrRanduri){
  $sql = "INSERT INTO sala(nume, nr_locuri, nr_randuri, nr_coloane) VALUES ('".$numeSala."','".$nrLocuri."','".$nrRanduri."','".$nrColoane."');";
  $stmt = mysqli_stmt_init($conn);

  if ($conn->query($sql) === TRUE) {
    echo "Sala creata cu succes";
    header("location: ../admin.php?error=none");
  } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

$conn->close();
  exit();
}

//------------------------------------------------------------------
function creareFilm($conn,$titlu, $descriere, $durata, $file){
  $sql = "INSERT INTO film(titlu, descriere,durata) VALUES ('".$titlu."','".$descriere."','".$durata."');";
  $stmt = mysqli_stmt_init($conn);
  echo $file;
  $targetDir = "img/";
  $fileName = basename($_FILES[$file]["name"]);
  $fileName = "b.jpg";
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  echo $targetFilePath." -- ".$fileType;

  if(!empty($fileName)){
      echo "1";
      $allowTypes = array('jpg','png','jpeg','gif','pdf');
      if(in_array($fileType, $allowTypes)){
        echo "2";
          // Upload file to server
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
              // Insert image file name into database
              echo "3";
              $insert = $conn->query("INSERT into imagini (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
              if($insert){
                echo "4";
                  $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
              }else{
                echo "5";
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
    echo "Sala creata cu succes";
    //header("location: ../admin.php?error=none");
  } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

$conn->close();
  exit();
}

///-------------------------------------------------------------------
function emptyInputLogin($email,$parola){
  $result;
  if(empty($email) || empty($parola)){
    $result = true;
  }
  else {
  $result = false;
  }
  return $result;
}
function loginUser($conn, $email,$parola)
{
  $emailExists = mailExists($conn, $email);
  if ($emailExists === false) {
    header("location: ../login.php?error=wronglogin");
    exit();
  }
  $line = mysqli_query($conn,"select * from users where mail = '$email'");
  if (mysqli_num_rows($line)>0) {
    if($rowData = mysqli_fetch_array($line)){
      $pwdHashed = $rowData["parola"];
      $id_user = $rowData["id_user"];
      $isAdmin = $rowData["isAdmin"];
    }
  //  echo $pwdHashed.$parola;
  //  echo PHP_EOL;
  //  echo password_hash($parola, PASSWORD_DEFAULT);
  }
  $checkPwd = password_verify($parola,$pwdHashed);

  if(password_verify($parola,$pwdHashed) === false){
    header("location: ../login.php?error=wronglogin");
    exit();
  }
  else  {
    session_start();
    $_SESSION["id_user"] = $id_user;
      $_SESSION["email"] = $email;
      $_SESSION["isAdmin"] = $isAdmin;
      header("location: ../browse.php");
      exit();
  }
}
