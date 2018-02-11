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
<body>
<head>
<title>Stock Insert</title>
</head>


<style>
body {
	background-color:#f4f4f4
}
</style>

<h1><center>Add a new row to Inventory</center></h1>
<p><a href="stockInfo.php">Go back</a></p>
<form method="post" action="insert.php">

<table align="center" border="0">
<tr>
<td>Supplier:</td>
<td><input type="text" name="supplier" required /></td>
</tr>
<tr>
<td>Supplier ID:</td>
<td><input type="number" min="1" name="supplier_id" required /></td>
</tr>
<tr>
<td>Book Serial No.:</td>
<td><input type="number" min="1" name="serialNum" required /></td>
</tr>
<tr>
<td>Title:</td>
<td><input type="text" name="title" required /></td>
</tr>
<tr>
<td>Wholesale Value ($):</td>
<td><input type="number" min="1" step="0.01" name="wholesaleValue" required /></td>
</tr>
<tr>
<td>Retail Value ($):</td>
<td><input type="number" min="1" step="0.01" name="retailValue" required /></td>
</tr>
<tr>
<td>Quantity In Stock:</td>
<td><input type="number" min="1" name="quantityInStock" required /></td>
</tr>
<tr>
<td>Stock Value ($):</td>
<td><input type="number" min="1" step="0.01" name="stockValue" required /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right">
<input type="hidden" name="insert" value="yes" />
<input type="submit" value="Insert Record" onclick="return confirm('Do you really want to submit the form?');" />
</td>
</tr>
</table>
</form>

<?php
$connect=mysqli_connect("localhost","root","","bookstore");

if(! $connect )
{
	die("Could not connect: " . mysql_error());
}

if ($query = $connect->prepare("SELECT * FROM item")) {
    $query->execute();

    $query->bind_result($supplier, $supplier_id, $serialNum, $title, $wholesaleValue, $retailValue, $quantityInStock, $stockValue);
	echo "<table align='center' border='3'>";
	echo "<tr>";
	echo "<th>Supplier</th>";
	echo "<th>Supplier Id</th>";
	echo "<th>Book Serial No.</th>";
	echo "<th>Title</th>";
	echo "<th>Wholesale Value</th>";
	echo "<th>Retail Value</th>";
	echo "<th>Quantity In Stock</th>";
	echo "<th>Stock Value</th>";
	echo "</tr>";
    
    while ($query->fetch()) {
        echo "<tr>";
		echo "<td>".$supplier."</td>";
		echo "<td>".$supplier_id."</td>";
		echo "<td>".$serialNum."</td>";
		echo "<td>".$title."</td>";
		echo "<td>".$wholesaleValue."</td>";
		echo "<td>".$retailValue."</td>";
		echo "<td>".$quantityInStock."</td>";
		echo "<td>".$stockValue."</td>";
		echo "<td><a href='edit.php?operation=edit&supplier=".$supplier."&supplier_id=".$supplier_id."&serialNum=".$serialNum."&title=".$title."&wholesaleValue=".$wholesaleValue."&retailValue=".$retailValue."&quantityInStock=".$quantityInStock."&stockValue=".$stockValue."'>edit</a></td>";
		echo "<td><a href='index.php?operation=delete&id=".$id."'>delete</a></td>";
		echo "</tr>";
    }
	
    $query->close();
	
}

?>

</body>
</html>
<?php
}
?>