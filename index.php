<?php require('header.php') ;
session_start();
if (!isset($_SESSION['userId']))
  header('location: login_form.php?error=1');
?>
<html>
<head>
<title>
AUCTIONS.COM
</title>
<style>
h1 {text-align: center;}
h2 {text-align: center;}
          body {
  background-image: url('https://alicewalkersgarden.com/wp-content/uploads/Broadway-Grass2.jpg');
}
</style>
</head>

<body>
<?php

echo "<script>alert(".$_SESSION['userType']."')</script>";

if ($_SESSION['userType']=='Customer'){
//show customer home page (welcome page)
 ?>

<br><br><br><br><br>
<h1> Hii!</h1>

<h1> WELCOME TO PHARMACY MANAGEMENT SYSTEM </h1>


<h1> BY: SHAIKH TAHMIDUR RAHMAN</h1>
<h1>  ADARSH SHINJU CHANDRAN</h1>
<h1>  ASHRAF HARIS</h1>
<h1>  ALAWI HASIB</h1>
<h1>  REEMA SHAIKH</h1>

<?php
}//end of customer view

elseif ($_SESSION['userType']=='Pharmacist')
header('location: pharmcist_home.php');   //show customer home page (welcome page)

?>

</body>
<!--test line-->
</html>                                                                                                                                       
