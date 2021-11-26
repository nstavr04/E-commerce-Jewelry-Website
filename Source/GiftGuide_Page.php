<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Gift Guide</title>
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
                        .dropdown-item:active{
                          background-color: #eaccad;
                        }
                      </style>
                            <li><a class="dropdown-item" href="Bracelets_Products_Page.php">Bracelets</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="Necklaces_Products_Page.php">Necklaces</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="Rings_Products_Page.php">Rings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="EarRings_Products_Page.php">Earrings</a></li>
                            <li><hr class="dropdown-divider"></li>
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

    <!-- Completed -->
    <section>
      <div class="bg-image p-5 text-center shadow-1-strong rounded mb-5 text-white" style="background-size: cover;  background-image: url('https://images.pexels.com/photos/6474922/pexels-photo-6474922.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');" >
        <!-- Masking the image -->
        <div style="background-color: rgba(0, 0, 0, 0.2);">
        <div class="page-header text-center">
         <h1 class="p-2"><strong>Our Gift Guide</strong></h1>
         <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
         <h4 class="p-2">
          <p>Birthdays, anniversaries, holidays - there are so many gifts to find!</p>
          <p>How can you keep from becoming overwhelmed?</p>
          <p>This article will show you how to choose the best jewelry gift for all your loved ones.</p>
         </h4>
        </div>
      </div>
      </div>
    </section>

      <!-- Main Body of Guide -->
      <!-- Make the titles of the paragraphs stand out more and maybe a bottom line after each -->
      <!-- Need to review the text and add anklets and candles text -->
    <section>
      <div class="text-justify p-5 m-5">
        <h2 class="border-bottom border-secondary pb-2">1. Bracelets</h2>
        <p>One option is the current favourite, a chunky chain bracelet. These can come in gold or silver depending on your friend's skin tone. These beautiful pieces can be fun as chains but also double as a fancier bracelet as well.</p>
        <p>Coil bracelets or bangles are also always in style. With the foreign Egyptian or Indian look, your friend will feel unique and exotic on her special day.</p>
        <p>Just like rings, inlaid jewels can make a bracelet shine. It doesn't have to be expensive, but a tasteful stone or two can really bring out the glow of your loved one's looks.</p>
        <p>While a less common item, consider getting your special someone a bracelet with glass charms. These ornate, colorful pieces will shine on anyone's wrist and will definitely show you put some thought into your gift.</p>
        <h2 class="border-bottom border-secondary pb-2">2. Necklaces</h2>
        <p>When choosing necklaces, don't be afraid to go for a personalized touch. A monogrammed letter or two can show you put a lot of thought into your gift. They can also be a great matching yet unique jewelry gift for a set of special friends or sisters.</p>
        <p>Necklaces with a single, simple charm are beautiful as well. A sand dollar, locket, key, shell, butterfly, or special pendant can give you a chance to make the gift personal. Your friend or loved one will definitely feel valued by the thought you put into this jewelry gift.</p>
        <p>A statement piece can also be great for a bold and beautiful friend. If you know someone who likes to stand out, consider a necklace with many different pieces entwined together or a chain with links and jewels alternating along the length of the necklace.</p>
        <p>If your friend or loved one is a fan of the Old West and cowboys, a lariat style necklace might be just the thing. The simplicity and history of this type of piece make it pretty special.</p>
        <p>Chokers never seem to go out of style. One unique design is a fitted two-piece that can be worn together or separately. This is a great idea to give a friend two special pieces in one.</p>
        <p>One last option is a simple chain. While this type of necklace has been around forever, it's timeless. A thin gold or silver chain will bring this everlasting quality to your friendship or relationship as well.</p>
        <h2 class="border-bottom border-secondary pb-2">3. Rings</h2>
        <p>When buying a ring for someone, keep it simple. A thin band with a single jewel can be exquisite. This is a safe buy because many women dislike gaudy, chunky rings. A simple, thin piece will win every girl over.</p>
        <p>Another option for rings are small, jeweled insets. These can look simple and stylish at the same time. They also look expensive, so your loved one will definitely feel special!</p>
        <p>If you know a woman who likes the bigger, bolder rings, consider a signature pinky ring or similar model.</p>
        <h2 class="border-bottom border-secondary pb-2">4. Earrings</h2>
        <p>With earrings, you have the flexibility to be a little eccentric. Odd shapes, different lengths, and bold metals are all welcome here. Your friends will love the thought you put into picking out a special pair for them and will value your insight into their style.</p>
        <p>Or you can always stick to the classics. What woman can say no to a beautiful pair of pearls or diamond studs? These pieces date back to the jazz age of glamor.</p>
        <p>Hoops, whether big and bold or simple and small are always a great jewelry gift idea. Pay attention to the size of your friend's typical earrings and look for a similar size when shopping. Once you know the size, color, thickness, and design, this can be your special insight into your friend's personality.</p>
        <p>For friends who may not have piercings, you can always give them clip-on earrings as well. These may be popular among young girls, but they're coming back into style for the more mature.</p>
        <p>Ear cuffs are also now in vogue. Consider this for a younger or teenaged friend.</p>
        <h2 class="border-bottom border-secondary pb-2">5. Anklets</h2>
        <p>Look for colours and designs which you feel will suit most of your clothes and your dress sense. Look for formal and casual styles if you are in the habit of wearing anklets all the time.</p>
        <p>Remember the ones with bells make tinkling sounds when walking so ensure that you have silent anklet for places where quiet is required. You can go in for anklets which are loaded with bells for marriages and other functions.</p>
      </div>
    </section>

      <!-- Completed -->
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
            <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
          </svg>
            <a href="mailto:pileofjewelry@gmail.com?subject=Feedback&body=Hello," class="text-reset">pileofjewelry@email.com</a>
          </p>
          <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
          </svg> +357 96425326</p>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </svg> <a href="https://www.instagram.com/pile_of_jewelry_/" class="text-reset">Instagram</a>
          </p>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg> <a href="https://www.facebook.com/Pileofjewelry" class="text-reset">Facebook</a>
          </p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-left p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="#">Pile of Jewelry</a>
  </div>
      </footer>
  </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>