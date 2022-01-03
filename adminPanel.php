
<div class="row">
  <div class="column left" style="background-color:rgba(250,250,250,0.0);">
  <h1>Inserare Sala</h1>
  <form action="includes/creare_sala.inc.php" method="post">
    <div class="container">
      <label for="numeSala"><b>Nume Sala</b></label>
      <input type="text" name="numeSala" id="numeSala" required>

      <label for="nrLocuri"><b>Numar locuri</b></label>
      <input type="text" name="nrLocuri" id="nrLocuri" required>

      <label for="nrRanduri"><b>Numar randuri</b></label>
      <input type="text" name="nrRanduri" id="nrRanduri" required>

      <label for="nrColoane"><b>Numar coloane</b></label>
      <input type="text" name="nrColoane" id="nrColoane" required>

      <button type="submit" name="salaNoua" class="registerbtn">Creeaza</button>
    </div>

  </form>
</div>
<div class="column left" style="background-color:rgba(250,250,250,0.0);">
<h1>Inserare Film</h1>
<form action="includes/creare_film.inc.php" method="post" enctype="multipart/form-data">
  <div class="container">
    <label for="titlu"><b>Titlu</b></label>
    <input type="text" name="titlu" id="titlu" required>

    <textarea id="descriere" name="descriere" rows="4" ></textarea>

    <label for="durata"></br><b>Durata (minute)</b></label>
    <input type="text" name="durata" id="durata" required>

    <label for="durata"><b>Imagine</b></br></label>
    <input type="file" name="file">

    <button type="submit" name="filmNou" class="registerbtn">Creeaza</button>

  </div>

</form>
</div>

<div class="column left" style="background-color:rgba(250,250,250,0.0);">
<h1>Inserare Proiectie</h1>
<form action="includes/creare_proiectie.inc.php" method="post" enctype="multipart/form-data">
<label>Selecteaza Titlul</label></br>
<input type="text" list="filme" name="titlu">
<datalist class="" id="filme" style="width:100px;">
  <?php
    include_once 'generareTitluri.php';
   ?>
 </datalist></br></br>
<label>Selecteaza Sala</label></br>
<input type="text" list="sali" name="sala">
<datalist class="" id="sali" style="width:100px;">
 <?php
   include_once 'generareSala.php';
  ?>
</datalist></br>
  <label for="data"></br><b>Data</b></label><br>
  <input type="date" name="data" id="data" required>

  <label for="ora"></br><b>Ora</b></label><br>
  <input type="time" name="ora" id="ora" required>

  <button type="submit" name="proiectieNoua" class="registerbtn">Creeaza</button>
</form>
</div>

<div class="column left" style="background-color:rgba(250,250,250,0.0);">
<h1>Inserare Proiectie</h1>
<form action="includes/creare_proiectie.inc.php" method="post" enctype="multipart/form-data">
<label>Selecteaza Titlul</label></br>
<input type="text" list="filme" name="titlu">
<datalist class="" id="filme" style="width:100px;">
  <?php
    include_once 'generareTitluri.php';
   ?>
 </datalist></br></br>
<label>Selecteaza Sala</label></br>
<input type="text" list="sali" name="sala">
<datalist class="" id="sali" style="width:100px;">
 <?php
   include_once 'generareSala.php';
  ?>
</datalist></br>
  <label for="data"></br><b>Data</b></label><br>
  <input type="date" name="data" id="data" required>

  <label for="ora"></br><b>Ora</b></label><br>
  <input type="time" name="ora" id="ora" required>

  <button type="submit" name="proiectieNoua" class="registerbtn">Creeaza</button>


</form>
</div>





</div>
