<?php
//need duplicate faq and about ;really need to learn docker to simulate the perfect environment
//clicking on customer header wont work when user is on '/faq.php' because the links are in current directory. if links changed to customer/... then customer header wont work when on customer homepage because there is no customer folder inside customer folder
		require('noCache.php');
		session_start();
 	 if (isset($_SESSION['userId']))
			if($_SESSION['userType'] == 'Customer')
			require('header.php');

?>
<html>
<body>
				<table class='table table-borderless text-black'>
<br><br><br><br><br><br><br><br><br>
						  <tr>
							<td colspan=2><h3><u>Question :</u> Can we purchase from this website?</h3></td>
							</tr>
						   <tr>
							<td><h3> Answer : Yes.</h3></td>
							</tr>

							<tr>
							<td colspan=2><h3><u>Question :</u> Will I get a refund for my purchase?</h3></td>
							</tr>
							 <tr>
							<td><h3> Answer : Yes, you will have to come to our office.</h3></td>
							</tr>
							<tr>
							<td colspan=2><h3><u>Question :</u> Are the medicines reliable?</h3></td>
							</tr>
							 <tr>
							<td><h3> Answer : Yes, we store our medicines in the right temperature and remove expired medicines from our inventory automatically.</h3></td>
							</tr>

				</table>
				<br/> <br/> <br/>
			</body>
		</html>
