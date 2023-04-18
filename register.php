<?php
session_start();
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$mob=$_POST['mob'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$pw=$_POST['pw'];
$cpw=$_POST['cpw'];
$sql = "INSERT INTO passengers (p_fname, p_lname, p_age, p_contact, p_gender, email, password) VALUES ('$fname', '$lname', '$age', '$mob', '$gender', '$email', '$pw');";
	if(mysqli_query($conn, $sql))
{  
	$message = "You have been successfully registered";
}
else
{  
	$message = "Could not insert record"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register on Travelr</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
      integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
      crossorigin="anonymous"
    ></script>
    <script src="jquery.js"></script>







    <SCRIPT src="validation.js"></SCRIPT>
    <style>
#register_form	{
	/* background-color: white; */
  background: linear-gradient(#d2dae3, #9ca0a8);

	width: 50%;
	margin: auto;
	border-radius: 25px;
	border: .5px solid grey; 
	margin-top: 40px ;
    margin-bottom: 27px;
}
body{
  background: linear-gradient(#141e30, #243b55);
}
    </style>
  </head>
  <body background="grey" link="white" alink="white" vlink="white" width="1024" height="768">
<?php include("header.php") ?>
    
  <div id="register_form" class="container " >
        <div class="container text-center" style="margin-top: 8px;margin-bottom: 7px;"><p class="h3">Enter your details</p></div>

      <form class="row g-3"
        name="register"
        method="post"
        action="register.php"
        onsubmit="return validate()"
      >
        <div class="mb-3 col-md-6">
          <label for="exampleFormControlInput1" class="form-label"
            >First name:</label
          >
          <input
            name="fname"
            type="TEXT"
            class="form-control"
            placeholder="Enter your first name"
            size="30"
            maxlength="30"
            align="center"
            id="fname"
          />
        </div>
        <div class="mb-3 col-md-6">
            <label  class="form-label"
              >Last name:</label
            >
<input type="TEXT" class="form-control" name="lname" align="center" size="30" maxlength="30" placeholder="Enter your last name" id="lname">
            
          </div>
          <div class="mb-3 col-md-6">
            <label  class="form-label"
              >Age :</label
            >
<input type="TEXT" class="form-control" name="age" align="center" size="30" maxlength="3" placeholder="Enter age" id="age">
          </div>
        
        <div class="mb-3 col-md-6">
          <label  class="form-label"
            >Mobile Number :</label
          >
          <INPUT type="TEXT" class="form-control" name="mob" size="30" maxlength="10" placeholder="Enter your mobile number" id="mob">
        </div>
        <div class="mb-3 col-md-6">
            <label  class="form-label"
              >Gender :</label
            >
            <INPUT type="radio" name="gender" value="Male" align="center" id="gender">Male
<input type="radio" name="gender" value="Female" align="center" id="gender">Female
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"
              >Email ID:</label
            >
            <INPUT name="email" class="form-control" placeholder="abc@gmail.com" type="TEXT" id="email" placeholder="Enter your E-Mail ID" size="30" maxlength="30">
          </div>
          <div class="mb-3 col-md-6">
            <label for="exampleFormControlInput1" class="form-label"
              >Password:</label
            >
<INPUT type="PASSWORD" class="form-control" name="pw" placeholder="********" id="pw">           
        </div>
        <div class="mb-3 col-md-6">
            <label for="exampleFormControlInput1" class="form-label"
              >Confirm Password:</label
            >
<INPUT type="PASSWORD" name="cpw" class="form-control" placeholder="********" id="cpw">           
        </div>
        <div class="col-md-2">
        <input TYPE="Submit" value="Submit" name="submit" id="submit" class="btn btn-primary" onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}">   
    </div>
    <div class="col">
        <input TYPE="Reset" value="Reset" id="reset" class="btn btn-secondary"></P></FORM>
    </div>
    </form><hr>
<form action="login.php">
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label"
      >Already have an account with us?<BR/></label
    >
    <INPUT TYPE="submit" value="Login" id="login" class="btn btn-primary">
    
    </div> 
      </form>
    </div>
  </body>
</html>
