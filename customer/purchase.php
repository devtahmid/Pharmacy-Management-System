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
	 $conn->bindParam(':itemId', $itemId);
	 $conn->bindParam(':quantity', $itemQuantity);
	 foreach ($_SESSION['myCart'] as $itemId => $itemQuantity) {
	 $conn->bindParam(':customerId', $_SESSION['userId']);
	 $conn->execute();
	 //deduct 1 quantity from items table
	   $sql="UPDATE items SET Quantity=Quantity-".$itemQuantity." WHERE ID=".$itemId;
	 	$conn= $db->query($sql);

 	 } //foreach end
	 unset($_SESSION['myCart']);
	 $db->commit();
	//	$db =null;
	}catch(PDOException $ex)
	{
			$db->rollback();
		 die("Error Message".$ex->getMessage());

 }
header('location:history.php');
?>
