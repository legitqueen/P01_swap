<?php
session_start();
if(!isset($_SESSION['sess_user']))
{
	header("location:loginpage.php");
}
else
{
?>
<html>
<head>
<link rel="stylesheet" href="signupstyle.css">
<title>Login</title>
</head>
<body>
<script>
function goBack() {
    window.history.back();
}
</script>
<h1><center>User Authentication </center></h1>
<a href="javascript:goBack()">Back</a>
<form action="" method="post">
<center><h3> Access only for authorized users! </h3></center><br>
<center><label>Username:</label><input type="text" name="username"><br/><br>
<label>Password:</label><input type="password" name="password"><br/><br>
<input type="submit" value="Verify" name="submit"></center>

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
		$query = mysqli_query($conn, "SELECT username,password,id FROM users WHERE username='".$username."'");
		$numrows = mysqli_num_rows($query);
		if($numrows >0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername=$row['username'];
				$dbpassword=$row['password'];
				$dbid=$row['id'];
				$unhashed=password_verify($password, $dbpassword);
			}
			if($username == $dbusername && $password == $unhashed)
			{
				if($dbid == '1')
				{
					session_start();
					$_SESSION['sess_user']=$username;
					//Redirect Browser
					header("Location:stockInfo.php");
				}
				else
				{
					echo "Your account is not Authorized!";
				}
			}
			else
			{
				echo "Invalid Username or Password!";
			}
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
<?php
}
?>