<?php
try {
  require('project_connection.php');
  extract($_POST);
  if(isset($_POST['addMed'])){
    $sql = "Insert into `items`(`Name`, `Description`, `Quantity`, `Price`, `Brand`, `Category`, `Photo`) VALUES ('$medName','$desc',$quant,$price,'$brand','$cate','$photo')";
    $change= $db->prepare($sql);
    $change->execute();
     $insertId = $db->lastInsertId();


    $sql = "Insert into `pictures`(`ID`,`PICTURE`) VALUES ( ".$insertId.",'uploadedfiles/".$photo."')";
    $change= $db->prepare($sql);
    $change->execute();
    echo "<script> alert('Database Updated') </script>";
    header("Location: pharmacist_home.php");
  }


foreach($_FILES["photo"]["name"] as $key => $val)
{

    if ((($_FILES["photo"]["type"][$key] == "image/gif")
   || ($_FILES["photo"]["type"][$key] == "image/jpeg")
   || ($_FILES["photo"]["type"][$key] == "image/pjpeg"))
   && ($_FILES["photo"]["size"][$key] < 5000000))
   {
        if ($_FILES["photo"]["error"][$key] > 0)
          echo "Return Code: " . $_FILES["photo"]["error"][$key] . "<br />";

       else
       {
           $fdetails = explode(".",$_FILES["photo"]["name"][$key]);
           $fext= end($fdetails);

           $fn=$photo; // to give name

           if (move_uploaded_file($_FILES["photo"]["tmp_name"][$key], "uploadedfiles/$fn")){
             echo "<script>Console.log('picture uploaded')</script>";
             header("Location: pharmacist_home.php");
           }


               else {
                 echo "<script>Console.log('not uploaded')</script>";
               }

         }
     }
     else
     {
       echo"Please upload a correct image file";
     }
 }

$db->commit();
}
catch (PDOException $e) {
  die("Error Message".$e->getMessage());
}
