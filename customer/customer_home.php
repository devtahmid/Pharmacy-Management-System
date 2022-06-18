<?php
require('header.php') ;
session_start();
if (!isset($_SESSION['userId']))
  header('location: ../login_form.php?error=1');
?>
<html>
<head>
<title>
AUCTIONS.COM
</title>
<style>
h1 {text-align: center;}
h3 {text-align: center;}
          body {
  background-image: url('https://alicewalkersgarden.com/wp-content/uploads/Broadway-Grass2.jpg');
}

</style>
</head>
<?php
//echo "<script>alert('".$_SESSION['userType']."')</script>";
 ?>
<body>
<br><br><br><br><br><br><br>
<h1> WELCOME TO PHARMACY MANAGEMENT SYSTEM </h1><br>
<h3>Click on Browse on the menu, to get started</h3>


</body>
</html>
