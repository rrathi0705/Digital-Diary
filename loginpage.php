
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login </title>
	<link rel="stylesheet" href="stylelogin1.css">

</head>
<img class="logo" src="logogo.png">
<body class="bgimg">
	<div class="container">
		<div class="login-box">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<form action="includes/login.inc.php" method="POST">
	            <label for="username">Username</label>
				<br>
				<input type="text" id="username" name="uid" required>
				<br>
				<label for="password">Password</label>
				<br>
				<input type="password" id="password" name="pwd" required>
				<br>
				<button type="submit" name="submit">Sign In</button>
				<br>
				<a href="signup.php"><p class="small">Register here</p></a>
	        </form>
		</div>
        <div class="pencil">
            <img src="pencil.png" >
        </div>
	</div>
</body>

</html>