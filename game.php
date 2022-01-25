<?php

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

$result = $_GET['data'] ?? '';
$highscore = explode(',',$result)[0] ?? '0';
$calcinarow =explode(',',$result)[1] ?? '0';
if($highscore > $user_data['highScore']){
	$query = "UPDATE users SET highScore = '$highscore' WHERE user_name = '$user_data[user_name]'";
	mysqli_query($con, $query);
	header("Refresh:0");

}
if($calcinarow > $user_data ['gamesPlayed']){
	$query = "UPDATE users SET gamesPlayed = '$calcinarow' WHERE user_name = '$user_data[user_name]'";
	mysqli_query($con, $query);
	header("Refresh:0");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" href="./photos/logocalculed.png">
	<link rel="stylesheet" href="./style/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CalculeD</title>
</head>
<body>
	<div class="header">
	<a href="./index.php">
	<div class="logo"><img src="./photos/logocalculed.png" alt=""></div>
</a>	
		<div style="display:flex;flex-flow:column wrap;align-items: center;" class="logo-name">
		<h1 style="font-size:60px;color:white;
		text-shadow: 1px 1px 4px black; " >CalculeD</h1>
		<h1 style="font-size:30px;color:white;
		text-shadow: 1px 1px 1px black;font-weight: 300;color:rgb(149, 228, 149);" >Calculate Fast!</h1>
		</div>
		

		<div class="player-card">
			<div class="avatar">
				<img src="./photos/player-avatar.png" alt="">
				
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
				<div class="score-container">
						<h1>HIGHSCORE</h1>
						<div class="score232"><?php
						echo $user_data['highScore'];
				?></div></div>
				<div class="score-container" style="margin-left: 5px;">
						<h1>MOST CALCULATIONS</h1>
						<div class="score232"><?php
						echo $user_data['gamesPlayed'];
				?></div></div>

					</div>
					
					
				</div>
			</div>
		</div>
	</div>


                    <div class="game-container">

						<div class="game">
							<div class="misc">
							<div class="odhgies"><h1>Calculate as many equations as possible until the timer runs out! <br><span style="font-size:16px;">•You get bonus points when you calculate in a row</span> <br> <span style="font-size:16px;">•You have 2 tries until the equation changes. <br> BEWARE! you lose 20 points for every wrong answer.</span> </h1></div>
							<div id='start-btn' onclick="startGame()" class="start-button"><button>Start Game</button></div>
						<div class="options" style="display:flex;flex-flow:row wrap;">
						<div onclick="option1()" id='options-btn1'  class="options-btn"><button>Type 1</button></div>
						<div onclick="option2()" id='options-btn2'  class="options-btn"><button>Type 2</button></div>

						</div>
							</div>
							<div class="calculator">
								<div class="game-start">
								<h1 class="game-starting" id="game-starting" style="display:none;color:white;"> Game is starting.. good luck!</h1>

								</div>
								<div class="output">
									<h1 class="prakseis-output"></h1>
<textarea  class="prakseis-input" name="" id="prakseis-input" cols="30" rows="1"></textarea>
								</div>
								
							</div>
							<div class="scoresPlayingNow">
								<h1 style="margin-top: 50px;color:white; text-shadow: 1px 1px 3px black;" >SCORE</h1>
								<div class="score-now"><?php echo $highscore?></div>
								<h1 style="margin-top: 50px;color:white; text-shadow: 1px 1px 3px black;font-size:25px;" >CALCULATIONS IN A ROW</h1>

								<div class="calculations-in-a-row">0</div>
								<h1 style=" margin-top: 50px;color:white; text-shadow: 1px 1px 3px black;font-size:25px;" >HIGHSCORE-IN A ROW</h1>

								<div class="calculations-highscore"><?php echo $calcinarow?></div>
									
								



							</div>
						</div>

					</div>

					<form  hidden method="get" name="formdata" action="game.php">
        			<input id="data" type="text" placeholder="Enter Data" name="data">
        			<input type="submit" value="Submit">
    </form>
<script src="equations.js"></script>

<script src="https://cdn.jsdelivr.net/npm/nerdamer@latest/nerdamer.core.js"></script>
<script src="https://cdn.jsdelivr.net/npm/nerdamer@latest/Algebra.js"></script>
<script src="https://cdn.jsdelivr.net/npm/nerdamer@latest/Calculus.js"></script>
<script src="https://cdn.jsdelivr.net/npm/nerdamer@latest/Solve.js"></script>
    
<script>
	let type;
					function option1(){
						type = equations1;


					}
					function option2(){
						type = equations2;


					}



			let counter = 0;
			
			input.value = input.value.toString().replace(/\s+|[a-z]+/gi,'');
			input.addEventListener('keypress', function (e) {
    	if (e.key === 'Enter') {
			if(document.querySelector('#game-starting').innerText == 'Times Up!'){
return;
			}

			e.preventDefault();
			if(input.value.toString().replace('\\s+\g','')==nerdamer.solve(output.innerText,'x').symbol.elements[0].toString()){
				score++;
				scoreoutput.style.backgroundColor ='#1dbe30';
				if(score < 4){
				scoreoutput.innerHTML = +(scoreoutput.innerHTML) + 20;
				}
				else if(score < 8){

				scoreoutput.innerHTML = +(scoreoutput.innerHTML) + 30;
				}
				else if(score < 12){

				scoreoutput.innerHTML = +(scoreoutput.innerHTML) + 40;
				}
				else if(score < 20){

				scoreoutput.innerHTML = +(scoreoutput.innerHTML) + 50;
				}

				
				calcinarow.innerHTML = score;
				output.innerText = getRandomEquation();
				input.value=''; 
				input.focus();
				counter =0;
				input.style.backgroundColor = 'white';
				input.style.color = 'black';
			}
			else if(input.value.toString().replace('\\s+\g','')!=nerdamer.solve(output.innerText,'x').symbol.elements[0].toString()){
				input.style.backgroundColor = 'red';
				input.style.color = 'white';
				counter++;
				scoreoutput.style.backgroundColor = 'red';
				if(counter>=2){
					input.style.backgroundColor = 'white';
					input.style.color = 'black';
					output.innerText = getRandomEquation();
					scoreoutput.style.backgroundColor = '#aca4a4';
					counter=0;
					
				}
				
				calc_highscore.innerHTML = score > calc_highscore.innerHTML ? score : calc_highscore.innerHTML;
				score=0;
				scoreoutput.innerHTML = +(scoreoutput.innerHTML) - 20;
				calcinarow.innerHTML = score;
				input.value='';
				
				
			input.focus();
			}
		
			}
		});
			

	
	</script>
</body>
</html>