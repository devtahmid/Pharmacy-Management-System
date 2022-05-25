<?php
require('header.php');
	// view more details clicked from somewhere
	session_start();
	if (!isset($_SESSION['userId']))
		header('location:reg_loginform.php?error=1');

	extract($_GET);

try
	{
		require('project_connection.php');
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

							echo "<div class='col-6 col-md-6'>";
								echo "<form method='get' action='purchase.php'>";
										 echo "<input type='hidden' name='id' value='".$row["ID"]."'/><br />";
										 echo "<input class='btn btn-secondary btn-lg btn-block' type='submit' name='view' value='make purchase'/> <br />";
								echo "</form>";

						echo "</td>";
						echo "</tr>";

						echo "<tr>";
						echo "<div class='col-6 col-md-4'>";
	            echo "<td colspan=2> <h5> Price: ".$row["Price"]."</h4></td>";
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

					echo "</div>";
					echo "</div>";

            echo "</td></h3>";
					echo "</tr>";

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
			<?php require("public_questions.php");?>
		</div>
	</section>
	</body>
</html>
<?php
		$db = null;
	}
	catch(PDOException $e)
	{
		die("Error Message".$e->getMessage());
	}


?>
