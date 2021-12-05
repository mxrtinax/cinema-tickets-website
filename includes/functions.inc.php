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
    header("location: ../signup.php?error=none");
  } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }

$conn->close();
  exit();
}

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
    }
  //  echo $pwdHashed.$parola;
  //  echo PHP_EOL;
  //  echo password_hash($parola, PASSWORD_DEFAULT);
  }
  $checkPwd = password_verify($parola,$pwdHashed);

  if(password_verify($parola,$pwdHashed) === false){
    echo "xxxxxxx";
    header("location: ../login.php?error=wronglogin");
    exit();
  }
  else  {
    session_start();
    $_SESSION["id_user"] = $emailExists["id_user"];
      $_SESSION["mail"] = $emailExists["mail"];
      header("location: ../browse.php");
      exit();
  }
}
