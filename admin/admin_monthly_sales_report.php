<?php
//Generate all transactions form
session_start();
if (!isset($_SESSION['userId']))
  header('location:../reg_loginform.php?error=1');
if ($_SESSION['userType']!="Admin") {
  header('location:../reg_loginform.php?error=1');
}
?>

<html>
<?php echo require('header_admin.php'); ?>
<body>
  <header class="masthead bg-primary text-white text-center px-md-2">
      <div class="container d-flex align-items-center flex-column">
          <!-- Masthead Heading-->
          <h1 class="masthead-heading">Monthly Sales Report</h1>
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

    	 $sql="SELECT EXTRACT(YEAR_MONTH FROM date) FROM purchase GROUP BY EXTRACT(YEAR_MONTH FROM date)";
    	 $stmt1 = $db->prepare($sql);
    	 $stmt1->execute();

       if($stmt1->rowCount() != 0){
         ?>
         <table class='table table-dark' style="text-align: center;">
         <tr>
         <td><b>Month-Year</b></td>
         <td><b>Units</b></td>
         <td><b>Total Price</b></td>
         </tr>
         <?php
         $row1s = $stmt1->fetchAll(); //all month-year s
         foreach ($row1s as $row1) { // for 1 month-year
           $sql2="SELECT item_id, quantity from purchase where EXTRACT(YEAR_MONTH FROM date) =".$row1[0]; //get all the purchases done in that month-year
           $stmt2 = $db->prepare($sql2);
        	 $stmt2->execute();
           $row2s = $stmt2->fetchAll();
           $month_revenue=0;
           $month_quantity_sold=0;
           foreach ($row2s as $row2) { //$row2 is each purchase , need the item_id's item price
             $item_id = $row2['item_id'];

             $sql3="SELECT Price from items where ID=".$item_id;
             $stmt3 = $db->prepare($sql3);
          	 $stmt3->execute();
             $row3= $stmt3->fetch();
            $month_revenue= $month_revenue+ ( $row3['Price']*$row2['quantity']);
            $month_quantity_sold+=$row2['quantity'];
           }



  ?>
  <tr>
  <td><?php echo $row1[0][0]."".$row1[0][1]."".$row1[0][2]."".$row1[0][3]."-".$row1[0][4]."".$row1[0][5];  ?></td>
  <td><?php echo $month_quantity_sold ?></td>
  <td><?php echo $month_revenue;  ?></td>
  </tr>

  <?php
              }//foreach end
            echo "</table>";
          }//if isset end
      $db =null;
    	}//try end
    	catch(PDOException $ex)
    	{
    		 die("Error Message".$ex->getMessage());
     }
  ?>
  <br><br><br>
  <div style="text-align:center;">
<a class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" href="admin_home.php">Home</a>
  </div>

  </body>
  </html>
