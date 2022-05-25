<?php
require('header.php');
	// view more details clicked from somewhere
	session_start();
	if (!isset($_SESSION['userId']))
		header('location:reg_loginform.php?error=1');

	extract($_GET);
try
	{
		require('project_connection.php');
	 $sql="insert into orderdata(OID,user,status,data,supplierName,quantity) values (NULL, 'test', 'Pending', 'Data', 'supplier1','1')";
	 $conn = $db->prepare($sql);
	 $conn->execute();
	 $db->commit();
?>
<html>
<head>
  <title> History </title>
</head>
<body>
<?php

?>
</body>
</html>
<?php
		$db = null;
	}
	catch(PDOException $e)
	{
		die("Error Message".$e->getMessage());
	}
?>
