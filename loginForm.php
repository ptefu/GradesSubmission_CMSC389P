<!doctype html>
<html>
    <head> 
		<title>Login Form</title>	
	</head>

	<body>
		<h1>Grades Submission System</h1>
		
		<form action="loginForm.php" method="post">
			<p style="float: left;">
				<strong>Login ID:</strong> <input type="text" name="loginid" required/>
			</p>
			
			<br><br><br>
			
			<p style="float: left;">
				<strong>Password:</strong> <input type="password" name="password" required/>
			</p>
			
			<br><br><br><br>
			
			<input type="submit" value="Submit" name="submitButton">
            
		</form>
		
		<!--self referencing script for login-->
		<?php
			if (isset($_POST["submitButton"])) {
				$loginid_input = trim($_POST["loginid"]);
				$password_input = trim($_POST["password"]);
					
				if ($loginid_input == "cmsc298s" || $password_input == "terps") {
					session_start();
					$_SESSION = array();
					header("Location: sectionInfoForm.php");
				} else {
					echo "<h1>Invalid Login Information</h1>";
				} 
			}
		?>
	</body>
	
</<html>



