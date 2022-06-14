<?php
session_start();

if (!isset($_SESSION['userId']))
  header('Location: ../login_form.php?error=1');
?>
<html>
<head>
<script src="https://kit.fontawesome.com/1614020ccb.js" crossorigin="anonymous"></script>

</head>
<body>
<?php require('header.php'); ?>
<header class="masthead bg-primary text-white text-center px-md-2">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading">Cart Items</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
    </div>
</header>
<?php
if(!isset($_SESSION['myCart'])){
?>
<div class="container d-flex align-items-center flex-column">
    <!-- Masthead Heading-->
    <h1 class="masthead-heading">Your cart is empty</h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
<?php
}
elseif (isset($_SESSION['myCart'])) {
  //var_dump($_SESSION['myCart']);
?>
<table class='table table-dark' style="text-align: center;">
<tr>
<td><b>Item</b></td>
<td><b>Rate(BD)</b></td>
<td><b>Quantity</b></td>
<td><b>Amount(BD)</b></td>
<td><b>Remove Item</b></td>
</tr>
<form method='post' action='cart_update.php'>
<?php
  try {
    require('../project_connection.php');
    $sql="SELECT Name, Quantity, Price, Brand, Category FROM items WHERE ID=:id AND Quantity>0 AND expiry > CURRENT_DATE()";
    $result= $db->prepare($sql);
    $itemId=0;
    $result->bindParam(':id' , $itemId);
    foreach ($_SESSION['myCart'] as $itemId => $itemQuantity) {
      //bindParam binds the parameter so if value changed, new val of param will be exeuted
      $result->execute();
      $row = $result->fetch();
      extract($_GET);
      if (isset($id))
        if ($itemId==$id)
          $msg1StockAmount=$itemQuantity; //for alert msg1
?>
<tr>
<!-- Pill: Name - Brand  -->
<td><?php echo $row['Category'].": ".$row['Name']." - ".$row['Brand']; ?></td>
<td><?php echo $row['Price']; ?></td>
<td>
<input class='btn-md' type='number' name=updateQty[] value='<?php echo $itemQuantity; ?>' min='1' max='<?php echo $row['Quantity']; ?>'>
</td>
<td><?php echo $itemQuantity*$row['Price']; ?></td>
<td><a href='cart_delete.php?id=<?php echo $itemId; ?>'><i class="fa-regular fa-trash-can" style="color:#db2733;"></i></a></td>
</tr>

<?php
    }//foreach end
?>
</table>
<div style="text-align:center;">
<?php
if (isset($purchase)) {
  ?>
  <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-danger text-white rounded"><a href="purchase.php"  style="color:white;">Purchase all items?</a></button>
  <br><br>
  <input class='navbar-toggler navbar-toggler-right font-weight-bold bg-info text-white rounded' type='submit' name='update' value='Update Quantities'>
  <?php
}
else{
  ?>
  <input class='navbar-toggler navbar-toggler-right font-weight-bold bg-info text-white rounded' type='submit' name='update' value='Update Quantities'>
  <a class="navbar-toggler navbar-toggler-right font-weight-bold bg-warning text-white rounded" href="purchase.php">Purchase Cart</a>
  <?php
}
?>
</div>
</form>
<?php

    //$db =null; //remove is db results not as expected after 1st o/p
  } catch (PDOException $e) {
    echo "UNEXPECTED ERROR <BR>Error message: ".$e->getMessage();
    echo "<a href='customer_home.php'>Retun to home page</a>";
    die();
  }//catch end

}//elseif isset $_SESSION
if (isset($msg)) {
  if ($msg==1)
    echo "<script> alert('Added to cart!'); </script>";
  elseif ($msg==2)
    echo "<script> alert('Already ".$_SESSION['myCart'][$id]." in cart.  Stock quantity=".$msg1StockAmount."\\nCannot add more than stock quantity!'); </script>";
  elseif ($msg==3)
    echo "<script> alert('Error: Tried deleting non existant item from cart!'); </script>";
  elseif ($msg==4)
    echo "<script> alert('Notice: No changes made!'); </script>";
  elseif ($msg==5)
    echo "<script> alert('Quantity updated!'); </script>";
}

?>
</body>

</html>
