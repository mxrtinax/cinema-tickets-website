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
      </div>
      <div class="column right" style="background-color:rgba(250,250,250,0.0);">
        <hr>
        <p>Duminica - 17 Octombrie</p>
        <hr>
        <div class="card grid-container">
          <div class="item1"><!--  film   1     -->
            <img src="img/coco2.jpg" alt="coco" style="width:300px;height:200px;margin-top: 20%;">
          </div>
          <div class="item2">
            <h1>Coco</h1>
            <p class="descriere">In Santa Cecilia, Mexico, Miguel dreams of becoming a musician, even though his family strictly forbids it. His great-great-grandmother Imelda was married to a man who left her and their daughter Coco to pursue a career in music, and when he never returned, Imelda banished music from her family's life before starting a shoemaking business. Miguel now lives with the elderly Coco and their family, including Miguel's parents and his abuelita, who are all shoemakers. He secretly idolizes Ernesto de la Cruz, a famous musician who died decades earlier, and teaches himself to play guitar from Ernesto's old films...</p>
            <p>18:00</p>
            <p><button >Rezerva acum</button></p>
          </div>
        </div>
        <div class="card grid-container" style="margin-top: 1vw;">
          <div class="item1">
            <img src="img/storks2.jpg" alt="storks" style="width:300px;height:200px;margin-top: 20%;">
          </div>
          <div class="item2">
            <h1>Storks</h1>
            <p class="descriere">The story begins as storks, once tasked with bringing babies to new parents, have converted to e-commerce. Their last child, not delivered, the orphan Tulipe, has just turned 18 and Junior, an ambitious stork, is charged by his boss Hunter to get rid of him. Unfortunately for Junior, who can't get Tulipe back for good, she starts the baby machine... A new baby is born, and Junior and Tulipe agree to secretly deliver it before Hunter notices.</p>
            <p>20:30</p>
            <p><button>Rezerva acum</button></p>
          </div>
        </div>

        <hr>
        <p>Duminica - 24 Octombrie</p>
        <hr>
        <div class="card grid-container">
          <div class="item1">
            <img src="img/wonder2.jpg" alt="coco" style="width:300px;height:200px;margin-top: 20%;">
          </div>
          <div class="item2">
            <h1>Wonder</h1>
            <p class="descriere">Based on the New York Times bestseller, this movie tells the incredibly inspiring and heartwarming story of August Pullman, a boy with facial differences who enters the fifth grade, attending a mainstream elementary school for the first time.
            <p>18:00</p>
            <p><button>Rezerva acum</button></p>
          </div>
        </div>
        <div class="card grid-container" style="margin-top: 1vw;">
          <div class="item1">
            <img src="img/mowgli2.jpg" alt="storks" style="width:300px;height:200px;margin-top: 20%;">
          </div>
          <div class="item2">
            <h1>The jungle book</h1>
            <p class="descriere">After a threat from the tiger Shere Khan forces him to flee the jungle, a man-cub named Mowgli embarks on a journey of self discovery with the help of panther Bagheera and free-spirited bear Baloo.</p>
            <p>20:30</p>
            <p><button>Rezerva acum</button></p>
          </div>
        </div>

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
