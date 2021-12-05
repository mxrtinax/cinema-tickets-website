<?php
  include_once 'header.php';
 ?>
<div style="margin-left:20%;margin-right:20%;">
 <form action="includes/signup.inc.php" method="post">
   <div class="container">
     <h2>Inregistrare</h2>
     <p>Completeaza cu datele personale pentru a crea un cont nou</p>
     <hr>
     <label for="email"><b>Email</b></label>
     <input type="text" placeholder="ion@mail.com" name="email" id="email" required>

     <label for="nume"><b>Nume</b></label>
     <input type="text" placeholder="popescu" name="nume" id="nume" required>

     <label for="prenume"><b>Prenume</b></label>
     <input type="text" placeholder="ion" name="prenume" id="prenume" required>

     <label for="psw"><b>Parola</b></label>
     <input type="password" placeholder="parola" name="pwd" id="pwd" required>

     <label for="psw-repeat"><b>Repeta parola</b></label>
     <input type="password" placeholder="parola" name="pwdrepeat" id="pwdrepeat" required>
     <hr>
     <p>Creand un cont esti de acord cu <a href="#">Termenii si conditiile</a> site-ului.</p>

     <button type="submit" name="submit" class="registerbtn">Register</button>
   </div>

 </form>
 <?php
 if(isset($_GET["error"])){
   if ($_GET["error"] == "emptyinput") {
     echo "<p>Completeaza toate camopurile!</p>";
   }
   else if ($_GET["error"] == "paroleleNuCorespund") {
     echo "<p>Parolele nu corespund!</p>";
   }
   else if ($_GET["error"] == "mailulEsteFolosit") {
     echo "<p>Mailul este folosit!</p>";
   }
   else if ($_GET["error"] == "isset") {
     echo "<p>Somthing went wrong, try again!</p>";
   }
   else if ($_GET["error"] == "none") {
     echo "<p>Inregistrare reusita!</p>";
   }

 }

 ?>
</div>


 <?php
   include_once 'footer.php';
  ?>
