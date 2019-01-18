<?php  

	session_start(); //using sessions

	// variable declaration 
	$fullname = "";
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = ""; 
	


	// connecting to the database 
	$db = mysqli_connect('localhost', 'nextdrea_dream', 'nextdream12345', 'nextdrea_registration');

	// REGISTERING THE  USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form 
		$fullname = mysqli_real_escape_string($db, $_POST['fullname']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled 
        if(empty($fullname)){
			array_push($errors, "fullname is required");
		}

		if (empty($username)) {
			 array_push($errors, "Username is required"); 
			}
		if (empty($email)) { 
			array_push($errors, "Email is required");
		 }
		if (empty($password_1)) {
			 array_push($errors, "Password is required"); 
			}
             //check if both passwords are the same else kick this fraud out. 
		if ($password_1 != $password_2) { 

			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) { 
		    
		    	
			//variables for sending mails
				$subject = "NextDream Login Details"; 
               $message = " Hello $fullname, your username is $username and password is $password_1 "; 
               $headers = "From: info@nextdreamtravels.com"; 
	
			//send users their login details.
			mail($email,$subject,$message,$headers);
			
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (fullname, username, email, password) 
					  VALUES('$fullname', '$username', '$email', '$password')";
			mysqli_query($db, $query);  
			
			$_SESSION['username'] = $fullname;
			$_SESSION['success'] = "You are now logged in";
			header('location: login.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: https://paystack.com/pay/nextdreamluxurytravels-payment');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>