<?php
session_start();
  include_once 'header.php';
 ?>
    <div class="row">
    <div class="column right2" style="background-color:rgba(250,250,250,0.0);">
      <?php
      require_once 'generare_filme.php';
      ?>
      </div>
    </div>
    <?php
      include_once 'footer.php';
     ?>
