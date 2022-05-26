<?php
//add Pharmacist -insertion into db
session_start();
if (!isset($_SESSION['userId']))
  header('location:reg_loginform.php?error=1');
if ($_SESSION['userType']!="Admin") {
  header('location:reg_loginform.php?error=1');
}

try {
  extract($_POST);
    require("project_connection.php");
    $db->beginTransaction();
    $sql="insert into user (Username, Email, Password, Type) values ('".$username."', '".$email."', '".$password."', 'Pharmacist')";
    $result=$db->prepare($sql);
    $result->execute();
    //var_dump($result);
    $insertId = $db->lastInsertId();
    echo $insertId;
    $db->commit();
  }
 catch(PDOException $ex)
 {
    die("Error Message".$ex->getMessage());
    $db->rollback();
}
echo "<script> alert('Pharmacist Added!');</script>";
header("Location: admin_home.php?alertMsg=1");

 ?>
