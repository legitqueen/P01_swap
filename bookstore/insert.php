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

$connect=mysqli_connect("localhost","root","","bookstore");

if(! $connect )
{
	die("Could not connect: " . mysql_error());
}

if(isset($_POST["insert"])){
	if($_POST["insert"]=="yes")
	{
		$supplier=$_POST["supplier"];
		$supplier_id=$_POST["supplier_id"];
		$serialNum=$_POST["serialNum"];
		$title=$_POST["title"];
		$wholesaleValue=$_POST["wholesaleValue"];
		$retailValue=$_POST["retailValue"];	
		$quantityInStock=$_POST["quantityInStock"];
		$stockValue=$_POST["stockValue"];
		$query=$connect->prepare("INSERT INTO stocks(supplier, supplier_id, serialNum, title, wholesaleValue, retailValue, quantityInStock, stockValue) VALUES ('$supplier', '$supplier_id', '$serialNum', '$title', '$wholesaleValue', '$retailValue', '$quantityInStock', '$stockValue');");
		
		if($query->execute())
		{
			echo "<center>Successfully added into the stock information!</center><br>";
			sleep(3);
			header('location: stockInfo.php');
			exit;
		}
	}
}



?>
<?php
}
?>