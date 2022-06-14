<?php
//FUTURE WORK - add button to remove items from expired
session_start();
if (!isset($_SESSION['userId']))
  header('location:../reg_loginform.php?error=1');
if ($_SESSION['userType']!="Pharmacist") {
  header('location:../reg_loginform.php?error=1');
}
?>

<html>
<?php echo require('header_pharmacist.php'); ?>
<body>
  <header class="masthead bg-primary text-white text-center px-md-2">
      <div class="container d-flex align-items-center flex-column">
          <!-- Masthead Heading-->
          <h1 class="masthead-heading">Expired Stock</h1>
          <!-- Icon Divider-->
          <div class="divider-custom divider-light">
              <div class="divider-custom-line"></div>
              <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
              <div class="divider-custom-line"></div>
          </div>
      </div>
  </header>
  <?php


    try
    	{
    	require('../project_connection.php');
    	 $db->beginTransaction();

    	 $sql="SELECT * from items WHERE expiry <= CURRENT_DATE()";
    	 $stmt1 = $db->prepare($sql);
    	 $stmt1->execute();

       if($stmt1->rowCount() != 0){
         ?>
         <table class='table table-dark' style="text-align: center;">
         <tr>
         <td><b>Item name</b></td>
         <td><b>Quantity</b></td>
         <td><b>Category</b></td>
         <td><b>Expiry Date</b></td>
         </tr>
         <?php
         $row1s = $stmt1->fetchAll();
         foreach ($row1s as $row1) {
  ?>
  <tr>
  <td><?php echo $row1['Name'];  ?></td>
  <td><?php echo $row1['Quantity'];  ?></td>
  <td><?php echo $row1['Category'];  ?></td>
  <td><?php echo $row1['expiry'];  ?></td>
  </tr>
  <?php
              }//foreach end
            echo "</table>";
          }//if isset end
    	}//try end
    	catch(PDOException $ex)
    	{
    		 die("Error Message".$ex->getMessage());
     }
  ?>
  <br><br>
  <div style="text-align:center;">
<a class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" href="pharmacist_home.php">Home</a>
  </div>
  </body>
  </html>
