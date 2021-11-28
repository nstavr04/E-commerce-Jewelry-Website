<?php
session_start();
include 'dbconnection.php';

// Prevent someone with no access to enter via URL
if (!isset($_SESSION['Admin']) || $_SESSION['Admin'] == FALSE) {
  echo '<h2 style="color:red">Access Denied</h2>';
  session_unset();
  session_destroy();
  die('<meta http-equiv="refresh" content="2; url=index.php" />');
}

?>


<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Admin Panel</title>

  <!-- Styling for the nav-pills -->
  <style>
    .nav-pills .nav-link.active {
      background-color: #212529;
    }

    .nav-link {
      color: #212529;
    }
  </style>

</head>

<body style="background-color: #eaccad;">

  <!-- Nav Bar -->
  <section id="Nav-Bar-Admin" style="background-color: #f3dbc3;">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <nav class="navbar navbar-light">
          <div class="container-fluid">
            <a class="navbar-brand">
              <img src="https://cdn-icons-png.flaticon.com/512/636/636499.png" alt="Diamond" width="30" height="30" class="d-inline-block align-text-top">
              Pile of Jewelry - Administrator Panel
            </a>
          </div>
        </nav>
      </div>
    </nav>
  </section>

  <div class="d-flex align-items-start py-3">

    <!-- The sidebar setting each button to a corresponding content using js and nav-pills -->
    <div class="nav flex-column nav-pills text-info me-3 ms-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <button class="nav-link active" id="v-pills-products-tab" data-bs-toggle="pill" data-bs-target="#v-pills-products" type="button" role="tab" aria-controls="v-pills-products" aria-selected="true">Products</button>
      <button class="nav-link" id="v-pills-customers-tab" data-bs-toggle="pill" data-bs-target="#v-pills-customers" type="button" role="tab" aria-controls="v-pills-customers" aria-selected="false">Customers</button>
      <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</button>
      <br>
      <a class="btn btn-dark" href="adminLogout.php" role="button">Log Out</a>
    </div>

    <div class="tab-content ms-5" id="v-pills-tabContent">

      <div class="tab-pane fade show active" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab">

        <h1 class="h2">Products</h1>

        <!-- Top card -->
        <div class="row my-4">
          <div class="mb-4 mb-lg-0">
            <div class="card">
              <h5 class="card-header">Total Products in the store</h5>
              <div class="card-body">

                <?php
                // Getting the total number of products
                $conn = $_SESSION['conn'];
                $query = "SELECT COUNT(Pid) FROM PRODUCTS";
                $results = sqlsrv_query($conn, $query);
                $TotalPNum = ReturnSingleResult($results);
                echo '<h5 class="card-title">' . $TotalPNum . '</h5>';
                ?>

              </div>
            </div>
          </div>
        </div>

        <!-- The bottom table -->
        <div class="row">
          <div class="mb-4 mb-lg-0">
            <div class="card">
              <h5 class="card-header">List of registered products in store</h5>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" style="text-align: center; vertical-align:middle">
                    <thead>
                      <tr>
                        <th scope="col">Product Code</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        // Quering for the table and printing it
                        $query = "SELECT Pid,PName,Descr,Price,Category FROM PRODUCTS";
                        $results = sqlsrv_query($conn, $query);
                        PrintResultSet($results);
                        ?>
                    </tbody>
                  </table>
                </div>
                <!-- Can be expanded to add new product functionality in the future -->
                <a href="#" class="btn btn-block btn-dark">Add New Product</a>
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="tab-pane fade" id="v-pills-customers" role="tabpanel" aria-labelledby="v-pills-customers-tab">

        <h1 class="h2">Customers</h1>

        <!-- Top card -->
        <div class="row my-4">
          <div class="mb-4 mb-lg-0">
            <div class="card">
              <h5 class="card-header">Total registered customers in store</h5>
              <div class="card-body">
                <?php
                // Getting the total number of customers 
                $conn = $_SESSION['conn'];
                $query = "SELECT COUNT(Cid) FROM CLIENTS";
                $results = sqlsrv_query($conn, $query);
                $TotalCNum = ReturnSingleResult($results);
                echo '<h5 class="card-title">' . $TotalCNum . '</h5>';
                ?>
              </div>
            </div>
          </div>
        </div>

        <!-- The bottom table -->
        <div class="row">
          <div class="mb-4 mb-lg-0">
            <div class="card">
              <h5 class="card-header">Details of registered customers</h5>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" style="text-align:center; vertical-align:middle">
                    <thead>
                      <tr>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Postal Code</th>
                        <th scope="col">View</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        // Quering for the table and then printing it
                        $query = "SELECT Cid,Email,Phone,CAddress,PostalCode FROM CLIENTS";
                        $results = sqlsrv_query($conn, $query);
                        PrintResultSet2($results);
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">

        <h1 class="h2">Orders</h1>

        <div class="row my-4">
          <div class="mb-4 mb-lg-0">
            <div class="card">
              <h5 class="card-header">Total orders made</h5>
              <div class="card-body">
                <?php
                // Getting the total number of orders
                $conn = $_SESSION['conn'];
                $query = "SELECT COUNT(Oid) FROM ORDERS";
                $results = sqlsrv_query($conn, $query);
                $TotalONum = ReturnSingleResult($results);
                echo '<h5 class="card-title">' . $TotalONum . '</h5>';
                ?>
              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="mb-4 mb-lg-0">
            <div class="card">
              <h5 class="card-header">List of orders in store</h5>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" style="text-align:center; vertical-align:middle">
                    <thead>
                      <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Products</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Order Cost</th>
                        <th scope="col">Order Date</th>
                        <th scope="col">View</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php
                        // Quering for the table and then printing it
                        $query = "SELECT Oid,ItemsNum,Cid,OrderCost,OrderDate FROM ORDERS";
                        $results = sqlsrv_query($conn, $query);
                        PrintResultSet3($results);
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- Can be expanded in the future to add more widgets on the panels -->
          <div class="col-12 col-xl-4">
            <!-- Another widget will go here -->
          </div>
        </div>

      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php

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

