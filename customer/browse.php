    <?php
    require ('header.php');

    session_start();
    if (!isset($_SESSION['userId']))
      header('location:../login_form.php');

    try
    {

        require ("../project_connection.php");

        $sql = "select * from items WHERE Quantity>0 AND expiry>CURRENT_DATE()";
        $rs = $db->query($sql);
        $stmtpic = $db->prepare("select picture from pictures where id = ? limit 1");
        //$x = $rs->rowcount();
      $db =null;
    }
    catch(PDOException $e)
    {
        die("Error Message" . $e->getMessage());
    }
    ?>
    <header class="masthead bg-primary text-white text-center px-md-3">
    <div class="container d-flex align-items-center flex-column">
    <!-- Masthead Heading-->
    <h1 class="masthead-heading">Items</h1>
    <!-- Icon Divider-->
    <div class="divider-custom divider-light">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
    <div class="divider-custom-line"></div>
    </div>

    </div>
    </header>
    <br/><br/>
    <section > <!-- class="text-center" removed -->
    <div class="container align-items-center">
    <!--<table class="table table-borderless"> -->
    <table class="table table-borderless">

    <?php
    foreach ($rs as $row)
    {

            echo "<div class='row'>";//row begins

        echo "<div class='col-3 col-md-3' col-sm-12>";//column for image

        $stmtpic->execute(array($row["ID"]));
        if ($pic = $stmtpic->fetch()) echo "<img src='../medicine_pictures/" . $pic[0] . "' height='250px' width='250px'/><br />";
        else echo "<img src='../medicine_pictures/default.jpg' height='250px' width='250px'/><br /><br />";

        echo "</div>";// end image column

        echo "<div class='col-9 col-md-9' col-sm-12>";//column for data

        echo "<h3 class='text'>" . $row["Name"] . "</h3><br />";
        echo "<h5 class='text'>Description: " . $row["Description"] . "</h5><br />";
        echo "<h5 class='text'>Price(BD): " . $row["Price"] . "</h5><br />";
        echo "<h5 class='text'>Brand: " . $row["Brand"] . "</h5><br />";
        echo "<h5 class='text'>Category: " . $row["Category"] . "</h5><br />";


        if($_SESSION['userType'] == 'Pharmacist')
        {
          echo "<h5 class='text'>Stock: " . $row["Quantity"] . "</h5><br />";
        }

        echo "<form method='get' action='view.php'>";
           echo "<input type='hidden' name='id' value='".$row["ID"]."'/><br />";
           echo "<input class='btn btn-secondary btn-lg btn-block' type='submit' name='view' value='View More Details'/> <br />";
        echo "</form>";

        if($_SESSION['userType'] == 'Pharmacist')
        {
          echo "<form method='get' action='../pharmacist/viewSupplier.php'>";
             echo "<input type='hidden' name='id' value='".$row["ID"]."'/><br />";
             echo "<input class='btn btn-secondary btn-lg btn-block' type='submit' name='view' value='View supplier'/> <br />";
          echo "</form>";
        }

        echo "</div> <br />";// end of data column
    ?>
    <script> var uniID = '_' + Math.random().toString(36).substr(2, 9);</script>
    <?php
        //echo $uniID."= <script> uniID </script>";
        //timer($date, $uniID);
        //echo '<h3 id='.json_encode($uniID).' class="text-bold text-primary">loading...</h3><br />';
        ################################################

        echo "</div>";//end of row
    }
    ?>

    </div>
    </table>
    </section>
    <br/> <br/> <br/>
    </body>
    </html>
