<?php
//USED TO VERIFY USERNAME AND PASSWORD AFTER USER SUBMITS LOG IN FORM...COMES FROM reg_login.php
require("noCache.php");
//validate username and password
extract($_GET);
$unameFlag=$pwdFlag=false;
$unamePattern='/^[a-z0-9]\w{4,19}$/i';
$pwdPattern='/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/';
if(preg_match($unamePattern, $username))
$unameFlag=true;
if(preg_match($pwdPattern, $password))
$pwdFlag=true;

if (!($unameFlag&&$pwdFlag)) //validation not done on client side and values!=pattern
header('location:login_form.php?error=2');
else{ //good values, now need to check if they're in DB
  try{
  require('project_connection.php');

  $conn = $db->prepare("SELECT * FROM user WHERE Username= '$username'");
//  $conn->bindParam(':un' , $username);
  $conn->execute();

  if ($conn->rowCount()==0) {
      header('location:login_form.php?error=3');
  }
  elseif ($conn->rowCount()==1) {
    $row=$conn->fetch();
    $h_password=$row['Password'];
    if ($h_password == $password) {
      //successful login
      session_start();
      $_SESSION['activeUser']=$username;
      $_SESSION['userId']=$row['UID'];
      $_SESSION['userType']=$row['Type'];
      header('location:index.php');

    }
    else {
      header('location:login_form.php?error=3');
    }
  }
  $db =null;
  }
  catch(PDOException $e){ //will say "DB issues" on reg_loginform.php without refreshing
      echo "Error Message ".$e->getMessage();
      header('location:login_form.php?error=4');

  }
}
?>
