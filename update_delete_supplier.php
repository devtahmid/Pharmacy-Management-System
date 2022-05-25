<?php
try
	{
		require('project_connection.php');
    extract($_GET);
    $itemID = $med;
    if(isset($_GET['done'])){
      $sql = "Update items Set number= '$number' Where ID=$itemID";
      $change = $db->prepare($sql);
      $change->execute();
      echo "Database Updated";
      header("location:?id=$med&view=Edit+Supplier");
    }
    if(isset($_GET['delete'])){
      $sql = "Delete from items Where ID=$itemID";
      $change = $db->prepare($sql);
      $change->execute();
      header('location:pharmacist_home.php');
    }

    $db=null;
  }

  catch(PDOException $e)
	{
		die("Error Message".$e->getMessage());
	}

?>
