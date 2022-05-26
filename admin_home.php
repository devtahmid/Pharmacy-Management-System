<html>
<body>
<?php
require("header_admin.php");

?>
<br><br><br><br>
<div style="margin:auto; width:30%; height:50%; margin-top: 10%;">
<a class='btn btn-secondary btn-lg btn-block' href="admin_all_transactions.php">All transactions report</a><br>
<a class='btn btn-secondary btn-lg btn-block' href="admin_monthly_sales_report.php">Monthly Sales Report</a><br>
<a class='btn btn-secondary btn-lg btn-block' href="add_pharmacist_form.php">Add Pharmacist</a><br>
<a class='btn btn-secondary btn-lg btn-block' href="">Delete Pharmacist</a>

</div>
<?php

$alertMsg=null;
extract($_GET);
if ($alertMsg==1) {
  echo "<script> alert('Pharmacist Added!'); </script>";
}
elseif ($alertMsg==2) {
  echo "<script> alert('Pharmacist Deleted'); </script>";
}

 ?>
</body>
</html>
