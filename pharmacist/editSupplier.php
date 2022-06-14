<?php
require('header_pharmacist.php') ;
	// view more details clicked from somewhere
	 session_start();
	 if (!isset($_SESSION['userId']))
	   header('location:../reg_loginform.php?error=1');

   if($_SESSION['userType'] != 'Pharmacist')
     header('location:../index.php');

	extract($_GET);
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
		<div class='container align-items-center'>
      <form method = 'get' action='update_delete_supplier.php'>
			<?php
			try
				{
					require('../project_connection.php');
					$stmt = $db->query("select * from supplier where ID =".$supplierId);
				if($row = $stmt->fetch())
				{
					echo "<h1 class='page-section-heading text-secondary font-weight'>".$row["name"]."</h1>";


            ?>

						<div class='row'>
	           <h4 class='col-sm-3 col-md-8 col-lg-6'> number:</h4>
            <input class='btn-sm col-sm-3 col-md-2 col-lg-2' type='text' name='number' value='<?php echo $row["number"] ?>' required placeholder='Edit number'>
					</div>
					<input type='hidden' name='supplierId' value='<?php echo $row['ID']?>'>

		      <input class='btn btn-success btn-md col-md-6 col-lg-2' type='submit' name='update' value='Confirm' >
		      <input class='btn btn-danger btn-md col-md-6 col-lg-3' type='submit' name='delete' value='Terminate contract'>


				</form>


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
