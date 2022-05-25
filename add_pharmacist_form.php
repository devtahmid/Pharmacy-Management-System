<?php
//add Pharmacist form
session_start();
if (!isset($_SESSION['userId']))
  header('location:reg_loginform.php?error=1');
if ($_SESSION['userType']!="Admin") {
  header('location:reg_loginform.php?error=1');
}
?>

<html>
<?php echo require('header_admin.php'); ?>
<body>
  <header class="masthead bg-primary text-white text-center px-md-2">
      <div class="container d-flex align-items-center flex-column">
          <!-- Masthead Heading-->
          <h1 class="masthead-heading">Add Pharmacist</h1>
          <!-- Icon Divider-->
          <div class="divider-custom divider-light">
              <div class="divider-custom-line"></div>
              <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
              <div class="divider-custom-line"></div>
          </div>
      </div>
  </header>

  <table class='table table-dark' style="text-align: center; widht:75%;">
  <tr>
  <td><b>Username</b></td>
  <td><b>Email</b></td>
  <td><b>Password</b></td>
  </tr>
<tr>
  <form method='post' action='add_pharmacist.php'>
    <td><input class='form-control' type='text' name='username' placeholder="5-20 characters" size='20' required><span id='login_username_msg'></span><br></td>
    <td><input class='form-control' type='text' name='email' placeholder="example@xyz.com" size='40' required><span id='login_email_msg'></span></td>
    <td><input class='form-control' type='text' name='password' placeholder="6-20 characters" size='20' required><span id='login_pwd_msg'></span></td>
</tr>
<tr>
  <td></td>
  <td style="margin:0 auto; display:block;">
  <input class='btn btn-lg btn-primary submit' type='submit' name='add_pharmacist' value='Add Pharmacist'>
</td>
<td></td>
</tr>
</form>

</table>

</body>
</html>
