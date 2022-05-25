<?php
try
	{
		require('project_connection.php');
    extract($_GET);
    $itemID = $med;
    if(isset($_GET['done'])){
      $sql = "Update items Set Description= '$description' ,Price = $price , Brand = '$brand' , Category= '$category' Where ID=$itemID";
      $change = $db->prepare($sql);
      $change->execute();
      echo "Database Updated";
      header("location:editmedicine.php?id=$med&view=Edit+Medicine");
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
