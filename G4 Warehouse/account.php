<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" href="img/logo.svg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
  </head>
  <body>

    <?php

require_once ("connection.php");
$query = " SELECT * FROM Members ";
$result = mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{
    $id = $row['ID'];
}
?>

  <div class="container mt--1">
        <div class="row mb-5">
            <div class="col-lg-6 m-auto mb-4">
                <div class="card mb-4 gradient container">
                    <div class="card-title">
                        <h3 class="text-white text-center py-2"> Login Successful! </h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                        <h5 class="text-white text-center py-2"> Your Warehouse ID: </h5><br>
                        <button type="button" class="btn-success container">
                <?php echo 'GWH-0'.$id.'4U';?>
              </button></a><br><br>
              <h6 class="text-white text-center py-2">Click on Edit my Details to change your Details </6><br>
              <a href="view.php" target="blank"><button type="button" class="btn btn-primary">Edit my Details</button></a><br>
              <h6 class="text-white text-center py-2">Or click Home to go to the Homepage </6><br><br>
              <a href="index.php"><button type="button" class="btn btn-warning">Home</button></a>

            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="js/bootstrap.min.js"></script>
</body>