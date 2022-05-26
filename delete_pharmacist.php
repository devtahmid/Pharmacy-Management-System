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
    $sql="DELETE FROM user WHERE UID=".$UID;
    $result=$db->prepare($sql);
    $result->execute();
    //var_dump($result);
    $db->commit();
  }
 catch(PDOException $ex)
 {
    die("Error Message".$ex->getMessage());
    $db->rollback();
}

header("Location: admin_home.php?alertMsg=2");

 ?>
