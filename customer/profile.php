<html>
<?php
require('header.php');
echo "<br><br><br>";
session_start();
if (!isset($_SESSION['userId']))
  header('location:../reg_loginform.php?error=1');
$sid=$_SESSION['userId'];
try{
  require('../project_connection.php');
  $userResult= $db->prepare("SELECT * FROM user WHERE UID= :id");
  $userResult->bindParam(':id' , $sid);
  $userResult->execute();
  $customerResult=$db->prepare("SELECT * FROM customer WHERE UID= :id");
  $customerResult->bindParam(':id' , $sid);
  $customerResult->execute();
  $pfpResult= $db->prepare("SELECT * FROM profile_pictures WHERE UID= :id");
  $pfpResult->bindParam(':id', $sid);
  $pfpResult->execute();
  $userRow= $userResult->fetch();
  $customerRow=$customerResult->fetch();
  $pfpRow= $pfpResult->fetch();
  $username=$userRow['Username'];
  $password=$userRow['Password'];
  $Fname=$customerRow['Fname'];
  $Lname=$customerRow['Lname'];
  $mobile=$customerRow['Mobile'];
  $email=$userRow['Email'];
  $building=$customerRow['Building'];
  $block=$customerRow['Block'];
  $country="Bahrain"; //check comment under form.select in above if statement
  $profile_pic=$pfpRow['Profile_pic'];
  $db =null;
  }
  catch(PDOException $e){
   echo "<script>alert('Error ".$e->getMessage()."\\nPlease refresh');</script>"; //paste in b/w ".$e->getMessage()."  to see errror

  }

?>
<head>

<?php //changes adarsh made ?>
    <style>
    #profile {
        margin-top:135px;
        margin-left:auto;
        margin-right:auto;
        width:800px;
        padding:80px;
        padding-bottom: 25px;
        padding-top: 40px;
        border-radius: 5%;
        border: 5px solid black;
    }
    .submit {
      text-align: center;
    }
    .profile {
      font-size: 25px;
    }
    .form-control {
      font-size: 20px;
      font-weight: bolder;
    }
    .form-control::placeholder {
      font-weight: 50;
    }
    .profile-pic{
      width:200px;
      height:200px;
      align-self: auto;
    }
    </style>
<?php //changes adarsh made ?>

  <script>
<?php
//declaring js variables with current value for validation. if user enters same value, validation message =""
echo "username='".$username."'\n";
echo "password='".$password."'\n";
echo "Fname='".$Fname."'\n";
echo "Lname='".$Lname."'\n";
echo "mobile='".$mobile."'\n";
echo "email='".$email."'\n";
echo "building='".$building."'\n";
echo "block='".$block."'\n";
echo "country='Bahrain'\n"; //check comment under form.select in above if statement

