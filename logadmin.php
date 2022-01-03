<?php
require_once 'includes/dbh.inc.php';
$sql = "SELECT * FROM admini WHERE mail = '".$_SESSION["email"]."';";
$result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo '<a href="admin.php" class="w3-bar-item w3-button w3-right"><h1 class="w3-text-yellow" style="text-shadow:1px 1px 0 #444; margin-right:20px"><b>Admin tools</b></h1></a>';
}
//$stmt = mysqli_stmt_init($conn);
//if($_SESSION["email"] == 'daniel@gmail.com')
//{echo '<a href="admin.php" class="w3-bar-item w3-button w3-right"><h1 class="w3-text-yellow" style="text-shadow:1px 1px 0 #444; margin-right:20px"><b>Admin tools</b></h1></a>';
//}
 ?>
