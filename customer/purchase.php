<?php
	//php page to insert into purchase table and deduct from items table
	session_start();
	if (!isset($_SESSION['userId']))
		header('Location: ../login_form.php?error=1');
	require('../project_connection.php');
$db->beginTransaction();
try
	{
	 //insert purcahse in purchase table
	 $sql="insert into purchase(item_id,c_id,quantity,date) values (:itemId, :customerId, :quantity, CURDATE())";
	 $conn = $db->prepare($sql);
	 $conn->bindParam(':customerId', $_SESSION['userId']);
	 foreach ($_SESSION['myCart'] as $itemId => $itemQuantity) {
		 $conn->bindParam(':itemId', $itemId);        //BUG : IF 2 ITEMS IN CART, ONLY FIRST ITEM GETS ADDED EVEN THOUGH ROWCOUNT() RETURNS 1 FOR ALL ITEMS
		 $conn->bindParam(':quantity', $itemQuantity);
	   echo $itemId."--".$itemQuantity."--".$_SESSION['userId']."\n";
	   $conn->execute();
		 echo $conn->rowcount()."\n";
	   //deduct quantity from items table
	   $sql="UPDATE items SET Quantity=Quantity-".$itemQuantity." WHERE ID=".$itemId;
	 	 $conn= $db->query($sql);

 	 } //foreach end
	 unset($_SESSION['myCart']);
	 $db->commit();
	 $db =null;
	}catch(PDOException $ex)
	{
			$db->rollback();
		 die("Error Message".$ex->getMessage());

 }
// die();
header('location:history.php');
?>
