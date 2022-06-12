<?php
//CHECKS IF ENTERED USERNAME, EMAIL, PASSWORD, MOBILE ALREADY EXISTS IN DB ->FOR REGISTRATION AND EDIT PROFILE
require("noCache.php");
//validate username and password
extract($_GET);
try {
require('project_connection.php');
if (isset($uname)) {
$conn = $db->prepare("SELECT Username FROM user WHERE Username= :un");
$conn->bindParam(':un' , $uname);
}
elseif (isset($email)) {
$conn = $db->prepare("SELECT Email FROM user WHERE Email= :mail");
$conn->bindParam(':mail' , $email);
}
elseif (isset($mobile)) {
$conn = $db->prepare("SELECT Mobile FROM customer WHERE Mobile= :num");
$conn->bindParam(':num' , $mobile);
}
$conn->execute();
$row=$conn->fetchAll();
if (sizeof($row)==0)
  echo "absent";
else
  echo "present";
} catch (PDOException $e) {
echo "Error Message ".$e->getMessage();
}
?>
