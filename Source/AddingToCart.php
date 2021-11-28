<?php
session_start();

//Adding to cart when necessary and then changing the post value so the product isnt added when user press F5
if (isset($_POST['ProductAdded']) && $_POST['ProductAdded'] != "DONE"){
    echo $_POST['ProductAdded'];
    $_POST['ProductAdded']="DONE";
  }
  
  function insertIntoCart($pid){
    $tsql = "INSERT INTO TABLE CART";
    $getResults = sqlsrv_query($_SESSION["conn"], $tsql);
}

$lpv = $_SESSION['LastPageVisited'];
echo '<a href='."$lpv";
