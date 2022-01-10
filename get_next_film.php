<?php

require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

$link = 'https://www.cinemagia.ro/filme-in-curand/';

$homepage = file_get_contents($link);

$cautaFilm = explode('<h2>',$homepage);
$cautaFilm = $cautaFilm[1];
$cautaFilm = explode('<img src=', $cautaFilm);
$cautaFilm = $cautaFilm[0];
$cautaFilm = explode('</a>',$cautaFilm);
$cautaFilm = $cautaFilm[0];
echo $cautaFilm.'</a>';
