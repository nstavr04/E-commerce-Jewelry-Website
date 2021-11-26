<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Admin Panel</title>

</head>

<body style="background-color: #eaccad;">

  <!-- Log out needs right allign -->
    <section id="Nav-Bar-Admin" style="background-color: #f3dbc3;">
      <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
              <nav class="navbar navbar-light">
                  <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                      <img src="https://cdn-icons-png.flaticon.com/512/636/636499.png" alt="Diamond" width="30" height="30" class="d-inline-block align-text-top">
                      Pile of Jewelry - Administrator Panel                      
                    </a>
                    </div>
                </nav>
          </div>
        </nav>
      </section>

    <div class="d-flex align-items-start pt-3">
      <!-- The sidebar setting each button to a corresponding content with a js plugin -->
      <div class="nav flex-column nav-pills me-3 ms-5" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link active" id="v-pills-products-tab" data-bs-toggle="pill" data-bs-target="#v-pills-products" type="button" role="tab" aria-controls="v-pills-products" aria-selected="true">Products</button>
        <button class="nav-link" id="v-pills-customers-tab" data-bs-toggle="pill" data-bs-target="#v-pills-customers" type="button" role="tab" aria-controls="v-pills-customers" aria-selected="false">Customers</button>
        <button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</button>
        <br>
        <a class="btn btn-dark" href="index.php" role="button">Log Out</a>
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
                      <h5 class="card-title">500</h5>
                      <!-- Can add <p> tags etc here as nessessary or output a message etc -->
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
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Product Code</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Category</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Stainless Steel Ring</td>
                                    <td>Description of item...</td>
                                    <td>€50</td>
                                    <td>Ring</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Stainless Steel Necklace</td>
                                    <td>Description of item...</td>
                                    <td>€25</td>
                                    <td>Necklace</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Stainless Steel Amulet</td>
                                    <td>Description of item...</td>
                                    <td>€60</td>
                                    <td>Amulet</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">4</th>
                                    <td>Diamond Ring</td>
                                    <td>Description of item...</td>
                                    <td>€72</td>
                                    <td>Ring</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">5</th>
                                    <td>Lavender Scented candle</td>
                                    <td>Description of item...</td>
                                    <td>€15</td>
                                    <td>Candle</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">6</th>
                                    <td>Rose Gold anklet</td>
                                    <td>Description of item...</td>
                                    <td>€40</td>
                                    <td>Anklet</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
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
                      <h5 class="card-title">5023</h5>
                      <!-- Can add <p> tags etc here as nessessary or output a message etc -->
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
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Customer ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Postal Code</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>sample@email.com</td>
                                    <td>99 123456</td>
                                    <td>10, Sample Street</td>
                                    <td>2100</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>sample@email.com</td>
                                    <td>99 123456</td>
                                    <td>10, Sample Street</td>
                                    <td>2100</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>sample@email.com</td>
                                    <td>99 123456</td>
                                    <td>10, Sample Street</td>
                                    <td>2100</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">4</th>
                                    <td>sample@email.com</td>
                                    <td>99 123456</td>
                                    <td>10, Sample Street</td>
                                    <td>2100</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">5</th>
                                    <td>sample@email.com</td>
                                    <td>99 123456</td>
                                    <td>10, Sample Street</td>
                                    <td>2100</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">6</th>
                                    <td>sample@email.com</td>
                                    <td>99 123456</td>
                                    <td>10, Sample Street</td>
                                    <td>2100</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                          <a href="#" class="btn btn-block btn-dark">Add New Product</a>
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
                      <h5 class="card-title">12033</h5>
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
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Products</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Order Cost</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Ring, Jewelry, Anklet...</td>
                                    <td>sample@email.com</td>
                                    <td>€60</td>
                                    <td>Aug 31 2021</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Ring, Jewelry, Anklet...</td>
                                    <td>sample@email.com</td>
                                    <td>€80</td>
                                    <td>Aug 28 2021</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Ring, Jewelry, Anklet...</td>
                                    <td>sample@email.com</td>
                                    <td>€95</td>
                                    <td>Aug 31 2021</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">4</th>
                                    <td>Ring, Jewelry, Anklet...</td>
                                    <td>sample@email.com</td>
                                    <td>€23</td>
                                    <td>Aug 28 2021</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">5</th>
                                    <td>Ring, Jewelry, Anklet...</td>
                                    <td>sample@email.com</td>
                                    <td>€40</td>
                                    <td>Aug 31 2021</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                  <tr>
                                    <th scope="row">6</th>
                                    <td>Ring, Jewelry, Anklet...</td>
                                    <td>sample@email.com</td>
                                    <td>€120</td>
                                    <td>Aug 28 2021</td>
                                    <td><a href="#" class="btn btn-sm btn-dark">View</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Edit</a></td>
                                    <td><a href="#" class="btn btn-sm btn-dark">Delete</a></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                          <a href="#" class="btn btn-block btn-dark">Add New Product</a>
                    </div>
                </div>
            </div>
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

    
