<?php
session_start();
include_once 'dbconnection.php';
// Get the DB connection info from the session
if (isset($_SESSION["serverName"]) && isset($_SESSION["connectionOptions"])) {
  $serverName = $_SESSION["serverName"];
  $connectionOptions = $_SESSION["connectionOptions"];
  //Establishes the connection
  $conn = $_SESSION["conn"];
} else {
  // Session is not correctly set! Redirecting to start page
  session_unset();
  session_destroy();
  echo "Session is not correctly set! Clossing session and redirecting to start page in 3 seconds<br/>";
  die('<meta http-equiv="refresh" content="3; url=index.php" />');
  //header('Location: index.php');
  //die();
}

//Maybe this will be needed on a 'back' button
$_SESSION['LastPageVisited'] = 'Anklets_Products_Page.php';

//Adding to cart when necessary and then changing the post value so the product isnt added when user press F5
if (isset($_POST['ProductAdded']) && $_POST['ProductAdded'] != "DONE") {
  //echo $_POST['ProductAdded'];
  $userCid = $_SESSION['CartID'];
  $pid = $_POST['ProductAdded'];
  //echo $userCid;

  // get-select the price of the product added
  $tsql = "SELECT Price FROM PRODUCTS WHERE Pid=$pid";
  $getResults = sqlsrv_query($_SESSION["conn"], $tsql);
  $price = ReturnSingleResult($getResults);

  //this is checking if the product already exists in the CONTAINSCP table
  $tsql = "SELECT ProductQuantity FROM CONTAINSCP WHERE Pid=$pid AND CartID=$userCid";
  $getResults = sqlsrv_query($_SESSION["conn"], $tsql, array(), array("Scrollable" => 'keyset'));
  $row = sqlsrv_num_rows($getResults);
  if ($row == 1) {
    $currentQuantity = ReturnSingleResult($getResults);
    $currentQuantity = $currentQuantity + 1;
    //product is already in the cart so we need to update its quantity
    $tsql = "UPDATE CONTAINSCP SET ProductQuantity=$currentQuantity WHERE CartID=$userCid AND Pid=$pid";
    $getResults = sqlsrv_query($_SESSION["conn"], $tsql);
  } else {
    //Add it to the table
    $tsql = "INSERT INTO CONTAINSCP (Pid,CartID,Price,ProductQuantity) VALUES($pid,$userCid,$price,1)";
    $getResults = sqlsrv_query($_SESSION["conn"], $tsql);
  }
  //update the totalCostOf the cart
  //get-select the total cost
  $tsql = "SELECT TotalCost FROM CART WHERE CartID=$userCid";
  $getResults = sqlsrv_query($_SESSION["conn"], $tsql);
  $total = ReturnSingleResult($getResults);
  $total = $total + $price;

  //update the table value of the total cost
  $tsql = "UPDATE CART SET TotalCost=$total WHERE CartID=$userCid";
  $getResults = sqlsrv_query($_SESSION["conn"], $tsql);
  //print_r($getResults);

  $_POST['ProductAdded'] = "DONE";
}

function PrintResultSet($resultSet)
{
  echo ("<table><tr >");

  foreach (sqlsrv_field_metadata($resultSet) as $fieldMetadata) {
    echo ("<th>");
    echo $fieldMetadata["Name"];
    echo ("</th>");
  }
  echo ("</tr>");

  while ($row = sqlsrv_fetch_array($resultSet, SQLSRV_FETCH_ASSOC)) {
    echo ("<tr>");
    foreach ($row as $col) {
      echo ("<td>");
      echo (is_null($col) ? "Null" : $col);
      echo ("</td>");
    }
    echo ("</tr>");
  }
  echo ("</table>");
}

function PrintResult($resultSet)
{

  while ($row = sqlsrv_fetch_array($resultSet, SQLSRV_FETCH_ASSOC)) {
    foreach ($row as $col) {
      echo (is_null($col) ? "Null" : $col);
    }
  }
}

function PrintResultFloatNumber($resultSet)
{

  while ($row = sqlsrv_fetch_array($resultSet, SQLSRV_FETCH_ASSOC)) {
    foreach ($row as $col) {
      echo number_format((float)$col, 2, '.', '');
    }
  }
}


//Must give only 1 tuple 1 column
function ReturnSingleResult($resultSet)
{
  while ($row = sqlsrv_fetch_array($resultSet, SQLSRV_FETCH_ASSOC)) {
    foreach ($row as $col) {
      return $col;
      break;
    }
    break;
  }
}

//Read Product
function queryP($Pid, $columName)
{
  $tsql = "SELECT {$columName} FROM PRODUCTS WHERE Pid={$Pid}";
  $getResults = sqlsrv_query($_SESSION["conn"], $tsql);

  // echo "Executing query: " . $tsql . "<br/>";

  // echo "Results:<br/>";
  if ($getResults == FALSE) {
    die(FormatErrors(sqlsrv_errors()));
  }

  return $getResults;
  // PrintResult($getResults);
  // return sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC);
  // return $getResults;
}

