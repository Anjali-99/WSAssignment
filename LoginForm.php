<?php

    session_start();
    require_once 'token.php';
	
	setcookie("username", "admin", time() + 1800);
    
		if (isset($_POST['uname']) && isset($_POST['pwd'])){
			
			$username = $_POST['uname'];
        

            if($_POST['uname'] == "admin" && $_POST['pwd']=="password"){

                $_SESSION['loggedIn'] =$_POST['uname'] .$_POST['pwd'];
				$_SESSION['username'] = "admin";
				$_SESSION['expire'] = time() + 30 ;

                $token = generateToken(); //generate token

				setcookie("token","$token");
				
                header('Location: WelcomePage.php');

            }else {
				echo '<br>';
                echo '<div class="alert alert-warning">Username or Password is incorrect!</div>';

		}}
			
	
?>


<!DOCTYPE html>
<html>

<head>

<title>Login Page</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="stylesheet.css">

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>

<img src="Images/pink.jpg" class="bkground"></img>

<div class ="form_container">

<form method="post">
<h1> Login Form </h1>

	<div class="imgcontainer">
		<img src="Images/logo.png" alt="Avatar" class="avatar">
	</div>
	<br>
	
		<label for="uname"><b>Username</b></label><br>
		<input type="text" placeholder="Enter Username" name="uname"><br>
	
		<label for="pwd"><b>Password</b></label><br>
		<input type="password" placeholder="Enter Password" name="pwd"><br>
		
		<input type="checkbox" name="remember">Remember Me <br>
		
		<button type="submit" name="submit">Submit</button>
		
	</div>
	
	<div class="footer">
        <p><b>IT18127638   P.I.A.Anjali   USERNAME : admin   PASSWORD : password</b></p>
    </div>
	
</body>

</html>
