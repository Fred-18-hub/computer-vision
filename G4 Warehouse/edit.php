
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member Details</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/logo.svg">
    <script src="js/bootstrap.min.js"></script>
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
              <a class="nav-link" href="login.php"><button type="button" class="btn btn-success">
                Login
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


      <?php 

        require_once ("connection.php");
        $UserID = $_GET['GetID'];
        $query = " SELECT * FROM Members WHERE ID ='".$UserID."'";
        $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_assoc($result))
        {
            $UserID = $row['ID'];
            $Firstname = $row['Firstname'];
            $Lastname = $row['Lastname'];
            $Username = $row['Username'];
            $Email = $row['Email'];
            $Password = $row['Password'];
            $DOB_y = $row['DOB'][0];
            $DOB_m = $row['DOB'][1];
            $DOB_d = $row['DOB'][2];
            $Region = $row['Region'];
            $City = $row['City'];
            $Address = $row['Address'];
            $Phone = $row['Phone'];
            $Ware1 = $row['Warehouse'][0];
            $Ware2 = $row['Warehouse'][1];
            $Ware3 = $row['Warehouse'][2];
        }

      ?>

      <!-- Updating Member Details -->
      <div class="container mt--1">
        <div class="row mb-5">
            <div class="col-lg-6 m-auto mb-5">
                <div class="card mb-4 gradient container">
                    <div class="card-title">
                        <h3 class=" text-white text-center py-2"> Update</h3>
                    </div>
                    <div class="card-body">
                        <form action="update.php?ID=<?php echo $UserID ?>" method="post">
                        <input type="text" class="form-control mb-2 box" placeholder=" First Name " name="firstname" value="<?php echo $Firstname ?>" >
                            <input type="text" class="form-control mb-2 box" placeholder=" Last Name " name="lastname" value="<?php echo $Lastname ?>">
                            <input type="text" class="form-control mb-2 box" placeholder=" User Name " name="username" value="<?php echo $Username ?>" >
                            <input type="email" class="form-control mb-2 box" placeholder=" Email " name="email" value="<?php echo $Email ?>" >
                            <input type="password" class="form-control mb-2 box" placeholder=" Password " name="password" value="<?php echo $Password ?>" >
                            <div class="form-control mb-2 box">
                            <label for="dob-day" class="control-label">Date of birth</label>
                            <div >
                              <select name="dob-day" value="<?php echo $DOB_d ?>" class="box">
                                <option value="" >Day</option>
                                <option value="">---</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                              </select>
                              <select name="dob-month" value="<?php echo $DOB_m ?>" class="box">
                                <option value="">Month</option>
                                <option value="">-----</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                              </select>
                              <select name="dob-year" value="<?php echo $DOB_y ?>" class="box">
                                <option value="">Year</option>
                                <option value="">----</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                                <option value="1929">1929</option>
                                <option value="1928">1928</option>
                                <option value="1927">1927</option>
                                <option value="1926">1926</option>
                                <option value="1925">1925</option>
                                <option value="1924">1924</option>
                                <option value="1923">1923</option>
                                <option value="1922">1922</option>
                                <option value="1921">1921</option>
                                <option value="1920">1920</option>
                                <option value="1919">1919</option>
                                <option value="1918">1918</option>
                                <option value="1917">1917</option>
                                <option value="1916">1916</option>
                                <option value="1915">1915</option>
                                <option value="1914">1914</option>
                                <option value="1913">1913</option>
                                <option value="1912">1912</option>
                                <option value="1911">1911</option>
                                <option value="1910">1910</option>
                                <option value="1909">1909</option>
                                <option value="1908">1908</option>
                                <option value="1907">1907</option>
                                <option value="1906">1906</option>
                                <option value="1905">1905</option>
                                <option value="1904">1904</option>
                                <option value="1903">1903</option>
                                <option value="1901">1901</option>
                                <option value="1900">1900</option>
                              </select>
                            </div>
                          </div>
                          <input type="text" class="form-control mb-2 box" placeholder=" Region " name="region" value="<?php echo $Region ?>" >
                          <input type="text" class="form-control mb-2 box" placeholder=" City " name="city" value="<?php echo $City ?>" >
                          <input type="text" class="form-control mb-2 box" placeholder=" Address " name="address" value="<?php echo $Address ?>" >

                          <div class="form-control mb-2 box">
                          <label for="phone" class="control-label">Telephone number</label>
                          <div >
                          <input type="tel" name="phone" class="box" placeholder=" eg. 0233333333 " pattern="[0-9]{10}" value="<?php echo $Phone ?>">
                         </div>
                         </div>

                         <div class="form-control mb-2 box">
                         <label class="control-label"><b>What are you going keep in your Warehouse?</b></label>
                           <div>
                          <input type="checkbox" name="fashion" value="Fashion"> Fashion Products<br>
                          <input type="checkbox" name="tech" value="Tech"> Tech Products<br>
                          <input type="checkbox" name="raw" value="Raw Materials"> Raw Materials<br><br>
                          <div class="mb-3">
                          <label for="exampleFormControlTextarea1" class="form-label">Specify if Other</label>
                          <textarea
                                    class="form-control box"
                                    id="exampleFormControlTextarea1"
                                    name="other"
                                    rows="5"
                                  ></textarea>
                                </div>

                        </div>
                         </div>
                         <div class="col-md-5">
                            <br><button class="btn btn-info btn-warning text-white" name="update">Update</button>
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
