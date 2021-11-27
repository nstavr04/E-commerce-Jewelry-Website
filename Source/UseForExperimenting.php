<?php
session_start();
echo $_POST['upvote']; 
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

<?php
$_SESSION['upvote']=$_POST['upvote']; 
?>




</body>


</html>
