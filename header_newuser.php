<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Pharmacy Management System</title>
  <!-- Font Awesome icons (free version)-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet">
  <!-- Fonts CSS-->
  <link rel="stylesheet" href="css/heading.css">
  <link rel="stylesheet" href="css/body.css">
</head>

<body id="page-top">
  <nav class="navbar navbar-dark bg-secondary navbar-expand-lg ">
    <a class="navbar-brand font-weight-bold col" href="login_form.php">Pharmacy Management System</a>


    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->

    <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary py-2 text-white rounded" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="#navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>

    <div class="collapse navbar-collapse row" id="navbarTogglerDemo02">
      <form class="form-inline my-2 my-lg-0 col-lg-7 px-5 mx-auto" action="customer/search.php" method="post">
        <input class="form-control col-8 mr-2" type="search" placeholder="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">Search</button>
      </form>
      <ul class="navbar-nav mt-2 mt-lg-0 col-lg-5">
        <?php
        $pageName = basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */
        if ($pageName == "login_form.php") {
        ?>
          <li class="nav-item ml-lg-auto">
            <a class="nav-link text-white pl-5 pl-lg-3" href="registration_form.php">Register <span class="sr-only">(current)</span></a>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item ml-lg-auto">
            <a class="nav-link text-white pl-5 pl-lg-3" href="login_form.php">Login <span class="sr-only">(current)</span></a>
          </li>
        <?php
        }
        ?>
        <li class="nav-item">
          <a class="nav-link text-white pl-5 pl-lg-3" href="faq.php">FAQ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white pl-5 pl-lg-3" href="about.php">About</a>
        </li>
      </ul>

    </div>
  </nav>
  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
  <div class="scroll-to-top d-lg-none position-fixed"><a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a></div>
  <!-- Bootstrap core JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <!-- Contact form JS-->
  <script src="assets/mail/jqBootstrapValidation.js"></script>
  <script src="assets/mail/contact_me.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  </div>