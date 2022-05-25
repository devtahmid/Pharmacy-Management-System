<?php
require('header.php') ;
session_start();

if (!isset($_SESSION['userId']))
  header('location: login_form.php?error=1');

if($_SESSION['userType'] != 'Pharmacist')
    header('location: index.php');
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
       require('project_connection.php');
       extract($_POST);
       if(isset($_POST['addSup'])){
         $sql = "Insert into `supplier`(`ID`, `name`, `number`) VALUES (Null,'$supName','$number')";
         $change= $db->prepare($sql);
         $change->execute();
         echo "<script> alert('Database Updated') </script>";
       }
     }
     catch (PDOException $e) {
       die("Error Message".$e->getMessage());
     }

     ?>
  </body>
</html>
