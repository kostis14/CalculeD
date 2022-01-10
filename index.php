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
								<input placeholder="Όνομα" type="text" name="name" id="name" class="form-change" required oninvalid="this.setCustomValidity('Εισάγετε το όνομά σας πρώτα!')" oninput="this.setCustomValidity('')" />
								<br>
								<label for="email"></label>
								<input placeholder="Email" type="text" name="email" id="email" class="form-change" required oninvalid="this.setCustomValidity('Εισάγετε το Email σας πρώτα!')" oninput="this.setCustomValidity('')" oninput="this.setCustomValidity('')" />
					
								<br>
								<button  style="  background-color: #d4d4d4; color: rgb(0, 0, 0); border:none;
									padding: 15px 32px;
									text-align: center;
									text-decoration: none;
									display: inline-block;
									font-size: 16px;
									border-radius: 10px;
									" /> Αποστολή</button>
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
						<input placeholder="Όνομα" type="text" name="name" id="name" class="form-change" required oninvalid="this.setCustomValidity('Εισάγετε το όνομά σας πρώτα!')" oninput="this.setCustomValidity('')" />
						<br>
						<label for="email"></label>
						<input placeholder="Email" type="text" name="email" id="email" class="form-change" required oninvalid="this.setCustomValidity('Εισάγετε το Email σας πρώτα!')" oninput="this.setCustomValidity('')" oninput="this.setCustomValidity('')" />
			
						<br>
						<button  style="  background-color: #d4d4d4; color: rgb(0, 0, 0); border:none;
							padding: 15px 32px;
							text-align: center;
							text-decoration: none;
							display: inline-block;
							font-size: 16px;
							border-radius: 10px;
							" /> Αποστολή</button>
					</div>
				  </div>			

			</div>
		</div>
		<div id="Btn" class="login-btn"><button>Sign in</button></div>
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
				<a href="./login.php">
					<input class="btn-play" type="button" value="Click here to play!">
				</a>

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