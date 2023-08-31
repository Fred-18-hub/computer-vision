<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.svg">
    
</head>


<?php


require_once ("connection.php");
$query = " SELECT * FROM Members ";
$result = mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{
    $username = $row['Username'];
    $password = $row['Password'];
    $id = $row['ID'];
}


$Username = $_POST["username"];
$Password = $_POST["password"];


if (isset($_POST["login"]))
{

if (!empty($Username) and !empty($Password))
{

    if ($Username == $username and $Password == $password)
    {
        header ("location:account.php");
    }
    else
    {
        echo 'Wrong Details. Try again <br>';
        echo '<a href="login.php">'.'Login'.'</a>';
    }
}
else
{
    echo 'Please fill all fields<br>';
    echo '<a href="login.php">'.'Login'.'</a>';
}

}
else
{
    header ("location:login.php");
}

?>

<script src="js/bootstrap.min.js"></script>
    </body>
</html>