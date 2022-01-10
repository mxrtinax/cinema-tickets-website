<?php
session_start();
  include_once 'header.php';
 ?>
    <!--<h1 class="titlu" style="margin-left:2vw;">Cinema Cerce</h1>-->

    <div class="row">
      <div class="column left" style="background-color:rgba(250,250,250,0.0);">
        <img src="img/user2.png" alt="imagine profil" style="width:80%;display:inline;margin-left:10%;">
        <?php include 'generare_profil.php'; ?>

      </div>

      <div class="column right" style="background-color:rgba(250,250,250,0.0);">
        <hr>
        <p>Rezervarile tale</p>
        <hr>
        <table>
          <tr>
            <th>Nr.</th>
            <th>Film</th>
            <th>Sala</th>
            <th>Data</th>
            <th>Ora</th>
          </tr>
          <?php include 'generare_istoric.php' ?>
        </table>
        <p><a href = "generare_pdf.php"><button>Desccarca bilet la urmatorul film</button></a></p>;
      </div>
    </div>

    <?php
  //  echo '<h1>--vtuv'.$_SESSION["email"].'</h1>';

      include_once 'footer.php';
     ?>
