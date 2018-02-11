<?php
session_start();
if(!isset($_SESSION['sess_user']))
{
	header("location:loginpage.php");
}
else
{
?>
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<title>Form</title>
<body>
<form action="otpprocess.php" method="post">
<input type="text" name="otpvalue"/>
<input type="submit" value="submit"  />
</form>
</body>
</html>
<?php
}
?>