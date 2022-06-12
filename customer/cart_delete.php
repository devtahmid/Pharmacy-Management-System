<?php
session_start();
if (!isset($_SESSION['userId']))
  header('Location: ../login_form.php?error=1');

if(!isset($_SESSION['myCart'][$_GET['id']])){
header('Location: cart_view.php?msg=3'); //error: tried deleting non existant item from cart
}
else {
//echo sizeof($_SESSION['myCart']);
//var_dump($_SESSION['myCart']);

unset($_SESSION['myCart'][$_GET['id']]);
//echo "eeee".key($_SESSION['myCart'])."<br>";
if(sizeof($_SESSION['myCart'])==0)
unset($_SESSION['myCart']);
} //else end
//var_dump($_SESSION['myCart']);
//die();
header('Location: cart_view.php');
?>
