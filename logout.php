<?php
session_start();
unset($_SESSION['userId']);
unset($_SESSION['userType']);
unset($_SESSION['myCart']);
session_unset();
session_destroy();
//below from php website session unset function
session_write_close();
setcookie(session_name(),'',0,'/');
header('Location: login_form.php');
?>