?>
MAX_FILE_SIZE=5000000;   //5MB
    var nameFlag=emailFlag=usernameFlag=passwordFlag=cnfmpasswordFlag=mobileFlag=addressFlag=fileUploadFlag=true; //true by default
    function checkFN(name1, id) { //check full name
      var nameExp =/^([a-z]{2,}\s)*[a-z]+$/i;
      if (name1.length == 0) {
        msg = "Enter name!";
        color = "red";
        nameFlag = false;
      }
      else if (!nameExp.test(name1)) {
        msg = "Invalid Name";
        color = "red";
        nameFlag = false;
      }
      else {
        msg = "Valid Name";
        color = "green";
        nameFlag = true;
      }
      document.getElementById(id).style.color = color;
      document.getElementById(id).innerHTML = msg;
    }

    function checkUN(uname) {  //check username
      var unameExp = /^[a-z0-9]\w{4,19}$/i;
      if (uname.length == 0) {
        msg = "Enter username!";
        color = "red";
        usernameFlag = false;
      }
      else if (!unameExp.test(uname)) {
        msg = "Invalid Username";
        color = "red";
        usernameFlag = false;
      }
      else {
        if (uname.toLowerCase()==username.toLowerCase()) {  //usernames cant be same eveb if they have different cases (upper/lower case)
          msg="";
          color="green";
        }
        else{
        msg = "Valid Username";
        color = "green";
        usernameFlag = true;
        ajaxexists(uname,"uname");
        }
      }
      document.getElementById('reg_username_msg').style.color = color;
      document.getElementById('reg_username_msg').innerHTML = msg;
    }

    function checkPWD(pwd) { //check password
      //console.log(pwd);
      var pwdExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
      if (pwd.length == 0) {
        msg = ""; //accepted to retain original values
        color = "red";
        passwordFlag = true;
      }
      else if (!pwdExp.test(pwd)) {
        msg = "Invalid password";
        color = "red";
        passwordFlag = false;
      }
      else {
        msg = "Valid password";
        color = "green";
        passwordFlag = true;
      }
      document.getElementById('profile_pwd_msg').style.color = color;
      document.getElementById('profile_pwd_msg').innerHTML = msg;
      confirmPWD(document.forms[0].cnfm_password.value);
    }

    function confirmPWD(cpassword) { //check 2nd password
      if ((cpassword.length == 0)&& (document.forms[0].password.value.length==0)) {
        msg = "";
        cnfmpasswordFlag = true;
      }
      else if (cpassword.length == 0) {
        msg = "";
        cnfmpasswordFlag = false;
      }
      else if (document.getElementById('reg_pwd_msg').innerHTML== 'Invalid password') {
        msg="enter valid password first";
        color="red";
        cnfmpasswordFlag=false;
      }
      else
      {
        var firstPwd = document.forms[0].password.value;

        if (firstPwd.length==0) {
          msg="";
          cnfmpasswordFlag=false;
          color="white"; //need to enter or gives not defined error
        }
        else if (cpassword!=firstPwd) {
          msg = "passwords don't match";
          color = "red";
          cnfmpasswordFlag = false;

        }
        else {
          msg = "they match";
          color = "green";
          cnfmpasswordFlag = true;
        }
      }
      document.getElementById('cfmpwd_msg').style.color = color;
      document.getElementById('cfmpwd_msg').innerHTML = msg;
    }

    function checkMBL(mobile) {  //check mobile num
      if (document.forms[0].country_code.value=='+973') {
        var numExp= /^(32|33|34|35|36|37|38|39)[0-9]{6}$/;
      }
      else if (document.forms[0].country_code.value=='+966') {
        var numExp= /^(54|56|57|58|59)[0-9]{6,8}$/;
      }
      else if(document.forms[0].country_code.value=='+971') {
        var numExp= /^(50|52|54|55|56|58)[0-9]{6,8}$/;
      }
      if (mobile.length == 0) {
        msg = "Need to enter a number!";
        color = "red";
        mobileFlag = false;
      }
      else if (!numExp.test(mobile)) {
        msg = "Invalid mobile number";
        color = "red";
        mobileFlag = false;
      }
      else {
        if (mobile==contact_num) {
          msg="";
          color="green";
        }
        else{
        msg = "Valid mobile number";
        color = "green";
        mobileFlag = true;
        ajaxexists(mobile,"mobile");
        }
      }
      document.getElementById('mobile_msg').style.color = color;
      document.getElementById('mobile_msg').innerHTML = msg;
    }

    function checkAddr(addr) { //check if address is a sentence
      var addrExp =/^(?=.*[a-z])([a-z0-9:,]{1,}\s?)*[a-z0-9]+$/i;
      if (addr.length == 0) {
        msg = "Need to add an address!";
        color = "red";
        addressFlag = false;
      }
      else if (!addrExp.test(addr)) {
        msg = "Invalid address";
        color = "red";
        addressFlag = false;
      }
      else {
        if (addr.toLowerCase()==address.toLowerCase()) {
          msg="";
          color="green";
        }
        else{
        msg = "Valid address";
        color = "green";
        addressFlag = true;
        }
      }
      document.getElementById('addr_msg').style.color = color;
      document.getElementById('addr_msg').innerHTML = msg;
    }

    function checkMAIL(mail) { //check mail format
      var mailExp =/^[a-zA-Z0-9._-]+@([a-zA-Z0-9-]+\.)+[a-zA-Z.]{2,5}$/;
      if (mail.length == 0) {
        msg = "Need to add an email!";
        color = "red";
        emailFlag = false;
      }
      else if (!mailExp.test(mail)) {
        msg = "Invalid mail format";
        //msg =mailExp.test(mail) ;
        color = "red";
        emailFlag = false;
      }
      else {
        if (mail.toLowerCase()==email.toLowerCase()) {
          msg="";
          color="green";
        }
        else{
        msg = "Valid mail";
        color = "green";
        emailFlag = true;
        ajaxexists(mail,"email");
        }

      }
      document.getElementById('mail_msg').style.color = color;
      document.getElementById('mail_msg').innerHTML = msg;
    }

    function GetXmlHttpObject() {
      var xmlHttp=null;
      try
      {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
      }
      catch (e)
      {
        // Internet Explorer
        try
        { xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); }
        catch (e)
        { xmlHttp=new ActiveXObject("Microsoft.XMLHTTP"); }
      }
      return xmlHttp;
    }
    function ajaxexists(word,type){
    var xmlHttp= GetXmlHttpObject();
    if (xmlHttp==null) {
      alert("Your browser does not support AJAX!");
      return false;
    }

    var url="checkunameemailmobile.php"
    if (type=="uname")
      url=url+"?uname="+word;
    else if (type=="email")
    url=url+"?email="+word;
    else if (type=="mobile")
    url=url+"?mobile="+word;

    xmlHttp.onreadystatechange=function()
    {
      if(xmlHttp.readyState==4){
        ajax_checking=xmlHttp.responseText;
        reGajaxmsgs(word,type,ajax_checking);
      }
    }
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
    }

    function reGajaxmsgs(word, type, result){
      if (type=="uname" && result=="present" ) {
      document.getElementById('reg_username_msg').style.color ="red";
      document.getElementById('reg_username_msg').innerHTML ="Username already exists";
      usernameFlag=false;
    }
    else if(type=="email" && result=="present"){
    document.getElementById('mail_msg').style.color ="red";
    document.getElementById('mail_msg').innerHTML ="Email already registered";
    emailFlag=false;
    }
    else if(type=="mobile" && result=="present"){
    document.getElementById('mobile_msg').style.color ="red";
    document.getElementById('mobile_msg').innerHTML ="Number already registered";
    mobileFlag=false;
  }
  }

  function checkeditedInputs(){
      document.forms[0].JSEnabled.value="TRUE";
      return (nameFlag&&usernameFlag&&passwordFlag&&cnfmpasswordFlag&&mobileFlag&&addressFlag&&emailFlag);
    }
  </script>
