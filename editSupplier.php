<?php
require('header_pharmacist.php') ;
	// view more details clicked from somewhere
	 session_start();
	 if (!isset($_SESSION['userId']))
	   header('location:reg_loginform.php?error=1');

   if($_SESSION['userType'] != 'Pharmacist')
     header('location: index.php');

	extract($_GET);
if(isset($view))
{
	$_SESSION["id"] = $id;
}
try
	{
		require('project_connection.php');
		$stmt = $db->query("select * from supplier where ID =".$_SESSION['id']);
	//	$stmtpic = $db->query("select PICTURE from pictures where ID =".$_SESSION['id']);
   // $stmt2 = $db->prepare("select USERNAME from users where USER_ID = ?");
?>

	<body>
		<header class="masthead bg-primary text-white text-center px-md-2">
		    <div class="container d-flex align-items-center flex-column">
		        <!-- Masthead Heading-->
		        <h1 class="masthead-heading">Supplier Details</h1>
		        <!-- Icon Divider-->
		        <div class="divider-custom divider-light">
		            <div class="divider-custom-line"></div>
		            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
		            <div class="divider-custom-line"></div>
		        </div>
		    </div>
		</header>
		<section class='page-section'>
		<div class='container'>
      <form method = 'get' action='update_delete_supplier.php'>
			<table class='table table-borderless'>
			<?php
				if($row = $stmt->fetch())
				{
					echo "<h1 class='page-section-heading text-secondary font-weight'>".$row["name"]."</h1>";
					echo "<div class='row'";
						echo "<tr>";
						echo "<td rowspan = 5>";
            ?>
						</td>
						</tr>
						<tr>
						<div class='col-6 col-md-4'>
	            <td colspan=2> <h5> number: <?php echo $row["number"]?></h4></td>
              <td> <input type='text' name='number' placeholder='Edit number'> </td>
	          </tr>


					</div>
					</div>

            </td></h3>
					</tr>

					<br/>


			</table>
      <input type='hidden' name='med' value='<?php echo $row['ID']?>'>
      <input type='submit' name='done' value='Confirm' >
      <input type='submit' name='delete' value='Delete Supplier'>
    </form>
    <?php
// Update Database
  /*    if(isset($_GET['done'])){
        extract($_GET);
        $itemID = $row['ID'];
        $sql = "Update items Set Description= '$description' ,Price = $price , Brand = '$brand' , Category= '$category' Where ID=$itemID";
        $change = $db->prepare($sql);
        $change->execute();
      }

      if(isset($_GET['delete'])){
        echo $row['ID'];

      }*/
    ?>
		</div>
	</section>

		</br> </br> </br>
		</div>
	</section>

	<br><br>
	<div style="text-align:center;">
<a class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" href="pharmacist_home.php">Home</a>
	</div>
	</body>
</html>
<?php

}

		$db = null;
	}
	catch(PDOException $e)
	{
		die("Error Message".$e->getMessage());
	}

?>
