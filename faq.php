<?php

		require('header.php');
		require('noCache.php');
		session_start();
 	 if (!isset($_SESSION['userId']))
 	   header('location:reg_loginform.php?error=1');

    if($_SESSION['userType'] != 'Customer')
      header('location: index.php');

?>
<html>
<body>
				<table class='table table-borderless text-black'>
<br><br><br><br><br><br><br><br><br>
						  <tr>
							<td colspan=2><h3><u>Quention :</u> Can we purchase from this website?</h3></td>
							</tr>
						   <tr>
							<td><h3> Answer : Yes.</h3></td>
							</tr>

							<tr>
							<td colspan=2><h3><u>Quention :</u> Will I get a refund for my purchase?</h3></td>
							</tr>
							 <tr>
							<td><h3> Answer : Yes, you will have to come to our office.</h3></td>
							</tr>
							<tr>
							<td colspan=2><h3><u>Quention :</u> Are the medicines reliable?</h3></td>
							</tr>
							 <tr>
							<td><h3> Answer : Yes, we store our medicines in the right temperature and remove expired medicines from our inventory automatically.</h3></td>
							</tr>

				</table>
				<br/> <br/> <br/>
			</body>
		</html>
