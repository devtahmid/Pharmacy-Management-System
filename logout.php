<?php
unset($_SESSION['user_id']);
unset($_SESSION['auction_id']);
unset($_SESSION['userType']);
session_destroy();
header("location:login_form.php");
?>
