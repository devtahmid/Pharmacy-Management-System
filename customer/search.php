<?php
session_start();
if (!isset($_SESSION['userId']))
  header('location: ../login_form.php?error=1');

require('header.php');
	// Search box from index.php
	session_start();
	extract($_POST);

	if(!isset($_SESSION['userId']))
		header("Location:../login_form.php?error=1");

if (!isset($search)) {
	header("Location: ../index.php?error=5"); //nothing sent through form
}
elseif (trim($search)=="" ) {
	header("Location: ../index.php?error=6"); //search field empty
}
	try
	{
		require('../project_connection.php');
		$sql = "SELECT * FROM items WHERE Name like '%".$search."%';";
		//echo "<script> alert('".$search."'); </script>";
		$stmt = $db->query($sql);
		$stmtphoto = $db->prepare("SELECT PICTURE FROM pictures WHERE ID = ? limit 1");
		$db =null;
	}
	catch(PDOException $e)
	{
		die("Error Message".$e->getMessage());
	}

?>

	<html>
			<head>
				<title> Search Results </title>
			</head>
			<body>
				<header class="masthead bg-primary text-white text-center px-md-2">
				    <div class="container d-flex align-items-center flex-column">
				        <!-- Masthead Heading-->
				        <h1 class="masthead-heading">Search Results</h1>
				        <!-- Icon Divider-->
				        <div class="divider-custom divider-light">
				            <div class="divider-custom-line"></div>
				            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
				            <div class="divider-custom-line"></div>
				        </div>
				    </div>
				</header>
			</br>	</br> </br>
	<section class="text-center">
	  <div class="container align-items-center">
				<table class='table table-borderless'>
					<div class='row'>
				<?php
					if($stmt->rowCount() == 0)
						echo "<h3 class='text-primary'>No search results found !!!</h3>";

					while($row = $stmt->fetch())
					{
				  	echo "<div class='col-6 col-md-4'>";
							$stmtphoto->execute(array($row["ID"]));
							if ($photo = $stmtphoto->fetch()){
								//echo "<script> alert('".$photo[0]."'); </script>";
								echo "<img src='../medicine_pictures/".$photo[0]."' height='250px' width='250px'/><br />";
							}

							else
							echo "<img src='../medicine_pictures/default.jpg' height='250px' width='250px'/><br /><br />";

							echo "<h3 class='text-bold'>".$row["Name"]."</h3><br />";
							 echo "<form method='get' action='view.php'>";
									 echo "<input type='hidden' name='id' value='".$row["ID"]."'/><br />";
									 echo "<input class='btn btn-secondary btn-lg btn-block' type='submit' name='view' value='View More Details'/> <br />";
							 echo "</form>";
						echo "</div>";
					}
				?>
				</table>
			</div>
		</section>
				<br/> <br/> <br/>
			</body>
		</html>
<?php
?>
