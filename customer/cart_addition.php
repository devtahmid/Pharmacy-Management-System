<?php
session_start();
if (!isset($_SESSION['userId']))
  header('Location: ../login_form.php?error=1');

extract($_GET);  //$id, $quantity and $maxQuantity
//echo $id." ----".$quantity."------".$_SESSION['myCart']["$id"]."----".$maxQuantity;

if(!isset($_SESSION['myCart']["$id"]))  //use cookie next time for cart
$_SESSION['myCart']["$id"]=$quantity;
else {
  if($_SESSION['myCart']["$id"]+$quantity>$maxQuantity){
      header('Location: cart_view.php?id='.$id.'&msg=2'); //error

  }
  else
    $_SESSION['myCart']["$id"]+=$quantity;
}

var_dump($_SESSION['myCart']);

if (isset($cart)) {
  header('Location: cart_view.php?msg=1'); //msg=succesfull
}
elseif (isset($purchase)) {
  header('Location: cart_view.php?purchase=1'); //no need to show cart, do purchase process and show history.php
}
else {
  echo "UNEXPECTED ERROR ";
  echo "<a href='customer_home.php'>Retun to home page</a>";
  die();
}

 ?>
