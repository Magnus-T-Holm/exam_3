<?php

$bookings = $db->sql("SELECT * FOM bookings");

foreach ($bookings as $booking){
  echo $booking->blogname . "<br>";
}

?>