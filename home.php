<?php
  include_once 'header.php';
 ?>
    <!--<h1 class="titlu" style="margin-left:2vw;">Cinema Cerce</h1>-->

    <div class="row">
      <div class="column left" style="background-color:rgba(250,250,250,0.0);">
            <h2 style="margin-top:20%;">Nu ai cont?</h2>
            <a href="signup.php"><button>Inregistrare</button></a>
            <h2>Daca ai cont</h2>

            <a href="login.php"><button>Autentificare</button></a>
            <div style="align-items:center;justify-content:center;">
              <p style="margin-left:40%;">Contact la:</p>
              <img src="img/mailto.png" style="margin:auto;" alt="cinemacerce@gmail.com">
            </div>

      </div>
      <div class="column right" style="background-color:rgba(250,250,250,0.0);">
        <div class="alert" style="padding:20px;background-color:rgb(20,20,20);color:white;padding: 4px;">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <h2>Recomandare de film</h2>
          <?php require_once 'get_next_film.php'; ?>
        </div>
        <?php
          require_once 'generare_filme.php';
        ?>
      </div>
    </div>

<div id="id01" class="modal">

  <form class="modal-content animate" action="includes/login.inc.php" method="post">


    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="ion@gmail.com" name="uname" required>

      <label for="psw"><b>Parola</b></label>
      <input type="password" placeholder="parola" name="psw" required>

      <button type="submit">Login</button>
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
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<?php
  include_once 'footer.php';
 ?>
