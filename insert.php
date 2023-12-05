<?php
require "settings/init.php";

if (!empty($_POST["data"])) {
  $data = $_POST["data"];


  $sql = "INSERT INTO people (name) VALUES(:name)";
  $bind = [":name" => $data["name"]];

  $db->sql($sql, $bind, false);

  echo "test end";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="insert.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="data[name]" id="name">
    <button type="submit">Send Test</button>
  </form>
</body>

</html>