<?php
  include_once 'header.php';
 ?>
<form class="modal-content animate" action="includes/login.inc.php" method="post">

  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="ion@gmail.com" name="email" required>

    <label for="psw"><b>Parola</b></label>
    <input type="password" placeholder="parola" name="pwd" required>

    <button type="submit" name="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="color:white;">
    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</div>




<?php
if(isset($_GET["error"])){
  if ($_GET["error"] == "emptyinput") {
    echo "<p>Completeaza toate camopurile!</p>";
  }
  else if ($_GET["error"] == "wronglogin") {
    echo "<p>data invalide!</p>";
  }
}

?>

<?php
  include_once 'footer.php';
 ?>
