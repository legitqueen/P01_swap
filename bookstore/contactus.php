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
<title>Contact Us</title>

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



div.container {
    width: 100%;
    border: 1px solid gray;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: black;
    clear: left;
    text-align: center;
}

nav {
    float: left;
    max-width: 160px;
    margin: 0;
    padding: 1em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}

article {
    margin-left: 40px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}

</style>
</head>
<body>

<script>
function goBack() {
    window.history.back();
}
</script>

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
	<li style="float:right"><a href="javascript:goBack()">Back</a></li>
	<li style="float:right"><a href="#Cart">Cart</a></li>
	
</ul>

<br>

<div class="container">

<header>
	<h2>Contact Us</h2>
</header>

<nav>
<center><a href="#SocialMedia">Social Medias</a></center><br>
<a href="#Facebook"><center><img src="https://image.flaticon.com/icons/svg/124/124010.svg" alt="Facebook" style="width:40px;height:40px;"></center></a><br>
<a href="#Twitter"><center><img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/square-twitter-256.png" alt="Twitter" style="width:40px;height:40px;"></center></a><br>
<a href="#YouTube"><center><img src="https://www.youtube.com/yt/about/media/images/brand-resources/icons/YouTube_icon_full-color.svg" alt="YouTube" style="width:40px;height:40px;"></center></a><br>
<a href="#Instagram"><center><img src="https://instagram-brand.com/wp-content/uploads/2016/11/app-icon2.png" alt="Instagram" style="width:40px;height:40px;"></center></a><br>

</nav>



<article>
<center><h2>Our Mission Statement</h2></center>
<center><p>To read is to learn. Our goal is to ensure everyone has equal access to books.</p></center>


<center><h3>Address</h3></center>
<center><p>21 Tampines Avenue</p></center>
<center><p>529757</p></center>
<center><img src="TPLocation.png" alt="Location"></a></center>
<center><p>For any inquires, you can reach us at +65 6788 2000</p></center>

</article>

<footer>Copyright &copy; MoriNoKuniYa.com</footer>
</div>

</body>
</html>
<?php
}
?>