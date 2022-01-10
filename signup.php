<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="./index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div class="header">
		<div class="logo"><img src="./jb.png" alt=""></div>
		<h1 style="font-size: 50px;" >CalculeD</h1>

		<div class="player-card">
			<div class="avatar">
				<img src="./jb.png" alt="">
			</div>

			<div class="misc-container">
				<div class="name-log">
					<div class="name">User</div>
				</div>
		<div class="name-log">
			<div class="login-signup">
					
				<div id="signUp" class="signUp">
					<div class="signUp-content">
		
						<div class="about-contact">
						<div class="close2"></div>
		
							<h1>Sign Up</h1>
					
							<div id ="form" class="form">
							  <form onsubmit="return false;" >
								<label for="name"></label>
								<input placeholder="Name" type="text" name="name" id="name" class="form-change" required oninvalid="this.setCustomValidity('Please enter your name!')" oninput="this.setCustomValidity('')" />
								<br>
								
								<label for="password"></label>
								<input placeholder="Password" type="password" name="password" id="password" class="form-change" required oninvalid="this.setCustomValidity('Please enter your password!')" oninput="this.setCustomValidity('')" />
								<br>

								<label for="email"></label>
								<input placeholder="Email" type="email" name="email" id="email" class="form-change" required oninvalid="this.setCustomValidity('Please enter your email!')" oninput="this.setCustomValidity('')" />
								<button  style="  background-color: #d4d4d4; color: rgb(0, 0, 0); border:none;
									padding: 15px 32px;
									text-align: center;
									text-decoration: none;
									display: inline-block;
									font-size: 16px;
									border-radius: 10px;
									" /> Sign Up</button>
							</div>
						  </div>			
		
					</div>
				</div>

		<div id="signIn" class="signIn">
			<div class="signIn-content">

				<div class="about-contact">
				<div class="close"></div>

					<h1>Sign in</h1>
			
					<div id ="form" class="form">
					  <form onsubmit="return false;" >
						<label for="name"></label>
						<input placeholder="Name" type="text" name="name" id="name" class="form-change" required oninvalid="this.setCustomValidity('Please enter your name!')" oninput="this.setCustomValidity('')" />
						<br>
						
						<label for="password"></label>
						<input placeholder="Password" type="password" name="password" id="password" class="form-change" required oninvalid="this.setCustomValidity('Please enter your password!')" oninput="this.setCustomValidity('')" />
						<br>
						<button  style="  background-color: #d4d4d4; color: rgb(0, 0, 0); border:none;
							padding: 15px 32px;
							text-align: center;
							text-decoration: none;
							display: inline-block;
							font-size: 16px;
							border-radius: 10px;
							" /> Log In</button>
					</div>
				  </div>			

			</div>
		</div>
		<div id="Btn" class="login-btn"><button>Log in</button></div>
		<div id="Btn2" class="signup-btn"><button>Sign up</button></div>
	</div>
	
		</div>
			
				<div class="personal-scores">
					<div class="score">199</div>
					<div class="score">105</div>
				</div>
			</div>
		</div>
	</div>

	<div class="hero">
		<div class="hero-container">
			<div class="welcome-message">WELCOME TO CALCULED</div>
				
					<input onclick="signup()" class="btn-signup" type="button" value="Click here to sign Up!">
					<input onclick="signin()" class="btn-login" type="button" value="Or click here to Log In!">
				

		</div>
		
	</div>

<script>
	// Get the modal
var modal = document.getElementById("signIn");
var modal2 = document.getElementById("signUp");

// Get the button that opens the modal
var btn = document.getElementById("Btn");
var btn2 = document.getElementById("Btn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close2")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}	

function signup(){
	modal2.style.display = "block";

}
function signin(){
	modal.style.display = "block";

}

btn2.onclick = function() {
  modal2.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span2.onclick = function() {
  modal2.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}	
</script>
</body>

</html>