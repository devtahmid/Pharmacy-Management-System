<?php
//need duplicate faq and about ;really need to learn docker to simulate the perfect environment
//clicking on customer header wont work when user is on '/about.php' because the links are in current directory. if links changed to customer/... then customer header wont work when on customer homepage because there is no customer folder inside customer folder

	//about page
	session_start();
	if (isset($_SESSION['userId']))
 		if($_SESSION['userType'] == 'Customer')
		 	require('header.php');

?>

	<body>
		<header class="masthead bg-primary text-white text-center px-md-2">
		    <div class="container d-flex align-items-center flex-column">
		        <!-- Masthead Heading-->
		        <h1 class="masthead-heading">About</h1>
		        <!-- Icon Divider-->
		        <div class="divider-custom divider-light">
		            <div class="divider-custom-line"></div>
		            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
		            <div class="divider-custom-line"></div>
		        </div>
		    </div>
		</header>
		<section class='page-section'>
		<div class='container'>
			<table class='table table-borderless'>
			<h1 class='page-section-heading text-secondary font-weight'></h1>
				<div class='row'>
					<tr>
						<td rowspan = 5>

									<div class='col-6 col-md-4 my-3'>";
										<img src='../website_pictures/about.jpg' height=400px width=400px/>";
										</div>

						<div class='col-6 col-md-6'>";

              </td>
					</tr>

					<tr>
					<div class='col-6 col-md-4'>
	          <td colspan=2> <h5></h4></td>
	         </tr>

					<tr>
					<div class='col-6 col-md-4'>
	          <td colspan=2> <h5>Pharmacy Management System is an online solution to bring medicine purchasing anywhere you're present in the world. The platform allows customers to purchase medicine, browse available medicines and view their purchase history. Pharmacists who are in charge of the medicine stocks add medicines to stock and order new stock from suppliers. The owner of the platform, the admin handles the financial side of the platform and is able to view a wide variety of reports generated.</h4></td>
	          </tr>

	          					<tr>
					<div class='col-6 col-md-4'>
	        <td colspan=2> <h5>Our office Location: Bahrain, Manama, Road 123, Building 876</h4></td>
	          </tr>

	          						<tr>
					<div class='col-6 col-md-4'>
	         <td colspan=2> <h5></h4></td>
	         </tr>

				</div>
				</div>

        </td></h3>
					</tr>

					<br/>

			</table>
		</div>
	</section>
	<section class='page-section bg-primary text-white'>
		<div class='container'>
			<h1 class='page-section-heading'>Public Questions</h1>
		</br> </br> </br>

		</div>
	</section>
	</body>
</html>
