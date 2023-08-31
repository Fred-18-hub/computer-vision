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

    require_once ("connection.php");

    if(isset($_POST['update']))
    {
        $UserID = $_GET['ID'];
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

        $query = " UPDATE Members SET Firstname = '".$Firstname."', Lastname = '".$Lastname."', Username='".$Username."', Password ='".$Password."', DOB='".$Year."-".$Month."-".$Day."', Region='".$Region."',  City='".$City."',  Address='".$Address."',  Phone='".$Phone."',  Warehouse='".$Fashion.",".$Tech.",".$Raw.",".$Other."' where ID='".$UserID."'";
        $result = mysqli_query($conn,$query);

        if($result)
        {
            header("location:view.php");
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        header("location:view.php");
    }


?>