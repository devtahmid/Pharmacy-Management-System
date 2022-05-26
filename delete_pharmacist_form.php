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
          <h1 class="masthead-heading">Delete Pharmacist</h1>
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
    <td></td>
  <td><b>Username</b></td>
  <td></td>
  </tr>
<tr>
  <form method='post' action='delete_pharmacist.php'>

    <td></td>
    <td >
    <select class='form-control' style="width:30%; margin-left:35%;"  name='UID'>
      <?php
      try {

      require("project_connection.php");
      $db->beginTransaction();
      $sql="SELECT UID, Username FROM user WHERE Type='Pharmacist'";
      $result=$db->prepare($sql);
      $result->execute();
      //var_dump($result);
      $rows=$result->fetchAll();
      foreach ($rows as $row ) {
      echo "<option value='".$row[UID]."'>".$row['Username']."</option>";
      }


      $db->commit();
    }
   catch(PDOException $ex)
   {
      die("Error Message".$ex->getMessage());
      $db->rollback();
  }
       ?>
</select>
    </td>
    <td></td>
</tr>
<tr>
  <td></td>
  <td style="margin:0 auto; display:block;">
  <input class='btn btn-lg btn-danger submit' type='submit' name='delete_pharmacist' value='Delete Pharmacist'>
</td>
<td></td>
</tr>
</form>

</table>
<br><br>
<div style="text-align:center;">
<a class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" href="admin_home.php">Home</a>
</div>
</body>
</html>
