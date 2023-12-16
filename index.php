<?php

$bookings = $db->sql("SELECT * FROM bookings");

foreach ($bookings as $booking){
  echo $booking->blogname . "<br>";
}

?>