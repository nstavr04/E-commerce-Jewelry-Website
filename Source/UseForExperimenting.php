<?php
session_start();
if (isset($_POST['upvote']) && $_POST['upvote'] != "DONE"){
echo $_POST['upvote']; 
$_POST['upvote']="DONE";
}

if ( $_POST['upvote'] != "DONE")
echo "skt";

?>

<!DOCTYPE html>
<html> 

<head>
    <title> Sample html file</title>
    <p><b>This is a Test Paragraph.MV</b></p>
</head>
<body>
<h1> This god is a test </h1>

<!-- Experimenting2.php -->

<form action="UseForExperimenting.php" method="post">
    <button type="submit" name="upvote" value="Upvote"></button>
</form>

<form action="UseForExperimenting.php" method="post">
    <button type="submit" name="upvote" value="v2"></button>
</form>

<?php
$_SESSION['upvote']=$_POST['upvote']; 
?>




</body>


</html>
