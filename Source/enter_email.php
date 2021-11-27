<?php
    include('passreset_db.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Pile of Jewelry online shop. Handmade stainless steel jewelry and candle shop.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="styles/style_Account_page.css" rel="stylesheet">

  <title>Password Reset</title>
</head>

<body style="background-color: #f3dbc3;">

    <!-- Completed -->
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
                <li><a class="dropdown-item" href="Earrings_Products_Page.php">Earrings</a></li>
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
            if (!isset($_SESSION['LoggedInUser']) || $_SESSION['LoggedInUser'] == FALSE) {
              echo "<li class='nav-item'>";
              echo "<a class='nav-link' href='Account_Page.php'>Account</a>";
              echo "</li>";
              echo "</ul>";
            } 
            else if($_SESSION['LoggedInUser'] == TRUE){
              echo "<li class='nav-item'>";
              echo "<a class='nav-link' href='resetSession.php'>Log Out</a>";
              echo "</li>";
              echo "</ul>";
            }


            ?>


            <!-- shopping cart icon, added as a different ul to be able to change margin bottom so it does not touch search when navbar is minimized -->
            
            <?php

              if(!isset($_SESSION['LoggedInUser']) || $_SESSION['LoggedInUser'] == FALSE){
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
              }
              else if($_SESSION['LoggedInUser'] == TRUE){
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

      <!-- Enter email to change password -->
      <div class="leftpadding">
       <div class="row no-gutters">
        
        <div class="col no-gutters">
          <div class="leftside">
            
            <br>
            <form action="enter_email.php" method="POST">
            <h2 align="left">Enter email for password reset</h2>
            <hr> 

            <?php
                include('messages.php');
            ?>

            <label for="email">Email: </label><br>
            <input type="email" name="ResetEmail" required>
            <br><br>
        
            <button type="submit" name="reset-password" class="btn btn-dark">Submit</button>
            </form>
          </div>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>