<?php
  require("header_pharmacist.php");
  require("noCache.php");
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
</head>

<body class='bg-primary'>
 <div id='register' class='bg-secondary text-white container align-items-center'>


 <div class="container d-flex align-items-center flex-column">
     <!-- Masthead Heading-->
     <h1 class="masthead-heading register">Place Order</h1>
     <!-- Icon Divider-->
     <div class="divider-custom divider-light">
         <div class="divider-custom-line"></div>
         <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
         <div class="divider-custom-line"></div>
     </div>
 </div>
 <form onSubmit="return checkRegistrationInputs();" method='post' action='reg_login.php'>
    <label><h3>Item Name:</h3></label>
    <input class='form-control' type='text' name='name' placeholder="maximum 50 characters"  size='50' required><br>

    <label><h3>Suplier:</h3></label>
    <input class='form-control' type='text' name='lname' placeholder="maximum 50 characters" onkeyup="checkFN(this.value)" size='50' required><br>
    <select class='form-control' name='UID'>
    <label><h3>Quantity:</h3></label>
    <input class='form-control' type='text' name='mail' placeholder="abc@example.com (30 characters max)" onkeyup="checkMAIL(this.value)" size='30' required><span id='mail_msg'></span><br>

    <input type='hidden' name='JSEnabled' value='false'>
    <input class='btn btn-lg btn-primary' type='submit' name='register_user' value='Register'>
  </form>
</br>
  <p>Already have an account? <b><a href="login_form.php">Sign in here.</a></b> </p>
 </div>
<?php

$error=null;
extract($_GET);
if ($error==2) {
  echo "<script> alert('Please enter valid inputs, perhaps turn on client side scripting'); </script>";
}
elseif ($error==3) {
  echo "<script> alert('Invalid credentials!'); </script>";
}
elseif ($error==4) {
  echo "<script> alert('Database error :('); </script>";
}

?>
</body>
</html>
