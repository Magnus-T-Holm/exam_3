<?php
require "settings/init.php";
$therapies = $db->sql("SELECT * FROM therapy");
$dates = $db->sql("SELECT * FROM available_times ORDER BY fk_therapy ASC, date_time");
$people = $db->sql("SELECT * FROM people");

// foreach ($bookings as $booking) {
// echo "<p>$booking->first_name $booking->last_name</p>";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@500&family=Quicksand:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Work+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Oversigt</title>
</head>

<body>
  <header>
    <nav class="desktop-nav">
      <div>
        <img src="img/MFA_Blomst-removebg-preview.svg">
        <h1>Mathilde Friis-Andersen</h1>
      </div>

      <ul>
        <li><a href="#">Forside</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="#">Tilbyder</a></li>
      </ul>
    </nav>

    <nav class="mobile-nav">
      <i onclick="mobileMenu()" class="fa-solid fa-bars"></i>
    </nav>

    <div id="mobile_overlay">
      <i onclick="mobileMenu()" class="fa-solid fa-xmark"></i>
      <ul>
        <li><a href="#">Forside</a></li>
        <li><a href="booking.php">Booking</a></li>
        <li><a href="#">Tilbyder</a></li>
      </ul>
    </div>
  </header>
  <main id="dashboard">
    <div id="dashboard_nav">
      <a href="dashboard.php">Oversigt</a>
      <a href="setup_dates.php">Opret tider</a>
    </div>
    <select name="data[fk_therapy]" id="fk_therapy" onchange="switchTherapy()">
      <?php
      foreach ($therapies as $therapy) {
        echo "<option value=$therapy->id>$therapy->name</option>";
      }
      ?>
    </select>

    <?php
    //Current Unix timestamp
    $current_time = time();

    foreach ($therapies as $therapy) {
      echo "<div data-therapy-type='$therapy->name'>";

      foreach ($dates as $date) {
        if ($date->fk_therapy == $therapy->id && $date->participants < $date->max_participants && !(strtotime($date->date_time) < $current_time)) {
          $data_time_unix = strtotime($date->date_time);
          $day_formated = date('d-m-Y', $data_time_unix);
          $time_formated = date('H:i', $data_time_unix);
          echo "<div id='$date->id' class='date_devider' onclick='toggleDateInfo($date->id)'>";
          echo "<p>$date->participants/$date->max_participants</p> <p>$day_formated - $time_formated</p><i id='arrow_$date->id' class='fa-solid fa-chevron-down'></i>";
          echo "</div>";
          echo "<div id='participant_container_$date->id' class='participant_containers hidden'>";
          foreach ($people as $person) {
            if ($person->fk_availabletime == $date->id) {
              echo "<div class='person'><div><p>$person->first_name $person->last_name</p><p>Email: $person->email</p><p>Telefon: $person->phone_number</p></div> <button class='delete'>Slet</button></div>";
            }
          }
          echo "</div>";
        }
      }
      echo "</div>";
    }
    ?>
  </main>
  <footer>
    <div>
      <h5>Social Media</h5>
      <div class="social-media">
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-linkedin"></i>
      </div>
    </div>
    <div>
      <h4>Mathilde Friis-Andersen</h4>
      <p>© 2023</p>
      <p>CVR: 44386933</p>
    </div>
    <div>
      <h5>Kontack</h5>
      <a>+45 27 37 38 97</a>
      <a>info@mathildefriisandersen.com</a>
    </div>
  </footer>
  <script src="js/java.js"></script>
  <script src="js/dashboard.js"></script>
</body>

</html>