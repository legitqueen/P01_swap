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
<title>Delete Row</title>
</head>
<body>
<style>
body {
	background-color:#f4f4f4
}
</style>
</body>
<body>
<h1><center>Delete a row in Inventory</center></h1>
<p><a href="stockInfo.php">Go back</a></p>

<?php
$connect=mysqli_connect("localhost","root","","bookstore");

$query=$connect->prepare("select * from stocks ");
$query->execute();
$query->bind_result($supplier, $supplier_id, $serialNum, $title, $wholesaleValue, $retailValue, $quantityInStock, $stockValue);
echo "<table align='center' border='3'>";
echo "<tr>";
echo "<th>Supplier</th>";
echo "<th>Supplier ID</th>";
echo "<th>Book Serial No.</th>";
echo "<th>Title</th>";
echo "<th>Wholesale Value (S$)</th>";
echo "<th>Retail Value (S$)</th>";
echo "<th>Quantity In Stock</th>";
echo "<th>Stock Value (S$)</th>";
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
	echo "<td><form action='reroute.php' method='post'><input type='hidden' name='name' value='$supplier' /></td>";
	echo "<td><input type='submit' name='submit' value='Delete'></form></td>";
	echo "</tr>";	
}
echo "</table>";

?>
</body>
</html>
<?php
}
?>