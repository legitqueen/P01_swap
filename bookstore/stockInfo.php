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
<title>Stock View</title>
</head>

<body>

<script>

function goBack() {
    window.history.back();
}
</script>

<style>
body {
	background-color:#f4f4f4
}
</style>
</body>

<body>
<center><h1>Stock Information</h1></center>
<p><a href="javascript:goBack()">Back</a></p> <!-- Replace this later -->


<?php
$connect=mysqli_connect("localhost","root","","bookstore");

$query=$connect->prepare("select * from stocks");
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
	echo "</tr>";	
	
}
echo "</table>";

?>

<center>
<p><a href="stockInsert.php">Insert a new row</a></p>
</center>
<center>
OR
</center>
<center>
<p><a href="update.php">Update the table</a></p>
</center>
<center>
OR
</center>
<center>
<p><a href="delete.php">Delete rows</a></p>
</center>

</body>
</html>
<?php
}
?>