// Result set function for the tables of the admin panel
// Used for products
function PrintResultSet($resultSet)
{

  $cnt = 0;
  while ($row = sqlsrv_fetch_array($resultSet, SQLSRV_FETCH_ASSOC)) {
    echo ("<tr>");
    foreach ($row as $col) {
      $cnt++;
      echo ("<td>");
      // For the price
      if ($cnt == 4)
        echo (is_null($col) ? "Null" : number_format((float)$col, 2, '.', ''));
      else
        echo (is_null($col) ? "Null" : $col);
      echo ("</td>");
    }
    echo '<td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
          <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>';
    echo ("</tr>");
    $cnt = 0;
  }
}

// Used for customers
function PrintResultSet2($resultSet)
{

  while ($row = sqlsrv_fetch_array($resultSet, SQLSRV_FETCH_ASSOC)) {
    echo ("<tr>");
    foreach ($row as $col) {
      echo ("<td>");
      echo (is_null($col) ? "Null" : $col);
      echo ("</td>");
    }
    echo '<td><a href="#" class="btn btn-sm btn-dark">View</a></td>';
    echo ("</tr>");
  }
}

//Used for orders
function PrintResultSet3($resultSet)
{
  $cnt = 0;
  while ($row = sqlsrv_fetch_array($resultSet, SQLSRV_FETCH_ASSOC)) {
    echo ("<tr>");
    foreach ($row as $col) {
      $cnt++;
      echo ("<td>");
      //For cost
      if ($cnt == 4)
        echo (is_null($col) ? "Null" : number_format((float)$col, 2, '.', ''));
      else if ($cnt == 5)
        echo (is_null($col) ? "Null" : date_format($col, 'Y-m-d'));
      else
        echo (is_null($col) ? "Null" : $col);
      echo ("</td>");
    }
    echo '<td><a href="#" class="btn btn-sm btn-dark">View</a></td>';
    echo ("</tr>");
  }
}

?>