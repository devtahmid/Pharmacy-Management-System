<?php
require('header_pharmacist.php');
	// view more details clicked from somewhere
	 session_start();
	 if (!isset($_SESSION['userId']))
	   header('location:../reg_loginform.php?error=1');

   if($_SESSION['userType'] != 'Pharmacist')
     header('location: ../index.php');

	extract($_GET);
if(isset($view))
{
	$_SESSION["id"] = $id; //$id comes from pharmacist home
}
else {
	header('location: pharmacist_home.php?msg=1'); //tryring to access view without itemID
}
try
	{
		require('../project_connection.php');
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
                echo "<img src='../medicine_pictures/default.jpg' height='400px' width='400px'/>";
						else
							{
								$pic = $stmtpic->fetch();
									echo "<div class='col-6 col-md-4 my-3'>";
									echo "<img src='../medicine_pictures/".$pic['PICTURE']."'height=400px width=400px/>";
									echo "</div>";
							}
            ?>
						</td>
						</tr>
						<tr>
						<div class='col-6 col-md-4'>
	            <td colspan=2> <h4> Price: </h4></td>
              <td> <input class='btn-lg col-md-9 col-lg-8' type='text' name='price' value='<?php echo $row["Price"];?>' placeholder='Edit Price'> </td>
	          </tr>
					</div>

						<tr>
						<div class='col-6 col-md-4'>
	            <td colspan=2> <h4> Brand:</h4></td>
              <td> <input class='btn-lg col-md-9 col-lg-8' type='text' name='brand' value='<?php echo $row["Brand"];?>' placeholder='Edit Brand'> </td>
	          </tr>
					</div>

	          <tr>
						        <div class='col-6 col-md-4'>
	                     <td colspan=2> <h4> Category:</h4></td>
                       <td>
												 <input class='btn-lg col-md-9 col-lg-8' id='categoryList' list='category' name='category' value='<?php echo $row["Category"]?>' onfocus="this.value=''" onchange="this.blur()" onkeyup="listChange()"  placeholder='Edit Category'>
												 <datalist id="category">
													  <option value="Pill">
													  <option value="Gel">
													  <option value="Tablet">
													  <option value="Spray">
													  <option value="Inhaler">
														<option value="Drink">
													</datalist>
											 </td>
										 </div>
	          </tr>

	          						<tr>
						<div class='col-6 col-md-4'>
	            <td colspan=2> <h4> Description:</h4></td>
              <td> <input class='btn-lg col-md-9 col-lg-8' type='text' name='description' value=' <?php echo $row["Description"]?>' placeholder='Edit Description'> </td>
						</div>
	          </tr>



											<tr>
					<div class='col-6 col-md-4'>
						<td></td>
						<td colspan=2> <h4> Quantity in Stock: </h4></td>
						<td> <input class='btn-lg col-md-9 col-lg-8' type='number' name='quantity' value='<?php echo $row["Quantity"]?>' min='<?php echo $row["Quantity"]?>' max='100' placeholder='Edit quantity'> </td>
					</div>
					</tr>

					<tr>
						<td></td>
						<td colspan=2>
      <input type='hidden' name='itemID' value='<?php echo $row['ID']?>'>
      <input class='btn btn-secondary btn-md col-md-8 col-lg-8' type='submit' name='update' value='update' >
		</td>
		<td colspan=2>
      <input class='btn btn-danger btn-md col-md-9 col-lg-9' type='submit' name='delete' value='Delete Medicine'>
		</td>
		</tr>
			</table>
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
	<script>
		function listChange(){
			console.log('function called');
			if (document.getElementById('categoryList').value.length==0) {
				console.log('function called2');
				document.getElementById('categoryList').blur();
				document.getElementById('categoryList').focus();
			}

		}
	</script>
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
