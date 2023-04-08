<?php
	include '../Controller/LoginController.php';
?>

<?php
	$class = new LoginController();
	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
		$user = $_POST['user'];
		$password = $_POST['password'];
		
		$loginCheck = $class->Login($user, $password);
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="../Assets/CSS/Login.css" rel="stylesheet">
</head>
<body>
<body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
				<h6 style="color:red;">
					<?php
						if (isset($loginCheck))
						{
							echo $loginCheck;
						}
					?>
				</h6>
			</div>
			<form class="login-form" action="Login.php" method="post">
				<div class="control-group">
				<input type="text" class="login-field" value="" placeholder="username" id="login-name" name="user">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="password" id="login-pass" name="password">
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<input class="btn btn-primary btn-large btn-block" type="submit" value="Log in"/>
				<a class="login-link" href="#">Lost your password?</a>
			</form>
		</div>
	</div>
</body>

</body>
</html>
