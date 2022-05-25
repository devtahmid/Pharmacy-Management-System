<?php
require('header.php');
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
		$stmt = $db->query("select * from items where ID =".$_SESSION['id']);
		$stmtpic = $db->query("select PICTURE from pictures where ID =".$_SESSION['id']);
   // $stmt2 = $db->prepare("select USERNAME from users where USER_ID = ?");
?>

	<body>
		<header class="masthead bg-primary text-white text-center px-md-2">
		    <div class="container d-flex align-items-center flex-column">
		        <!-- Masthead Heading-->
		        <h1 class="masthead-heading">Items Details</h1>
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
      <form method = 'get' action='update_delete_medicine.php'>
			<table class='table table-borderless'>
			<?php
				if($row = $stmt->fetch())
				{
					echo "<h1 class='page-section-heading text-secondary font-weight'>".$row["Name"]."</h1>";
					echo "<div class='row'";
						echo "<tr>";
						echo "<td rowspan = 5>";

						if($stmtpic->rowCount() == 0)
                echo "<img src='images/default.jpg' height='400px' width='400px'/>";
						else
							{
								while($pic = $stmtpic->fetch())
								{
										echo "<div class='col-6 col-md-4 my-3'>";
										echo "<img src='".$pic[0]."'height=400px width=400px/>";
										echo "</div>";
								}
							}
            ?>
						</td>
						</tr>
						<tr>
						<div class='col-6 col-md-4'>
	            <td colspan=2> <h5> Price: <?php echo $row["Price"]?></h4></td>
              <td> <input type='text' name='price' placeholder='Edit Price'> </td>
	          </tr>

						<tr>
						<div class='col-6 col-md-4'>
	            <td colspan=2> <h5> Brand: <?php echo $row["Brand"]?></h4></td>
              <td> <input type='text' name='brand' placeholder='Edit Brand'> </td>
	          </tr>

	          <tr>
						        <div class='col-6 col-md-4'>
	                     <td colspan=2> <h5> Category: <?php echo $row["Category"]?></h4></td>
                       <td>
												 <input list='category' name='category' placeholder='Edit Category'>
												 <datalist id="category">
													  <option value="Pill">
													  <option value="Gel">
													  <option value="Tablet">
													  <option value="Spray">
													  <option value="Inhaler">
														<option value="Drink">
													</datalist>
											 </td>
	          </tr>

	          						<tr>
						<div class='col-6 col-md-4'>
	            <td colspan=2> <h5> Description: <?php echo $row["Description"]?></h4></td>
              <td> <input type='text' name='description' placeholder='Edit Description'> </td>
	          </tr>

					</tr>

											<tr>
					<div class='col-6 col-md-4'>
						<td colspan=2> <h5> Order Stock From Supplier: <?php echo $row["Quantity"]?></h4></td>
						<td> <input type='number' name='quantity' min='<?php echo $row["Quantity"]?>' placeholder='<?php echo $row["Quantity"]?>'> </td>
					</tr>


					</div>
					</div>

            </td></h3>
					</tr>

					<br/>


			</table>
      <input type='hidden' name='med' value='<?php echo $row['ID']?>'>
      <input type='submit' name='done' value='Confirm' >
      <input type='submit' name='delete' value='Delete Medicine'>
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
