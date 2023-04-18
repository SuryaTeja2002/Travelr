<HTML>

<HEAD>
	<TITLE>Travelr</TITLE>
	<style type="text/css">
		@import url(style.css);

		#logo {	
			width: 150px;
			padding-top: 5px;	
		}
		html {
			background-color: grey;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}
		h1,h2{
			color:aliceblue;
		}

		#main {
			width: 700px;
			height: 400px;
			margin: 0 auto;
			margin-top: 50px;
			text-shadow: #243b55;
			border-radius: 15px;
			padding-top: 10px;
			padding-right: 10px;
			padding-bottom: 10px;
			padding-left: 10px;
			
  background: linear-gradient(#d2dae3, #9ca0a8);
		}
		body{
  background: linear-gradient(#141e30, #243b55);
}
	</style>
</HEAD>

<BODY>
	<?php
	session_start();
	include("header.php"); ?>
	<div id="main">
		<div id="logo">
			<A HREF="index.php">
				<IMG SRC="img/logonobackground.png" alt="Travelr" id="logo"></IMG>
			</A>
		</div>
		<h1 align="center" style="padding-top: 25px;">Welcome to Travelr!</h1><br /><br />
		<h2 align="center" >Have a safe journey with us</h2>
		<br /><br />
		<?php
		if (isset($_SESSION['user_info']))
			echo '<h3 align="center"><a href="booktkt.php">Book here</a></h3>';
		else
			echo '<h3 align="center"><a href="register.php">Please register/login before booking</a></h3>';
		?>
	</div>
</BODY>

</HTML>