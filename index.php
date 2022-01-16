
<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);




?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="./index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CalculeD</title>
</head>
<body>
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
					<div class="name">
				<?php
					if($user_data['user_name'] != "")
					{
						echo $user_data['user_name'];
					}
				?>

					</div>
				</div>
		<div class="name-log">
			<div class="login-signup">
					
		
		<div  class="logout-btn"><a href="./logout.php">Log Out</a></div>
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
				<a href="./game.php">
					<input class="btn-play" type="button" value="Click here to play!">
				</a>

		</div>
		
	</div>
</body>
</html>