</head>
<body class='bg-primary'>
  <div class='bg-secondary text-white container align-items-center' id='profile'>
  <noscript><h1><b>Please enable JavaScript or use another browser for better user experience</b></h1></noscript>

    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Heading-->
        <h1 class="masthead-heading login">Profile Details</h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
    </div>

  <form onSubmit="return checkeditedInputs();" method='post' action='updateProfile.php'  enctype="multipart/form-data">
    <img src='uploadedfiles/<?php echo $profile_pic; ?>'  class= 'profile-pic' alt='profilepic' >
    <input type="file" name="picfile" id='fileUpload'><span> images<=5MB</span><br><br>

    <label><h3>First Name:</h3></label>
    <input class='form-control' type='text' name='fname' placeholder="maximum 50 characters" onkeyup="checkFN(this.value, 'name_msg1')" size='50' value='<?php echo $Fname; ?>' required><span id='name_msg1'></span><br>

    <label><h3>Last Name:</h3></label>
    <input class='form-control' type='text' name='lname' placeholder="maximum 50 characters" onkeyup="checkFN(this.value, 'name_msg2')" size='50' value='<?php echo $Lname; ?>' required><span id='name_msg2'></span><br>

    <label><h3>Email:</h3></label>
    <input class='form-control' type='text' name='email' placeholder="abc@example.com (30 characters max)" onkeyup="checkMAIL(this.value)" size='30' value='<?php echo $email; ?>' required><span id='mail_msg'></span><br>

    <label><h3>Username:</h3></label>
    <input class='form-control' type='text' name='username' placeholder="5-20 characters" onkeyup="checkUN(this.value)" size='20' value='<?php echo $username; ?>' required><span id='reg_username_msg'></span><br>

    <label><h3>Password:</h3></label>
    <input class='form-control' type='password' name='password' placeholder='Leave empty to retain original' onkeyup="checkPWD(this.value)" size='20' value=''><span id='profile_pwd_msg'></span><br>

    <label><h3>Confirm Password:</h3></label>
    <input class='form-control' type='password' name='cnfm_password' placeholder="6-20 char, must have 1 number, 1 uppercase, 1 lowercase" onkeyup="confirmPWD(this.value)" size='20' value=''><span id='cfmpwd_msg'></span><br>
  <label><h3>Mobile Number:</h3></label>
    <select  name="country_code" onchange="checkMBL(document.forms[0].mobile.value)" required >
    <?php
    //country will be selected based on the country input while registering
    //NOTE:pharmacy management system only has bahrain customers AND doesnt add country to db hence $country=bahrain by default at beginning of <script>
    if ($country=="Bahrain") {
      ?>
      <option value="+973" selected>Bahrain +973</option>
      <option value="+966">Saudi Arabia +966</option>
      <option value="+971">United Arab Emirates +971</option>
    <?php
    }
    elseif ($country=="Saudi Arabia") {
      ?>
      <option value="+973">Bahrain +973</option>
      <option value="+966" selected>Saudi Arabia +966</option>
      <option value="+971">United Arab Emirates +971</option>
    <?php
    }
    elseif ($country=="United Arab Emirates") {
      ?>
      <option value="+973">Bahrain +973</option>
      <option value="+966">Saudi Arabia +966</option>
      <option value="+971" selected>United Arab Emirates +971</option>
    <?php
    }
    ?>
    </select>
    <input class='form-control' type='text' name='mobile' onkeyup="checkMBL(this.value)" size='10' value='<?php echo $contact_num; ?>' required><span id='mobile_msg'></span><br>
    <label><h3>Address1:</h3></label>
    <input class='form-control' type='text' name='address1' placeholder="Flat 1 Bldg 100 Road 200 Block 300, Manama, Bahrain" onkeyup="checkAddr(this.value)" size='50' value='<?php echo $userAddrs[0]['ADDRESS']; ?>' required><span id='addr_msg'></span><br>
    <label><h3>Address2:</h3></label>
    <input class='form-control' type='text' name='address2' onkeyup="checkAddr(this.value)" size='50' value='<?php echo $userAddrs[1]['ADDRESS']; ?>'><span id='addr_msg'></span><br>
    <label><h3>Address3:</h3></label>
    <input class='form-control' type='text' name='address3' onkeyup="checkAddr(this.value)" size='50' value='<?php echo $userAddrs[2]['ADDRESS']; ?>'><span id='addr_msg'></span><br>
    <input type='hidden' name='JSEnabled' value='false'>
    <input class='btn btn-lg btn-primary' type='submit' name='edit_user' value='Edit'>
  </form>

  </div>

<?php

$error=null;
extract($_GET);
if ($error==1) {
  echo "<script> alert('File could not be uploaded'); </script>";
}
elseif ($error==2) {
  echo "<script> alert('Please enter valid inputs, perhaps turn on client side scripting'); </script>";
}
elseif ($error==3) {
  echo "<script> alert('Database error :('); </script>";
}
?>
</body>
</html>
