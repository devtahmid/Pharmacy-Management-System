<?php
session_start();
if (!isset($_SESSION['userId']))
  header('Location: ../login_form.php?error=1');

//var_dump($_SESSION['myCart']);
extract($_POST);
if(!isset($_SESSION['myCart'])){
header('Location: cart_view.php?msg=4'); //notice: no changes made
}
else {
  $i=0;
  foreach ($_SESSION['myCart'] as $itemId=>$itemQuantity) {
      $_SESSION['myCart'][$itemId]=$updateQty[$i];
      echo "->".$updateQty[$i]."<br>";
      ++$i;
    }
} //else end
//var_dump($_SESSION['myCart']);

header('Location: cart_view.php?msg=5'); //msg: quantity updated





?>
