<?php
$connect = new mysqli('localhost', 'root', '') or die(mysqli_error());
 //Select DB From database
$db = mysqli_select_db($connect, 'bookstore') or die("databse error");

if(isset($_POST["insert"])){
	if($_POST["insert"]=="yes")
	{
		$username=$_POST["username"];
		$first_name=$_POST["first_name"];
		$last_name=$_POST["last_name"];
		$address=$_POST["address"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$options = ['cost' => 12];
		$md5= password_hash($password, PASSWORD_DEFAULT, $options);
		$query=$connect->prepare("insert into users(USERNAME, FIRST_NAME, LAST_NAME, ADDRESS, EMAIL, PASSWORD) values('$username', '$first_name', '$last_name', '$address', '$email', '$md5');");
		if($query->execute())
		{
			header('Location: loginpage.php');
		}
	}
}
?>


<html>
<head>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<script>
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function capcha_filled(){
	allowSubmit = true;
}

</script>
<link rel="stylesheet" href="signupstyle.css">
<h1><center>Welcome to Mori no Kuni ya</center></h1>
<div class="header">
	<h2>Registration</h2>
</div>

<body style='background-color:#f4f4f4'>
<form method="post" action="signup.php">
<table align="center" border="0">
<tr>
<td>Username:</td>
<td><input type="text" name="username" /></td>
</tr>
<tr>
<td>First name:</td>
<td><input type="text" name="first_name" /></td>
</tr>
<tr>
<td>Last name:</td>
<td><input type="text" name="last_name" /></td>
</tr>
<tr>
<td>Address:</td>
<td><input type="text" name="address" /></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="varchar" name="email" /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="password" id="myInput" /><br>
<input type="checkbox" onclick="myFunction()">Show Password</td>
</tr>

<div class="g-recaptcha" data-sitekey="6LeNaEUUAAAAAPTp3gRlJvDnbYzNb8fXzwO0c3KV"></div>

<td>&nbsp;</td>
<td align="right">
<input type="hidden" name="insert" value="yes" />
<input type="submit" value="Sign Up"/>
</td>
</tr>
</table>
<p>
		Already a member? <a href="loginpage.php">Sign in</a>
	</p>
</form>
</body>
</html>
