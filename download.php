<?php
$url =
'http://phpqrcode.sourceforge.net/qrsample.php?data=52148%23220.00&ecc=L&matrix=4?download';

$img = 'imagine_descarcata.png';

file_put_contents($img, file_get_contents($url));

echo "File downloaded!";
  ?>
