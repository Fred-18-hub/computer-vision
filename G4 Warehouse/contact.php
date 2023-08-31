<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.svg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
</head>
<body>

<?php

  if (isset($_POST["send"]))
  {
    if (empty($_POST["email"]) or empty($_POST["message"]))
    {
      echo 'Please enter both Email and Message before clicking on Send <br>';
      echo '<a href="index.php">'.'Click here to go back'.'</a>';
    }
    else
    {
      echo 'Message sent successfully! <br>';
      echo '<a href="index.php">'.'Click here to go back'.'</a>';
    }
  }

?>


<script src="js/bootstrap.min.js"></script>
</body>
</html>

