<?php
try
	{
		require('../project_connection.php');
    extract($_GET);
    if(isset($_GET['update'])){
      $sql = "Update supplier Set number= '$number' Where ID=$supplierId";
      $change = $db->prepare($sql);
      $change->execute();
      echo "Database Updated";
      header("location:viewSupplier.php?msg=1");
    }
    if(isset($_GET['delete'])){
      $sql = "Delete from supplier Where ID=$supplierId";
      $change = $db->prepare($sql);
      $change->execute();
      header('location:viewSupplier.php?msg=2');
    }

    $db=null;
  }

  catch(PDOException $e)
	{
		die("Error Message".$e->getMessage());
	}

?>
