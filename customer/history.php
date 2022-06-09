<?php
session_start();
if (!isset($_SESSION['userId']))
  header('location:reg_loginform.php?error=1');
 ?>
<html>
<head>
</head>
<body>
  <?php require('header.php'); ?>
  <header class="masthead bg-primary text-white text-center px-md-2">
      <div class="container d-flex align-items-center flex-column">
          <!-- Masthead Heading-->
          <h1 class="masthead-heading">Purchase History</h1>
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
  	require('project_connection.php');
  	 $db->beginTransaction();

  	 $sql="SELECT * from purchase where c_id=".$_SESSION['userId'];
  	 $stmt1 = $db->prepare($sql);
  	 $stmt1->execute();

     if($stmt1->rowCount() != 0){
       ?>
       <table class='table table-dark' style="text-align: center;">
       <tr>
       <td><b>Item name</b></td>
       <td><b>Quantity</b></td>
       <td><b>Date</b></td>
       </tr>
       <?php
       $row1s = $stmt1->fetchAll();
       foreach ($row1s as $row1) {
         $item_id = $row1['item_id'];
        $sql="SELECT Name from items where ID=".$item_id;
      	 $stmt2 = $db->prepare($sql);
      	 $stmt2->execute();
        $row2 = $stmt2->fetch();
?>
<tr>
<td><?php echo $row2['Name'];  ?></td>
<td><?php echo $row1['quantity'];  ?></td>
<td><?php echo $row1['date'];  ?></td>
</tr>
<?php
            }//foreach end
          echo "</table>";
        }//if rowcount end
        else {//if nothing to show in purchase history
          echo "<br><br><br><br><br><p style='text-align:center;'>No purchases made</p>";
        }
  	}//try end
  	catch(PDOException $ex)
  	{
  		 die("Error Message".$ex->getMessage());
   }
?>
</body>
</html>
