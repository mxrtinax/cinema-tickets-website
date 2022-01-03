<?php
  include_once 'header.php';
 ?>
 <style media="screen">
 @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');

 * {
   box-sizing: border-box;
 }

 .movie-container {
   margin: 20px 0;
 }


 .container {
   perspective: 1000px;
   margin-bottom: 30px;
   justify-content: center;
 }

 .seat {
   background-color: red;
   height: 20px;
   width: 20px;
   margin: 3px;
   border-top-left-radius: 10px;
   border-top-right-radius: 10px;
 }

 .seat.selected {
   background-color: #6feaf6;
 }

 .seat.occupied {
   background-color: #fff;
 }

 .seat:nth-of-type(10) {
   margin-right: 18px;
 }

 .seat:nth-last-of-type(10) {
   margin-left: 18px;
 }

 .seat:not(.occupied):hover {
   cursor: pointer;
   transform: scale(1.2);
 }

 .showcase .seat:not(.occupied):hover {
   cursor: default;
   transform: scale(1);
 }

 .showcase {
   background-color: rgba(0, 0, 0, 0.1);
   padding: 5px 10px;
   border-radius: 5px;
   color: #777;
   list-style-type: none;
   display: flex;
   justify-content: space-between;
   width:20%;
   margin-left: 40%;
 }

 .showcase li {
   display: flex;
   align-items: center;
   justify-content: center;
   margin: 0 10px;

 }

 .showcase li small {
   margin-left: 10px;
 }

 .row {
   display: flex;
   margin: 0 auto;
   justify-content: center;
 }

 .screen {
   background-color: #fff;
   height: 70px;
   width: 50%;
   margin: 0% 25% 15px;
   transform: rotateX(-45deg);
   box-shadow: 0 3px 10px rgba(255, 255, 255, 0.75);
 }


 </style>
 <div class="movie-container">

    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>Liber</small>
      </li>

      <li>
        <div class="seat selected"></div>
        <small>Selectat</small>
      </li>

      <li>
        <div class="seat occupied"></div>
        <small>Ocupat</small>
      </li>
    </ul>

    <div class="container">
      <div class="screen"></div>
      <?php
        include_once 'generareScaune.php';
       ?>
       <button onclick="salvare()" type="button" name="submit">Rezerva</button>
    </div>

    <script src="script.js"></script>
</div>
<script>
  function select(id){
    //alert(id);
    var c1 = document.getElementById(id).className;
    //alert(c1);
    if (c1 == 'seat') {
      document.getElementById(id).className = "seat selected";
    }
    else if (c1 == "seat selected") {
      document.getElementById(id).className = "seat";
    }
  }

  function salvare(){
    var proiectie = window.location.href.split(/[=]+/)[1];
    var t = "rezervare.php?proiectie="+proiectie;
    var myElements = document.getElementsByClassName("seat selected");
    for(var counter = 1; counter < myElements.length; counter++){
      t = t + "&l" + counter + "=" + myElements[counter].id;
      //alert(t);
    }
    //alert(proiectie);
    window.location.href = t;
  }
</script>