//Read Product
function queryMainUrl($Pid)
{
  $tsql = "SELECT Link FROM URLANDP WHERE Pid={$Pid} AND MAIN=1";
  $getResults = sqlsrv_query($_SESSION["conn"], $tsql);

  // echo "Executing query: " . $tsql . "<br/>";

  // echo "Results:<br/>";
  if ($getResults == FALSE) {
    die(FormatErrors(sqlsrv_errors()));
  }

  return $getResults;
  // PrintResult($getResults);
  // return sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC);
  // return $getResults;
}

//return the number of the products in our Products table
function getProductsCount()
{
  $tsql = "SELECT COUNT(Pid) FROM PRODUCTS";
  $getResults = sqlsrv_query($_SESSION["conn"], $tsql);
  return $getResults;
}

function getCategory($pid)
{
  $tsql = "SELECT Category FROM PRODUCTS WHERE Pid={$pid}";
  $getResults = sqlsrv_query($_SESSION["conn"], $tsql);
  return $getResults;
}

function FormatErrors($errors)
{
  /* Display errors. */
  echo "Error information: ";

  foreach ($errors as $error) {
    echo "SQLSTATE: " . $error['SQLSTATE'] . "";
    echo "Code: " . $error['code'] . "";
    echo "Message: " . $error['message'] . "";
  }
}

function getInfoForProducts()
{
  $tsql = "SELECT P.Pid,P.Category,P.Price,U.Link,P.PName FROM PRODUCTS P INNER JOIN URLANDP U ON P.Pid=U.Pid WHERE U.Main=1";
  $resultSet = sqlsrv_query($_SESSION["conn"], $tsql);
  $cnt = 0;
  $rowIndex = 0;

  while ($row = sqlsrv_fetch_array($resultSet, SQLSRV_FETCH_ASSOC)) {
    foreach ($row as $col) {
      $arrayProducts[$rowIndex][$cnt] = $col;
      echo $arrayProducts[$rowIndex][$cnt];  //Just to be sure.
      $cnt++;
      // echo (is_null($col) ? "Null" : $col);  Just to be sure.
    }
    echo ("</tr>");
  }
  $rowIndex++;
}
// PRINT WITH 2 DECIMALS
// number_format((float)$foo, 2, '.', '');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles/style_products_page.css" />
  <title>Anklets</title>
</head>

