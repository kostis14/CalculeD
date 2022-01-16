<?php 
session_start();
$_SESSION['userexists'] = false;
$_SESSION['wronguserpass'] = false;

include("connection.php");
include("functions.php");
if(isset($_SESSION['user_id']))
	{

	header("Location: index.php");
	}

if(!isset($_POST['submit_registration']) && !$_SESSION['d'])
	{
	$_SESSION['d'] = false;
}

if (isset($_POST['submit_registration']))
{
;	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
	{
		$query = "select * from users where user_name = '$user_name' limit 1";
		$result = mysqli_query($con, $query);
		if($result){
			if($result && mysqli_num_rows($result) > 0){
				$_SESSION['userexists'] = true;
				$result = "";
			}
			else{
				$_SESSION['userexists'] = false;

		$user_id = random_num(20);
		$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$hashed_password')";
		
		mysqli_query($con, $query);
		$_SESSION['d'] = true;
		unset($_POST['submit_registration']);
		header("Location: signup.php");

		die;
			}
		}
		//save to database
	
	}else
	{
		echo isset($_POST['submit_registration']);
		echo "Please enter some valid information!";
	}
}




if(isset($_POST['submit_login']))
{

		$user_namelogin = $_POST['user_namelogin'];
		$passwordlogin = $_POST['passwordlogin'];
		if(!empty($user_namelogin) && !empty($passwordlogin) && !is_numeric($user_namelogin))
		{

			//read from database
			$query = "select * from users where user_name = '$user_namelogin' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					if(password_verify($passwordlogin,$user_data['password']))
					{

						
						$_SESSION['wronguserpass'] = false;
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						unsset($_POST['submit_login']);

						die;
					}
				}
			}
			$_SESSION['wronguserpass'] = true;
		}else
		{$_SESSION['wronguserpass'] = true;
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
<?php

if($_SESSION['userexists']||$_SESSION['wronguserpass']){
	?>
	<body onload="wronguser();">
	<?php
}else{
	?>
	<body>
	<?php
}
?>

	<div class="header">
		<div class="logo"><img src="./jb.png" alt=""></div>
		<div style="display:flex;flex-flow:column wrap;align-items: center;" class="logo-name">
		<h1 style="font-size:60px;color:white;
		text-shadow: 1px 1px 4px black; " >CalculeD</h1>
		<h1 style="font-size:30px;color:white;
		text-shadow: 1px 1px 1px black;font-weight: 300;color:rgb(149, 228, 149);" >Calculate Fast!</h1>
		</div>
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
						<div class="close2">X</div>
		
							<h1>Sign Up</h1>
					
							<div id ="form-register" class="form-register" onKeyPress="checkSubmit(e)" >
							  <form method="post"  >
								<label for="name"></label>
								<input placeholder="Name" type="text" name="user_name" id="username" class="form-change"  oninvalid="this.setCustomValidity('Please enter your name!')" oninput="this.setCustomValidity('')" />
								<br>
								<h1 id="usernameError" style="font-size:15px;color:red;display:none;">Username already in use!</h1>
								
								<label for="password"></label>
								<input placeholder="Password" type="password" name="password" id="password" class="form-change"  oninvalid="this.setCustomValidity('Please enter your password!')" oninput="this.setCustomValidity('')" />
								<br>

								<button  id="submit_registration-btn" name="submit_registration" type="submit" style="  background-color: #d4d4d4; color: rgb(0, 0, 0); border:none;
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
				<div class="close">X</div>

					<h1>Log in</h1>
					<div id ="form" class="form" >
							  <form id="form-login" method="post"  >
								<label for="name"></label>
								<input placeholder="Name" type="text" name="user_namelogin" id="username_login" class="form-change"  oninvalid="this.setCustomValidity('Please enter your name!')" oninput="this.setCustomValidity('')" />
								<br>
								
								<label for="password"></label>
								<input placeholder="Password" type="password" name="passwordlogin" id="password" class="form-change"  oninvalid="this.setCustomValidity('Please enter your password!')" oninput="this.setCustomValidity('')" />
								<br>
								
								
									<h1 id="usernameorpassError" style="font-size:15px;color:red;display:none;">Wrong username or password!</h1>
								
							
								<button  id="submit_login-btn" type="submit" name="submit_login" style="  background-color: #d4d4d4; color: rgb(0, 0, 0); border:none;
									padding: 15px 32px;
									text-align: center;
									text-decoration: none;
									display: inline-block;
									font-size: 16px;  
									border-radius: 10px;
									" />Log In</button>
							</div>
					
				  </div>			

			</div>
		</div>
		<div id="Btn" class="login-btn"><button type="button">Log in</button></div>
		<div id="Btn2" class="signup-btn"><button class="dawdwa" type="button">Sign up</button></div>
	</div>
	
		</div>
			
				<div class="personal-scores">
				
				</div>
			</div>
		</div>
	</div>

	<div class="hero">
		<div class="hero-container">

		<div class="welcome-message">WELCOME TO CALCULED</div>



				<?php
				
					if($_SESSION['d']){
						echo '<div class="welcome-message">You are now signed up!</div>
						<input onclick="signin()" class="btn-login" type="button" value="Click here to Log In!">
						';
						?>
						<script>

							document.getElementById("btn-signup").style.display = "none";
							document.getElementById("btn-login").style.display = "none";

						</script>
						<?php
						
					}
					else{
						?><input onclick="signup()" id="btn-signup" class="btn-signup" type="button" value="Click here to sign Up!">
						<input onclick="signin()" id="btn-login" class="btn-login" type="button" value="Or click here to Log In!"> <?php	
					}
				?>
					
				

		</div>
		
	</div>

<script>



	// Get the modal
var modal = document.getElementById("signIn");
var modal2 = document.getElementById("signUp");

window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if((e.target.nodeName=='INPUT'&&e.target.type=='text')||(e.target.nodeName=='INPUT'&&e.target.type=='password')){e.preventDefault();return false;}}},true);

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

function wronguser(){
	<?php
	if($_SESSION['wronguserpass']==1){
		?>
		document.getElementById("usernameorpassError").style.display = "block";
		modal.style.display = "block";
		return;
		<?php
	}		
	?>

	modal2.style.display = "block";
	document.getElementById("usernameError").style.display = "block";
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