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
<title>Home</title>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
	border-right:1px solid #bbb;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

li a:hover:not(.active) {
    background-color: #997546;
}

.active {
    background-color: #4CAF50;
}

img.home {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 25px;
  -webkit-transition-duration: 0.8s;
  -moz-transition-duration: 0.8s;
  transition-duration: 0.8s;
  pointer-events: auto;
}

.nav {
  position: fixed;
  height: 212px;
  width: 100%;
  z-index: 2;
  top: 0px;
  pointer-events: none;
}

</style>
</head>
<body>

<div class="nav">
<a href="MainPage.php">
<center><img class="home" src="morifinishbig.png" alt="home" style="width:128px;height:128px;"></center>
</a>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

<h1><center>Mori no Kuni ya ( 森の国屋 )</center></h1>

<ul>
	<li><a class="active" href="MainPage.php">Home</a></li>
	<li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Books</a><div class="dropdown-content"><a href="bestseller.php">Best Sellers</a><a href="newrelease.php">New Releases</a><a href="showall.php">Show All</a></div></li>
	<li><a href="contactus.php">Contact Us</a></li>
	<li style="float:right"><?=$_SESSION['sess_user'];?>!<a href="logout.php">Logout</a></li>
	<li style="float:right"><a href="#Cart">Cart</a></li>
	<li style="float:right"><a href="loginrestricted.php">Restricted Access</a></li>
</ul>

<br>
<br>

<h2><center>Selling Out Fast!</center></h2>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
p {
  text-align: center;
  font-size: 20px;
  margin-top:0px;
}
</style>
</head>
<body>

<p id="countdown"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Feb 15, 2018 16:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>
<?php

$connect=mysqli_connect("localhost","root","","bookstore");

$query=$connect->prepare("SELECT * FROM stocks ORDER BY quantityInStock ASC LIMIT 3");
$query->execute();
$query->bind_result($supplier, $supplier_id, $serialNum, $title, $wholesaleValue, $retailValue, $quantityInStock, $stockValue);
echo "<table cellpadding='15' align='center' border='1'>";
echo "<tr>";
echo "<th>Supplier</th>";
echo "<th>Title</th>";
echo "<th>Price (S$)</th>";
echo "<th> </th>";
echo "<th> </th>";
echo "<th> </th>";
echo "</tr>";
while($query->fetch())
{
	echo "<tr>";
	echo "<td>".$supplier."</td>";
	echo "<td>".$title."</td>";
	echo "<td>".$retailValue."</td>";
	echo "<td><form action='cart.php' method='post'><input type='hidden' name='name' value='$supplier' /></td>"; //remember to do this part
	echo "<td><input type='submit' name='submit' value='Detail'></form></td>"; //remember to do this part
	echo "<td><input type='submit' name='submit' value='Cart'></form></td>"; //remember to do this part
	echo "</tr>";
	
}
echo "</table>";

?>


</body>
</html>
<?php
}
?>