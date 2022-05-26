<?php
require('header_pharmacist.php') ;
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
    <title>Add Medicine</title>
  </head>
  <body>
    <div id='register' class='bg-secondary text-white container align-items-center'>
    <form method='post'>
       <label><h3>Medicine Name:</h3></label>
       <input class='form-control' type='text' name='medName' size='50'><br>
       <label><h3>Description:</h3></label>
       <input class='form-control' type='text' name='desc' size='100' required><br>

       <label><h3>Quantity:</h3></label>
       <input class='form-control' type='text' name='quant' size='30' ><br>

       <label><h3>Price:</h3></label>
       <input class='form-control' type='text' name='price' size='20' required><br>

       <label><h3>Brand:</h3></label>
       <input class='form-control' type='text' name='brand' size='20'><br>

       <label><h3>Category:</h3></label>
       <input class='form-control' type='text' name='cate' size='50'>

       <label class='col-form-label-lg'><h3>Expiry Date:</h3></label>>
       <input class="form-control" type="date" name="expiry" <?php echo " min =".date('Y-m-d')." required />";?>

       <label><h3>Photo:</h3></label>
       <input class='form-control' type='file' name='photo' placeholder=""  size='50' required><br>

       <input class='btn btn-lg btn-primary' type='submit' name='addMed' value='Add Medicine'>
     </form>

     <?php
     if((($_FILES['photo']['type']=='image/gif')
     || ($_FILES['photo']['type']=='image/jpeg')
     || ($_FILES['photo']['type']=='image/png')
     || ($_FILES['photo']['type']=='image/pjpeg'))
     && ($_FILES['photo']['size'] < 50000))
     {
       if ($_FILES['photo']['error'] > 0)
       {
         echo 'Return Code: '.$_FILES['photo']['error'].'<br/>';
       }
     }

     if(file_exists('uploadedfiles'.$_FILES['photo']['name']))
     {
       echo $_FILES['photo']['name']."already exists.";
     }
     else
       move_uploaded_file($_FILES['photo']['tmp_name'],'images/')

      ?>

   </div>
     <?php
     try {
       require('project_connection.php');
       extract($_POST);
       if(isset($_POST['addMed'])){
         $sql = "Insert into `items`(`ID`, `Name`, `Description`, `Quantity`, `Price`, `Brand`, `Category`, `Photo`) VALUES (Null,'$medName','$desc',$quant,$price,'$brand','$cate','$photo')";
         $change= $db->prepare($sql);
         $change->execute();

         $sql = "Insert into `pictures`(`PICTURE_ID`,`ID`,`PICTURE`) VALUES (Null, Null,'images/test')";
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
