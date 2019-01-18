<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>NextDream Registration</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
	
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?> 

		<div class="form-group">
			<label>Fullname</label>
			<input type="text" name="fullname" class = "form-control" value="<?php echo $fullname; ?>">
		</div>

		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class = "form-control" value="<?php echo $username; ?>">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class = "form-control" value="<?php echo $email; ?>">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password_1" class = "form-control">
		</div>
		<div class="form-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" class = "form-control">
		</div>
		<div class="form-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
</html>