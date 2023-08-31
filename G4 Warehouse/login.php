<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.svg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="img/logo.svg" alt="" width="60" /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"><button type="button" class="btn btn-outline-dark">Home</button></a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="signup.php"><button type="button" class="btn btn-warning">
                Sign Up
              </button></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

      <!-- Header -->

      <header class="page-header gradient syze">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">

          </div>
          <div class="col-md-5">
            <img
              src="img/top img.svg"
              alt="Header image"
            />
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,224L48,213.3C96,203,192,181,288,154.7C384,128,480,96,576,117.3C672,139,768,213,864,208C960,203,1056,117,1152,101.3C1248,85,1344,139,1392,165.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </header>

      <!-- Creating Login Form -->
      <div class="container mt--1">
        <div class="row mb-5">
            <div class="col-lg-6 m-auto mb-4">
                <div class="card mb-4 gradient container">
                    <div class="card-title">
                        <h3 class="text-white text-center py-2"> Enter Login Details </h3>
                    </div>
                    <div class="card-body">
                        <form action="check.php" method="post">
                            <input type="text" class="form-control mb-2 box" placeholder=" Username " name="username" required>
                            <input type="password" class="form-control mb-2 box" placeholder=" Password " name="password" required>

                            <div class="col-md-5">
                            <br><button class="btn btn-info btn-success text-white" name="login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  

    <!-- Footer -->
    <footer class="gradient">
      <div class="container-fluid text-center">
        <span
          >G4 WareHouse &copy; 2021</span
        >
      </div>
    </footer>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>