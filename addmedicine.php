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
    <header class="masthead bg-primary text-white text-center px-md-2">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Heading-->
            <h1 class="masthead-heading">Add Medicine to Stock</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
        </div>
    </header>


    <div id='register' class='bg-secondary text-white container align-items-center'>
    <form method='post' action='addmedicine_process.php'>
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

       <label><h3>Photo(images<=5MB):</h3></label>
       <input class='form-control' type='file' name='photo' placeholder=""  required><br>

       <input class='btn btn-lg btn-primary' type='submit' name='addMed' value='Add Medicine'>
     </form>

       </body>
</html>
