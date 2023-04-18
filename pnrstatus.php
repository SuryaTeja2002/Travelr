
<?php 
session_start();
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$pnr=$_POST['pnr'];
$sql = "SELECT t_status FROM tickets WHERE PNR= ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $pnr);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
	if($row==NULL)	echo "<script type='text/javascript'>alert('PNR not found');</script>";
	else echo "<script type='text/javascript'>alert('Your status is ' +'$row[t_status]');</script>";	
}
if (isset($_POST['cancel']))
{
$pnr=$_POST['pnr'];
$sql = "DELETE FROM tickets WHERE PNR=?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $pnr);
if(mysqli_stmt_execute($stmt)){
	echo "<script type='text/javascript'>alert('Your ticket has been cancelled');</script>";
	echo "<script type='text/javascript'>document.getElementById('cancel').style.display = 'none';</script>";
}
	else echo "<script type='text/javascript'>alert('Cancellation failed');</script>";	
}
?>
<!DOCTYPE html>
<html>
<head>

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

	<title>PNR Status</title>
	<LINK REL="STYLESHEET" HREF="STYLE.CSS">
	<style type="text/css">
		#pnr	{
			font-size: 20px;
			background: linear-gradient(#d2dae3, #9ca0a8);
			width: 500px;
			height: 350px;
			margin: auto;
			border-radius: 25px;
			border: .5px solid grey; 
			margin: auto;
  			position: absolute;
  			left: 0; 
  			right: 0;
  			padding-top: 40px;
  			padding-bottom:20px;
  			margin-top: 130px;
			
		}
		html { 
		  background: linear-gradient(#141e30, #243b55) no-repeat center center fixed;
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		#pnrtext	{
			padding-top: 20px;
		}
		body{
  background: linear-gradient(#141e30, #243b55);
}
	</style>
</head>
<body>
<?php
include("header.php"); ?>
<center>
	<div id="pnr">Check your PNR status here:<br/><br/>
	<form method="post" name="pnrstatus" action="pnrstatus.php">
	<div id="pnrtext"><input type="text" name="pnr" size="30" maxlength="10" placeholder="Enter PNR here"></div>
	<br/><br/>
	<input type="submit" name="submit" value="Check here!" class="btn btn-primary col-md-5" id="submit"><br/><br/>
	<?php  
		if(isset($_SESSION['user_info'])){
			echo '<form action="pnrstatus.php" method="post"><input type="submit" class="button" value="Cancel your ticket!" name="cancel" id="cancel"/></form>';
        }
		else
			echo '<A HREF="register.php">Login/Register</A>';
		?>
	</form>
	</div>
</center>
</body>
</html>