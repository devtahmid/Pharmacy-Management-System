<?php
	//php page to insert into purchase table and deduct from items table
	session_start();
	if (!isset($_SESSION['userId']))
		header('location:reg_loginform.php?error=1');
	extract($_GET);
try
	{
	require('project_connection.php');
	 $db->beginTransaction();
	 //insert purcahse in purchase table
	 $sql="insert into purchase(item_id,c_id,quantity,date) values (".$id.",".$_SESSION['userId'].", 1,CURDATE())";
	 $conn = $db->prepare($sql);
	 $conn->execute();
//deduct 1 quantity from items table
  $sql="UPDATE items SET Quantity=Quantity-1 WHERE ID=".$id;
	$conn = $db->prepare($sql);
	$conn->execute();

	 $db->commit();
		$db = null;
	}
	catch(PDOException $ex)
	{
			$db->rollback();
		 die("Error Message".$ex->getMessage());

 }
header('location:history.php');
?>
