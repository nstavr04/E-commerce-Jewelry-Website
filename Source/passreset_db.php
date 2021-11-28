<?php

session_start();
include 'dbconnection.php';
$errors = [];
$user_id = "";

$db = $_SESSION['conn'];

// Accept the email of a user whose password is to be reset
// Send email to user to reset their password
if (isset($_POST['reset-password'])) {
    $ResetEmail = $_POST['ResetEmail'];
    $query = "SELECT Email FROM CLIENTS WHERE Email='$ResetEmail'";
    $results = sqlsrv_query($db, $query, array(), array("Scrollable" => 'keyset'));

    echo sqlsrv_num_rows($results);

    if (empty($ResetEmail)) {
        array_push($errors, "Your email is required");
    } else if (sqlsrv_num_rows($results) == 0) {
        array_push($errors, "Sorry, no user exists on our system with that email");
    }

    //echo $ResetEmail;

    // Generating a random token for the user
    $token = bin2hex(random_bytes(50));

    if (count($errors) == 0) {
        // Insert token into the db with the email the user has given
        $sql = "INSERT INTO PASSWORDRESET(Email,Token) VALUES ('$ResetEmail','$token')";
        $results = sqlsrv_query($db, $sql);

        //Send email to the user
        $to = $ResetEmail;
        $subject = "Request to reset your password on Pile of Jewelry";
        $msg = "Hello, click on this http://localhost:8081/pass_reset.php?token=" . $token . " to reset your password on our site";
        $msg = wordwrap($msg, 70);
        $headers = "From: pileofjewelry@gmail.com";
        mail($to, $subject, $msg, $headers);
        header('location: pending_passReset.php?ResetEmail=' . $ResetEmail);
    }
}

//When the user enters a new password
if (isset($_POST['new_password'])) {
    $new_pass = $_POST['pass_reset'];
    // $new_pass_c = $_POST['pass_reset_c'];

    //Get the token from the email url link
    $token = $_SESSION['token'];

    // Checking for password mismatch or empty password
    if (empty($new_pass)) array_push($errors, "Password is required");

    //if ($new_pass != $new_pass_c) array_push($errors, "Password do not match");

    if (count($errors) == 0) {
        $sql = "SELECT Email FROM PASSWORDRESET WHERE Token='$token'";
        $results = sqlsrv_query($db, $sql);
    }

    $ResetEmail = ReturnSingleResult($results);

    if ($ResetEmail) {
        $new_pass_unhashed = $new_pass;
        $new_pass = md5($new_pass);
        $sql = "UPDATE CLIENTS SET CPassword='$new_pass' WHERE Email='$ResetEmail'";
        $results = sqlsrv_query($db, $sql);

        //Send the password as email to the user
        $to = $ResetEmail;
        $subject = "Pile of Jewelry - Your new password";
        $msg = "You have succesfully changed your password. Your new password is " . $new_pass_unhashed;
        $msg = wordwrap($msg, 70);
        $headers = "From: pileofjewelry@gmail.com";
        mail($to, $subject, $msg, $headers);
        header('location: index.php');
    }
}

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
