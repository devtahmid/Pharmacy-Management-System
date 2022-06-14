<?php
require ('header_pharmacist.php');

session_start();
if (!isset($_SESSION['userId']))
	header('location:../reg_loginform.php?error=1');

try
{

		require ("../project_connection.php");

		$sql = "select * from supplier WHERE contract='active'";
		$rs = $db->query($sql);
	//	$stmtpic = $db->prepare("select picture from pictures where id = ? limit 1");
		//$x = $rs->rowcount();

}
catch(PDOException $e)
{
		die("Error Message" . $e->getMessage());
}
?>
<header class="masthead bg-primary text-white text-center px-md-3">
<div class="container d-flex align-items-center flex-column">
<!-- Masthead Heading-->
<h1 class="masthead-heading">Suppliers</h1>
<!-- Icon Divider-->
<div class="divider-custom divider-light">
<div class="divider-custom-line"></div>
<div class="divider-custom-icon"><i class="fas fa-star"></i></div>
<div class="divider-custom-line"></div>
</div>

</div>
</header>
<br/><br/>
<!-- class="text-center" removed -->
<div class="container align-items-center">
<!--<table class="table table-borderless"> -->
<div class="container d-flex align-items-center flex-column">
<button onclick="location.href = 'addSupplier.php';" class='btn btn-success btn-lg col-md-4 col-lg-4'>
	Add Supplier
</button>
</div>
<br><br>
<?php
foreach ($rs as $row)
{

				echo "<div class='row'>";//row begins

		echo "<div class='col-9 col-md-9' col-sm-12>";//column for data

		echo "<h3 class='text'>" . $row["name"] . "</h3><br />";
		echo "<h5 class='text'>Number: " . $row["number"] . "</h5><br />";


		if($_SESSION['userType'] == 'Pharmacist')
		{
			echo "<form method='get' action='editSupplier.php'>";
				 echo "<input type='hidden' name='supplierId' value='".$row["ID"]."'/><br />";
				 echo "<input class='btn btn-secondary btn-lg btn-block' type='submit' name='view' value='Edit Supplier'/> <br />";
			echo "</form>";
		}

		echo "</div> <br />";// end of data column
?>
<script> var uniID = '_' + Math.random().toString(36).substr(2, 9);</script>
<?php
		//echo $uniID."= <script> uniID </script>";
		//timer($date, $uniID);
		//echo '<h3 id='.json_encode($uniID).' class="text-bold text-primary">loading...</h3><br />';
		################################################

		echo "</div>";//end of row
}
?>

</div>

<?php
extract($_GET);
if (isset($msg)) {
	if ($msg==1)
		echo "<script>alert('Supplier details updated')</script>";
	elseif ($msg==2)
		echo "<script>alert('Supplier contract terminated')</script>";

}

?>
</body>
</html>
