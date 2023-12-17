<?php
require "settings/init.php";

$therapies = $db->sql("SELECT * FROM therapy");
$dates = $db->sql("SELECT * FROM available_times ORDER BY fk_therapy ASC");

/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
*/
if (!empty($_POST["data"])) {
  $data = $_POST["data"];

  $insert = "INSERT INTO people (first_name, last_name, email, phone_number) 
              VALUES(:first_name, :last_name, :email, :phone_number)";
  $insert_bind = [
    ":first_name" => $data["first_name"],
    ":last_name" => $data["last_name"], ":email" => $data["email"],
    ":phone_number" => $data["phone_number"]
  ];

  $update = "UPDATE available_times SET participants = participants + 1 WHERE id = :id";
  $update_bind = [":id" => $data["date"]];

  $db->sql($insert, $insert_bind, false);
  $db->sql($update, $update_bind, false);

  /*
  $email = $data["email"];

  $msg = "Hi $data[name]";

  $recipient_mail = new PHPMailer(true);
  $owner_mail = new PHPMailer(true);

  try {
    //Server settings
    $recipient_mail->isSMTP(); //Send using SMTP
    $recipient_mail->Host       = 'websmtp.simply.com'; //Set the SMTP server to send through
    $recipient_mail->SMTPAuth   = true; //Enable SMTP authentication
    $recipient_mail->Username   = 'magnusholm@magnusholm.eu'; //SMTP username
    $recipient_mail->Password   = '#93u+ZbtNR+Sw9r'; //SMTP password
    $recipient_mail->SMTPSecure = "TLS"; //Enable implicit TLS encryption
    $recipient_mail->Port       = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $recipient_mail->setFrom('magnusholm@magnusholm.eu', 'Magnus');
    $recipient_mail->addAddress($email); //Add a recipient

    //Content
    $recipient_mail->Subject = 'Kvitering på bestilling';
    $recipient_mail->Body    = '<p>Customer</p>';
    $recipient_mail->IsHTML(true);

    $recipient_mail->send();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

  try {
    //Server settings
    $owner_mail->isSMTP(); //Send using SMTP
    $owner_mail->Host       = 'websmtp.simply.com'; //Set the SMTP server to send through
    $owner_mail->SMTPAuth   = true; //Enable SMTP authentication
    $owner_mail->Username   = 'magnusholm@magnusholm.eu'; //SMTP username
    $owner_mail->Password   = '#93u+ZbtNR+Sw9r'; //SMTP password
    $owner_mail->SMTPSecure = "TLS"; //Enable implicit TLS encryption
    $owner_mail->Port       = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $owner_mail->setFrom('magnusholm@magnusholm.eu', 'Magnus');
    $owner_mail->addAddress("magnusthestrup26@gmail.com"); //Add a recipient

    //Content
    $owner_mail->Subject = 'Der er en registrering';
    $owner_mail->Body    = '<p>Owner</p>';
    $owner_mail->IsHTML(true);

    $owner_mail->send();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  echo '<a href="/insert.php">Go back</a>';
*/
  header('Location: submitted.php');
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
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@500&family=Quicksand:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Work+Sans:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Booking</title>
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
  <main>
    <form action="booking.php" method="post">
      <div id="form_inputs">
        <div>
          <input type="text" name="data[first_name]" id="first_name" placeholder="Fornavn" required>
          <input type="text" name="data[last_name]" id="last_name" placeholder="Efternavn" required>
        </div>
        <input type="email" name="data[email]" id="email" placeholder="E-mail" required>
        <input type="tel" name="data[phone_number]" id="phone_number" placeholder="Telefon nummer" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}">
        <select name="data[fk_therapy]" id="fk_therapy" onchange="switchTherapy()">
          <option value="" disabled selected hidden>Vælg et forløb</option>
          <?php
          foreach ($therapies as $therapy) {
            echo "<option value=$therapy->id>$therapy->name</option>";
          }
          ?>
        </select>
        <textarea name="" id="" cols="30" rows="10" placeholder="Kommentar"></textarea>
        <button type="submit">Book</button>
      </div>
      <div id="date_selector">
        <?php
        //Current Unix timestamp
        $current_time = time();

        foreach ($therapies as $therapy) {
          echo "<div id='therapy_$therapy->id' class='hidden'>";
          foreach ($dates as $date) {
            if ($date->fk_therapy == $therapy->id && $date->participants < $date->max_participants && !(strtotime($date->date_time) < $current_time)) {
              $data_time_unix = strtotime($date->date_time);
              $day_formated = date('d-m-Y', $data_time_unix);
              $time_formated = date('H:i', $data_time_unix);
              echo "<input class='hidden' type='radio' id=$date->id name='data[date]' value=$date->id>";
              echo "<label for=$date->id> $day_formated <br> $time_formated</label>";
            }
          }
          echo "</div>";
        }
        ?>
      </div>
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