<?php
	$failure = false;
	if(isset($_POST['cancel'])) {
		header("Location: index.php");
		return;
	}
	if(isset($_POST['who']) && isset($_POST['pass'])) {
		if(strlen($_POST['who'])<1 || strlen($_POST['pass'])<1) $failure = "Password/Username cannot be empty";

		else {
			$md5 = hash('md5', 'XyZzy12*_'.$_POST['pass']);
			$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
			if($md5 === $stored_hash) {
				header('Location: game.php?name='.urlencode($_POST['who']));
				return;
			} else {
				$failure = "Incorrect Password";
			}

		}
	}

?>


<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>B Prakash 0b81e936</title>
	</head>
	<style>
		div {
			margin:100px 200px;
		}
		.lain {
			display:block;
			margin-bottom:15px;
		}
		a, span input{
			display:inline-block;
			margin-left:10px;
		}
	</style>
	<body>
		<div>
			<h2>Log-in</h2>
			<form method="post">
				<span class="lain">
					<label for="uname"><strong>Username</strong></label>
					<input type="text" name="who" id="uname">
				</span>
				<span class="lain">
					<label for="code"><strong>Password</strong></label>
					<input type="password" name="pass" id="code">
					<pre>Password Hint: Name of a three lettered programming language followed by '123'</pre>
				</span>
				<p style="color:red;"> <?php if($failure !== false) echo "$failure"; ?> </p>
				<input type="submit" value="Log In">
				<input type="submit" name="cancel" value="Cancel">
			</form>
		</div>
		
	</body>
</html>