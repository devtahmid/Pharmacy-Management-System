<?php
unset($_SESSION['userId']);
unset($_SESSION['userType']);
unset($_SESSION["id"]);
session_unset();
session_destroy();
header("location:login_form.php");
?>
