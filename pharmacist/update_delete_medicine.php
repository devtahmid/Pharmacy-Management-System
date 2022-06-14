<?php
echo "1";
try
	{
		require('../project_connection.php');
    extract($_GET);
		echo "2";
    if(isset($_GET['update'])){
			echo "3";
      $sql = "Update items Set Description=:desc, Quantity =:quantity ,Price =:price, Brand =:brand , Category=:category Where ID=$itemID";
      $change = $db->prepare($sql);
			$change->bindParam(':desc', $description);
			$change->bindParam(':quantity',$quantity);
			$change->bindParam(':price',$price);
			$change->bindParam(':brand',$brand);
			$change->bindParam(':category',$category);
      $change->execute();
      echo "Database Updated";
      header("location:editmedicine.php?id=$itemID&view=Edit+Medicine");
    }
    elseif(isset($_GET['delete'])){
			echo "4";
      $sql = "Update items SET status='deleted' Where ID=$itemID";
      $change = $db->prepare($sql);
      $change->execute();
			echo "5";
      header('location:pharmacist_home.php');
    }

    $db=null;
  }catch(PDOException $e)
	{
		echo "6";
		die("Error Message".$e->getMessage());
	}

?>
