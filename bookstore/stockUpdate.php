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
<title>Update Row</title>
</head>
<body>
<h1><center>Update the row</center></h1>
<p><a href="update.php">Go back</a></p> 
<form method="post" action="update.php">
<table align="center" border="0">



<tr>
<td>Supplier:</td>
<td><input type="text" name="supplier" required value="<?php echo $_GET['supplier']; ?>"/></td>
</tr>
<tr>
<td>Supplier ID:</td>
<td><input type="number" min="1" name="supplier_id" required value="<?php echo $_GET['supplier_id']; ?>"/></td>
</tr>
<tr>
<td>Book Serial No.:</td>
<td><input type="number" min="1" name="serialNum" required value="<?php echo $_GET['serialNum']; ?>"/></td>
</tr>
<tr>
<td>Title:</td>
<td><input type="text" name="title" required value="<?php echo $_GET['title']; ?>"/></td>
</tr>
<tr>
<td>Wholesale Value ($):</td>
<td><input type="number" min="1" step="0.01" name="wholesaleValue" required value="<?php echo $_GET['wholesaleValue']; ?>"/></td>
</tr>
<tr>
<td>Retail Value ($):</td>
<td><input type="number" min="1" step="0.01" name="retailValue" required value="<?php echo $_GET['retailValue']; ?>"/></td>
</tr>
<tr>
<td>Quantity In Stock:</td>
<td><input type="number" min="1" name="quantityInStock" required value="<?php echo $_GET['quantityInStock']; ?>"/></td>
</tr>
<tr>
<td>Stock Value ($):</td>
<td><input type="number" min="1" step="0.01" name="stockValue" required value="<?php echo $_GET['stockValue']; ?>"/></td>
</tr>

<tr>
<td colspan="2" align="center">
&nbsp;
<input type="hidden" name="serialNum" value="<?php echo $_GET['serialNum'] ?>" />
<input type="hidden" name="update" value="yes" />
<input type="submit" value="update"  onclick="return confirm('Do you really want to submit the form?');" />
</td>
</tr>
</table>
</form>
</body>
</html>
<?php
}
?>