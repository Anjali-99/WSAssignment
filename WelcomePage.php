<?php
session_start();
require_once 'token.php';




if(isset($_POST['uname'], $_POST['csrf_token'], $_POST['pwd'])){

  $username = $_POST['uname'];
  $csrf_token = $_POST['csrf_token'];
  $password = $_POST['pwd'];
			

  if((!empty($username) && !empty($password) && !empty($csrf_token)) === true)
  {
    if(validate($csrf_token))
    {
        echo "<script>alert('New user created successfully!');</script>";
    }
	
    elseif(!validate($csrf_token))
	{
        echo "<script>alert('Cannot be Changed');</script>";
    }
}}

	if (!$_SESSION['loggedIn']) {

    header('Location: session.php');

    exit();
	}
	else {
		
		$now = time();
// checking the time now when home page starts

   if($now > $_SESSION['expire'])

   {

       session_destroy();
		header ('Location: expire.php');
	
   }
			else{	
                echo '<div class="alert alert-success">Successful Login!</div>';
			}
		}
		
	
	
	

?>

<!DOCTYPE html>
<html>

<head>

<title>Welcome Page</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="stylesheet.css">

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>

<img src="Images/pink.jpg" class="bkground"></img>
	<div class="panel_cont">
	<div class="container">
  
  <div class="panel panel-info">
    <div class="panel-body">
	<h2>Welcome to Your Session</h2>
		<p>You have successfully Logged in with the hardcoded username and Password!</p>
		<p>Now  your session has started. It will last for 30 seconds!</p>
		<p> Click the below Log Out button to destroy session before that time period!</p>
	
	<form action="logout.php" method="get">
	<button type="submit" class="btn btn-primary btn-lg btn-block">Log Out</button></br>
	</div>
  </div>
  </div>
</section>
</section>
</section>

<div class ="form_cont" >
<form method="POST">
<h1> New User </h1>

	<div class="imgcontainer"> 
		<img src="Images/logo.png" alt="Avatar" class="avatar">
	</div> 
	<br>
	
		<label for="uname"><b>Username</b></label><br>
		<input type="text" placeholder="Enter Username" name="uname"><br><br>
	
		<label for="pwd"><b>Password</b></label><br>
		<input type="password" placeholder="Enter Password" name="pwd"><br><br>
		
		<input type="hidden" name="csrf_token" value="<?php echo generateToken();?>">
		
		<button type="submit" name="submit">Submit</button>
		
	</div>
	
	<div class="footer">
        <p><b>IT18127638   P.I.A.Anjali   USERNAME : admin   PASSWORD : password</b></p>
    </div>
	

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <script>

      $(document).ready(function () {

          $.ajax({

              url: 'csrf_Token.php',

              type: 'post',

              async: false,

              data: {

                  //pass login session to validate request with the server

                  'csrf_request': '<?php echo $_SESSION["loggedIn"] ?>'  

              },

              success: function (data) {

                    //set returned token to hidden field value

                  document.getElementById("csrf_token").value = data;

                  $("#csrf_token").text(data);

              },

              error: function (xhr, ajaxOptions, thrownError) {

                  console.log("Error on Ajax call :: " + xhr.responseText);

              }

          });

      });

   </script>

</html>
