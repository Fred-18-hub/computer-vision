<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.svg">
    <script src="js/bootstrap.min.js"></script>
</head>
</html>

<?php

@$conn = mysqli_connect ("localhost", "root", "mysql", "WareHouse");

if (!$conn)
{
    die ("Connection failed");
}

?>