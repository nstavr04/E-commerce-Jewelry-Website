<?php
session_start();
session_unset();
session_destroy();
session_start();
$_SESSION['LoggedInUser'] = FALSE;
$_SESSION['Admin'] = FALSE;

?>

<html>

<script type="text/javascript">
    window.location.href = 'index.php';
</script>

</html>