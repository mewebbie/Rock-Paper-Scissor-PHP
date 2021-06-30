<?php
	$result = "";
	if(isset($_POST['logout'])) {
		header('Location: login.php');
	}
	if(!isset($_GET['name']) || strlen($_GET['name'])<1) die('Name parameter missing!');
	$message = "";
	$elements = array('Rock','Paper','Scissor');
	if(isset($_POST['human'])) {
		if($_POST['human'] == 3) {
			for($i=0;$i<3;$i++) {
				for($j=0;$j<3;$j++) {
					$res = check($elements[$i],$elements[$j]);
					$message .= "Human: ".$elements[$j].", Computer: ".$elements[$i].". Result = ".$res."<br/>";
				}
			}
		}
		else {
			$int = rand(0,2);
			$computer = $elements[$int];
			$h = $_POST['human'];
		
			if($h == -1) $message = "Please select a strategy and press Play!";
			else {
				$human = $elements[$h];
				$result = check($computer, $human);
			}
		}
		
		
	}

	function check($computer, $human) {
		if($computer == $human) return "Tie";
		else if($computer == "Scissor" && $human == "Paper") return "You Lose";
		else if($computer == "Rock" && $human == "Scissor") return "You Lose";
		else if($computer == "Paper" && $human == "Rock") return "You Lose";
		else return "You Win";
	}
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>B Prakash 0b81e936</title>

		<style>
			div {
				margin:100px 200px;
				margin-bottom:0;
			}
			.display-box {
				margin-top:15px;
				background:rgba(201, 198, 197, 0.5);
				border:2px solid black;
				padding:5px;
				width:40%;
			}
			form input {
				display:inline-block;
				margin-left:10px;
			}
			.one {
				margin-left:0;
			}
		</style>
	</head>
	<body>
		<div>
			<h2>Prakash's Rock-Paper-Scissor Game Using PHP</h2>
			<?php 
				$welcome_msg = "<p>Welcome "."<em>".$_GET['name']."</em></p>";
				echo $welcome_msg;
			?>
			<form method="post">
				<select name="human">
					<option value="-1">--Select--</option>
					<option value="0">Rock</option>
					<option value="1">Paper</option>
					<option value="2">Scissor</option>
					<option value="3">Test</option>
					<input type="submit" name="play" value="Play">
					<input class="one" type="submit" name="logout" value="Log-out">
				</select>
				
			</form>
		</div>
		<div class="display-box">
			<?php 
				if($result !== "") {
					print "Your Play=$human Computer Play=$computer Result=$result\n"; 
				}
				else echo $message; 
			?>
		</div>
	</body>
	
</html>
