<?php
require('header_pharmacist.php') ;
session_start();

if (!isset($_SESSION['userId']))
  header('location: ../login_form.php?error=1');

if($_SESSION['userType'] != 'Pharmacist')
    header('location: ../index.php');
?>

<html>
  <head>
    <style>
    #register {
        margin-top:135px;
        margin-left:auto;
        margin-right:auto;
        margin-bottom:70px;
        width:700px;
        padding:80px;
        padding-bottom: 25px;
        padding-top: 40px;
        border-radius: 5%;
        border: 5px solid black;
    }
    .register {
      font-size: 50px;
    }
    .form-control {
      font-size: 20px;
      font-weight: bolder;
    }
    .form-control::placeholder {
      font-weight: 50;
    }
    </style>
    <title>Add Supplier</title>
  </head>
  <body>
    <div id='register' class='bg-secondary text-white container align-items-center'>
    <form method='post'>
       <label><h3>Supplier Name:</h3></label>
       <input class='form-control' type='text' name='supName' size='50'><br>
       <label><h3>Number:</h3></label>
       <input class='form-control' type='text' name='number' size='100' required><br>
       <input class='btn btn-lg btn-primary' type='submit' name='addSup' value='Add Supplier'>
     </form>
   </div>
     <?php
     try {
       require('../project_connection.php');
       extract($_POST);
       if(isset($_POST['addSup'])){
         $sql = "Insert into `supplier`( `name`, `number`) VALUES ('$supName','$number', 'active')";
         $change= $db->prepare($sql);
         $change->execute();
         echo "<script> alert('Supplier Added') </script>";
       }
     }
     catch (PDOException $e) {
       die("Error Message".$e->getMessage());
     }

     ?>
     <br><br>
     <div style="text-align:center;">
   <a class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" href="pharmacist_home.php">Home</a>
     </div>
  </body>
</html>
