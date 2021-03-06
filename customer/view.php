<?php
require('header.php');
	// view more details clicked from somewhere
	session_start();
	if (!isset($_SESSION['userId']))
		header('Location: ../login_form.php?error=1');

	extract($_GET);

try
	{
		require('../project_connection.php');
		$stmt = $db->query("select * from items where ID =".$id);
		$stmtpic = $db->query("select PICTURE from pictures where ID =".$id);
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
			<table class='table table-borderless'>
			<?php
				if($row = $stmt->fetch())
				{
					echo "<h1 class='page-section-heading text-secondary font-weight'>".$row["Name"]."</h1>";
					echo "<div class='row'>";
						echo "<tr>";
						echo "<td rowspan = 5>";

						if($stmtpic->rowCount() == 0)
                echo "<img src='../medicine_pictures/default.jpg' height='400px' width='400px'/>";
						else
							{
								while($pic = $stmtpic->fetch())
								{
										echo "<div class='col-6 col-md-4 my-3'>";
										echo "<img src='../medicine_pictures/".$pic[0]."'height=400px width=400px/>";
										echo "</div></td></tr>";
								}
							}

						echo "<tr>";
						echo "<div class='col-6 col-md-4'>";
	            echo "<td colspan=2> <h5> Price(BD): ".$row["Price"]."</h4></td>";
	          echo "</tr>";

						echo "<tr>";
						echo "<div class='col-6 col-md-4'>";
	            echo "<td colspan=2> <h5> Brand: ".$row["Brand"]."</h4></td>";
	          echo "</tr>";

	          echo "<tr>";
						echo "<div class='col-6 col-md-4'>";
	            echo "<td colspan=2> <h5> Category: ".$row["Category"]."</h4></td>";
	          echo "</tr>";

	          echo "<tr>";
						echo "<div class='col-6 col-md-4'>";
	            echo "<td colspan=2> <h5> Description: ".$row["Description"]."</h4></td>";
	          echo "</tr>";

						echo "<tr><td><div>";
							echo "<form method='get' class='col-8' action='cart_addition.php'>";
									 echo "<input type='hidden' name='id' value='".$row["ID"]."'/><br />";
									 echo "<h5 class='col-md-3'>Quantity: </h5>";
									 echo "<div class='row'>";
									 echo "<input class='btn-lg col-md-6 col-lg-8' type='number' name='quantity' value='1' min='1' max='".$row["Quantity"]."'>";
									 echo "<input type='hidden' name='maxQuantity' value='".$row["Quantity"]."'/>";
									echo "<input class='btn btn-secondary btn-lg col-md-6 col-lg-4' type='submit' name='cart' value='Add to Cart'/>";
									echo "</div>";
									 echo "<input class='btn btn-secondary btn-lg col-12 btn-block' type='submit' name='purchase' value='make purchase'/>";
							echo "</form>";

						echo "</div></td>";
						echo "</tr>";

					echo "</div>";
					echo "</div>";



					echo "<br/>";
				}
			?>
			</table>
		</div>
	</section>
	<section class='page-section bg-primary text-white'>
		<div class='container'>
			<h1 class='page-section-heading'>Public Questions</h1>
		</br> </br> </br>
			<?php //require("public_questions.php");?>
		</div>
	</section>
	</body>
</html>
<?php
		$db =null;
	}
	catch(PDOException $e)
	{
		die("Error Message".$e->getMessage());
	}


?>
