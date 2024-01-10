<?php
require "settings/init.php";

$therapies = $db->sql("SELECT * FROM therapy");

if (!empty($_POST["data"])) {
  $data = $_POST["data"];

  $sql = "INSERT INTO available_times (date_time, max_participants, fk_therapy) VALUES(:date_time, :max_participants, :fk_therapy)";
  $bind = [":date_time" => $data["date_time"], ":max_participants" => $data["max_participants"], ":fk_therapy" => $data["fk_therapy"]];

  $db->sql($sql, $bind, false);

  header('Location: setup_dates.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&family=Rasa:wght@300;400&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Document</title>
</head>

<body>
  <header>
    <nav class="desktop-nav">
      <div>
        <img src="img/MFA_Blomst-removebg-preview.svg">
        <h1>Mathilde Friis-Andersen</h1>
      </div>

      <ul>
        <li><a href="/">Forside</a></li>
        <li><a href="/booking">Booking</a></li>
        <li><a href="/jeg_tilbyder">Tilbyder</a></li>
      </ul>
    </nav>

    <nav class="mobile-nav">
      <i onclick="mobileMenu()" class="fa-solid fa-bars"></i>
    </nav>

    <div id="mobile_overlay">
      <i onclick="mobileMenu()" class="fa-solid fa-xmark"></i>
      <ul>
        <li><a href="/">Forside</a></li>
        <li><a href="/booking">Booking</a></li>
        <li><a href="/jeg_tilbyder">Tilbyder</a></li>
      </ul>
    </div>
  </header>
  <main>
    <form action="setup_dates.php" method="post">
      <label for="fk_therapy">Vælg behandling</label>
      <select name="data[fk_therapy]" id="fk_therapy">
        <?php
        foreach ($therapies as $therapy) {
          echo "<option value=$therapy->id>$therapy->name</option>";
        }
        ?>
      </select>

      <label for="date_time">Vælg dato og tidspunkt</label>
      <input type="datetime-local" name="data[date_time]" id="date_time" required>

      <label for="max_participants">Max antal deltager</label>
      <input type="number" name="data[max_participants]" id="max_participants" required>

      <button type="submit">Opret forløb</button>
    </form>
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
  <script src="js/booking.js"></script>
  <script src="js/java.js"></script>
</body>

</html>