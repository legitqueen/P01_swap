<html>
<head>
<script>
var allowSubmit =false;

var onloadCallback = function() {
    grecaptcha.render('g-recaptcha', {
      'sitekey' : '6LeNaEUUAAAAAPTp3gRlJvDnbYzNb8fXzwO0c3KV',
      'callback': capcha_filled,
      'expired-callback': capcha_expired,
    });
  };

function capcha_filled()
{
	allowSubmit = true;
}

function capcha_expired()
{
	allowSubmit = false;
}

function check_if_capcha_is_filled (e)
{
	if(allowSubmit) return true;
	e.preventDefault();
	alert('Fill in the capcha!);
}
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link rel="stylesheet" href="signupstyle.css">
<title>Login</title>
</head>
<body>
<h1><center>Login</center></h1>
<form action="" method="post" >
<label>Username:</label><input type="text" name="username"><br/>
<label>Password:</label><input type="password" name="password"><br/>
<div class="g-recaptcha" 
	data-callback="capcha_filled"
	data-expired-callback="capcha_expired"
	data-sitekey="6LeNaEUUAAAAAPTp3gRlJvDnbYzNb8fXzwO0c3KV"></div>
<input type="submit" value="Login" name="submit" onclick="check_if_capcha_is_filled"><br/>
<!--New user Register Link -->
<p><a href="signup.php">New User Registeration!</a></p>
</form>
<?php
if(isset($_POST["submit"]))
{
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
	
		//DB Connection
		$conn = new mysqli('localhost', 'root', '') or die(mysqli_error());
		//Select DB From database
		$db = mysqli_select_db($conn, 'bookstore') or die("database error");
		//Selecting database
		$query = mysqli_query($conn, "SELECT username,password FROM users WHERE username='".$username."'");
		$numrows = mysqli_num_rows($query);
		if($numrows >0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername=$row['username'];
				$dbpassword=$row['password'];
				$unhashed=password_verify($password, $dbpassword);
			}
			if($username == $dbusername && $password == $unhashed)
			{
				session_start();
				$_SESSION['sess_user']=$username;
				//Redirect Browser
				header("Location:MainPage.php");
			}
		}
		else
		{
			echo "Invalid Username or Password!";
		}
	}
	else
	{
		echo "Required All fields!";
	}
}
?>
</body>
</html>