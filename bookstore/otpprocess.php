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
$url='127.0.0.1:3306';
$username = "root";
$password = "";
$dbname = "bookstore";
$conn = mysqli_connect($url, $username,$password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$rno=$_SESSION['otp'];
$urno=$_POST['otpvalue'];
if(!strcmp($rno,$urno))
{
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$phone=$_SESSION['phone'];
// Create connection
$sql = "INSERT INTO otp (name, email, phone)
VALUES ('$name', '$email', '$phone')";
if (mysqli_query($conn, $sql)) {
$authKey = "abcdefghijkakkkanhas";
$mobileNumber = $phone;
//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "ABCDEF";
//Your message to send, Add URL encoding here.
$message = urlencode("Thank u for registering with us. We will get back to u shortly.");
//Define route 
$route = "route=4";
//Prepare you post parameters
$postData = array(
'authkey' => $authKey,
'mobiles' => $mobileNumber,
'message' => $message,
'sender' => $senderId,
'route' => $route
);
//API URL
$url="https://control.msg91.com/api/sendhttp.php";
// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
CURLOPT_URL => $url,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POST => true,
CURLOPT_POSTFIELDS => $postData
//,CURLOPT_FOLLOWLOCATION => true
));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
echo 'error:' . curl_error($ch);
}
curl_close($ch);
header( "Location: success.php" );
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
return true;
}
else
{
echo "failure";
return false;
}
?>
<?php
}
?>