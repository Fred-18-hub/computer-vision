<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.svg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

    require_once ("connection.php");

    if (isset($_POST["submit"]))
    {
        if (empty($_POST["firstname"]) or empty($_POST["lastname"]) or empty($_POST["username"]) or empty($_POST["email"]) or empty($_POST["password"]) or empty($_POST["dob-day"]) or empty($_POST["dob-month"]) or empty($_POST["dob-year"]) or empty($_POST["region"]) or empty($_POST["city"]) or empty($_POST["address"]) or empty($_POST["phone"]))
        {
            echo 'Please Fill in the Blanks <br>';
            echo '<a href="signup.php">'.'Click here to go back'.'</a>';
        }
        else
        {
            $Firstname = $_POST["firstname"];
            $Lastname = $_POST["lastname"];
            $Username = $_POST["username"];
            $Email = $_POST["email"];
            $Password = $_POST["password"];
            $Day = $_POST["dob-day"];
            $Month = $_POST["dob-month"];
            $Year = $_POST["dob-year"];
            $Region = $_POST["region"];
            $City = $_POST["city"];
            $Address = $_POST["address"];
            $Phone = $_POST["phone"];
            $Fashion = $_POST["fashion"];
            $Tech = $_POST["tech"];
            $Raw = $_POST["raw"];
            $Other = $_POST["other"];
            
            $query = "insert into Members (Firstname, Lastname, Username, Email, Password, DOB, Region, City, Address, Phone, Warehouse) values('$Firstname', '$Lastname', '$Username', '$Email', '$Password', '$Year-$Month-$Day', '$Region', '$City', '$Address', '$Phone', '$Fashion, $Tech, $Raw, $Other')";
            @$result = mysqli_query($conn, $query);

            if ($result)
            {
                header("location:login_after_reg.php");
            }
            else
            {
                echo 'Username or Email already exists<br>';
                echo '<a href="signup.php">'.'Try again with different Email or Password'.'</a>';
            }
        }
    }
    else
    {
        header ("location:signup.php");
    }

?>