<body style="background-color: #f3dbc3;">

  <!-- Header -->
  <section id="Nav-Bar" style="background-color: #f3dbc3;">
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container-fluid">
        <nav class="navbar navbar-light ">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
              <img src="https://cdn-icons-png.flaticon.com/512/636/636499.png" alt="Diamond" width="30" height="30" class="d-inline-block align-text-top">
              Pile of Jewelry
            </a>
          </div>
        </nav>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Jewelry
              </a>
              <ul class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdown" style="background-color: #f3dbc3;">
                <style>
                  .dropdown-item:active {
                    background-color: #eaccad;
                  }
                </style>
                <li><a class="dropdown-item" href="Bracelets_Products_Page.php">Bracelets</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="Necklaces_Products_Page.php">Necklaces</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="Rings_Products_Page.php">Rings</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="EarRings_Products_Page.php">Earrings</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="Anklets_Products_Page.php">Anklets</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Candles_Products_Page.php">Candles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="GiftGuide_Page.php">Gift Guide</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ContactUs_Page.php">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AboutUs_Page.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="FAQ_Page.php">FAQ</a>
            </li>
            <?php

            // Login or Account
            if (!isset($_SESSION['LoggedInUser']) ||  $_SESSION['LoggedInUser'] == FALSE) {
              echo "<li class='nav-item'>";
              echo "<a class='nav-link' href='Account_Page.php'>Account</a>";
              echo "</li>";
              echo "</ul>";
            } else if ($_SESSION['LoggedInUser'] == TRUE) {
              echo "<li class='nav-item'>";
              echo "<a class='nav-link' href='resetSession.php'>Log Out</a>";
              echo "</li>";
              echo "</ul>";
            }

            ?>

            <?php
            if (!isset($_SESSION['LoggedInUser']) || $_SESSION['LoggedInUser'] == FALSE) {
              echo '<ul class="nav navbar-nav navbar-right" style="margin-bottom: 0.5%;">
              <li><a class="navbar-brand" href="ShoppingCart_Page.php"
              data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
                  </svg>
                </a></li>
            </ul>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h6>Unable to access cart</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      To access the shopping cart you need to be logged in!
                  </div>
                </div>
              </div>
            </div>';
            } else if ($_SESSION['LoggedInUser'] == TRUE) {
              echo '<ul class="nav navbar-nav navbar-right" style="margin-bottom: 0.5%;">
                <li><a class="navbar-brand" href="ShoppingCart_Page.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                      <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z" />
                    </svg>
                  </a></li>
              </ul>';
            }

            ?>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
        </div>
      </div>
    </nav>
  </section>

  <!-- Main Body -->
  <section id="Products" class="my-5 pb-5" style="background-color: #f3dbc3;">

    <!-- Title -->
    <div class="container text-center mt-5 py-5">
      <h2 class="font-weight-bold">Our Anklets</h2>
      <hr>
      <p>Here you can check out our latest collection</p>
    </div>

    <div class="row mx-auto container">

      <?php
      $temp = getProductsCount();
      $numOfProducts = ReturnSingleResult($temp);

      $arrayProducts = array(); //[i][0] = Pid, [i][1] = Cat, [i][2] = Price, [i][3] = Link, [i][4] = Name

      $tsql = "SELECT P.Pid,P.Category,P.Price,U.Link,P.PName FROM PRODUCTS P INNER JOIN URLANDP U ON P.Pid=U.Pid WHERE U.Main=1";
      $resultSet = sqlsrv_query($_SESSION["conn"], $tsql);
      $cnt = 0;
      $rowIndex = 0;

      while ($row = sqlsrv_fetch_array($resultSet, SQLSRV_FETCH_ASSOC)) {
        foreach ($row as $col) {
          if ($cnt == 2)
            $arrayProducts[$rowIndex][$cnt] = number_format((float)$col, 2, '.', '');
          else
            $arrayProducts[$rowIndex][$cnt] = $col;
          //echo $arrayProducts[$rowIndex][$cnt]; echo '<br>'; //Just to be sure.
          $cnt++;
          // echo (is_null($col) ? "Null" : $col);  //Just to be sure.
        }
        $rowIndex++;
        $cnt = 0;
      }

      for ($i = 0; $i < $numOfProducts; $i++) {
        if ($arrayProducts[$i][1] == 'a') {
          echo '<div class="product text-center col-lg-3 col-md-4 col-12">';
          $tempPid = $arrayProducts[$i][0];
          $tempPrice = $arrayProducts[$i][2];
          $tempLink = $arrayProducts[$i][3];
          $tempName = $arrayProducts[$i][4];
          echo "<a href='SingleProduct_Page.php?ProductID=$tempPid'>";

          echo  '<img class="img-fluid mb-3" src="' . $tempLink . '" alt="Image of an anklet"/>
          </a>';


          echo  '<h5 class="p-name">';
          echo $tempName;
          echo '</h5>';
          echo '<h4 class="p-price"> ???';
          echo $tempPrice;
          echo '</h4>';
          echo '<form action="" method="post">';
          // if the user is not logged in, the add to cart button wont work
          if (!isset($_SESSION['LoggedInUser']) || $_SESSION['LoggedInUser'] == FALSE)
            echo '<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" name="ProductAdded" value=' . $tempPid . '>Add to Cart</button>';
          else
            echo '<button type="buy-btn" class="btn btn-dark" name="ProductAdded" value=' . $tempPid . '>Add to Cart</button>';

          echo '</form>';
          echo '</div>';
        }
      }
      ?>

      <!-- modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h6>Unable to add product to cart!</h6>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              To modify the shopping cart you need to be logged in!
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>

  <!-- Footer -->
  <section id="MainBottom" style="background-color: #eaccad;">
    <!-- Footer -->
    <footer class="text-center text-lg-start text-muted">
      <!-- Grey Line above footer -->
      <section class="d-flex justify-content-center justify-content-lg-between p-1">
      </section>
      <!-- Links -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4" style="text-align: center;">
              <h6 class="text-uppercase fw-bold mb-4">
                Site Info
              </h6>
              <p>
                <a href="ContactUs_Page.php" class="text-reset">Contact Us</a>
              </p>
              <p>
                <a href="AboutUs_Page.php" class="text-reset">About Us</a>
              </p>
              <p>
                <a href="FAQ_Page.php" class="text-reset">FAQ</a>
              </p>
              <p>
                <a href="Account_Page.php" class="text-reset">Account</a>
              </p>
            </div>
            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4" style="text-align: center;">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Contact Us
              </h6>
              <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                  <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                </svg>
                <a href="mailto:pileofjewelry@gmail.com?subject=Feedback&body=Hello," class="text-reset">pileofjewelry@email.com</a>
              </p>
              <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg> +357 96425326</p>
              <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg> <a href="https://www.instagram.com/pile_of_jewelry_/" class="text-reset">Instagram</a>
              </p>
              <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg> <a href="https://www.facebook.com/Pileofjewelry" class="text-reset">Facebook</a>
              </p>
            </div>
          </div>
        </div>
      </section>
      <div class="text-left p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        ?? 2021 Copyright:
        <a class="text-reset fw-bold" href="index.php">Pile of Jewelry</a>
      </div>
    </footer>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>