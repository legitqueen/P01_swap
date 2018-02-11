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

if(isset($_POST["update"]))
{
	if($_POST["update"]=="yes")
	{
		$supplier=$_POST["supplier"];
		$supplier_id=$_POST["supplier_id"];
		$serialNum=$_POST["serialNum"];
		$title=$_POST["title"];
		$wholesaleValue=$_POST["wholesaleValue"];
		$retailValue=$_POST["retailValue"];
		$quantityInStock=$_POST["quantityInStock"];
		$stockValue=$_POST["stockValue"];
		$query=$connect->prepare("UPDATE stocks SET supplier='$supplier', supplier_id='$supplier_id', serialNum='$serialNum', title='$title', wholesaleValue='$wholesaleValue', retailValue='$retailValue', quantityInStock='$quantityInStock', stockValue='$stockValue' WHERE SERIALNUM=".$_POST['serialNum']);
		
		if($query->execute())
		{
			echo "<center>Record Updated!</center><br>";
		}
	}
}

?>
<html>
<head>
<title>Update Table</title>
</head>
<body>
<style>
body {
	background-color:#f4f4f4
}
</style>

<h1><center>Update the Table</center></h1>
<p><a href="stockInfo.php">Go back</a></p> 


<?php
$query=$connect->prepare("select * from stocks");
$query->execute();
$query->bind_result($supplier, $supplier_id, $serialNum, $title, $wholesaleValue, $retailValue, $quantityInStock, $stockValue);
echo "<table align='center' border='3'>";
echo "<tr>";
echo "<th>Supplier</th>";
echo "<th>Supplier ID</th>";
echo "<th>Book Serial No.</th>";
echo "<th>Title</th>";
echo "<th>Wholesale Value ($)</th>";
echo "<th>Retail Value ($)</th>";
echo "<th>Quantity in Stock</th>";
echo "<th>Stock Value ($)</th>";
echo "</tr>";

while($query->fetch())
{
	echo "<tr>";
	echo "<td>".$supplier."</td>";
	echo "<td>".$supplier_id."</td>";
	echo "<td>".$serialNum."</td>";
	echo "<td>".$title."</td>";
	echo "<td>".$wholesaleValue."</td>";
	echo "<td>".$retailValue."</td>";
	echo "<td>".$quantityInStock."</td>";
	echo "<td>".$stockValue."</td>";
	
	echo "<td><a href='stockUpdate.php?operation=update&SERIALNUM=".$serialNum."&supplier=".$supplier."&supplier_id=".$supplier_id."&serialNum=".$serialNum."&title=".$title."&wholesaleValue=".$wholesaleValue."&retailValue=".$retailValue."&quantityInStock=".$quantityInStock."&stockValue=".$stockValue."'>Update</a></td>";
	
	echo "</tr>";	
}

echo "<table>";
?>

</body>
</html>
<?php
}
?>
