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
date_default_timezone_get('Asia/Singapore');



if(isset($_POST["insert"])){
	if($_POST["insert"]=="yes")
	{
	
		$comment=$_POST["comment"];	
		$event = "Successful Data Insertion";
		$time = date('Y-m-d H:i:s');
		$query=$connect->prepare("insert into comments( COMMENT) values('$comment');");
		$query2=$connect->prepare("insert into logs(TIME, EVENT) values('$time', '$event');");
			if($query->execute())
			{
				echo "<br><center>INSERTED!</center></br>";
			}
			if($query2->execute())
			{
				echo "<br><center>Log Updated</center></br>";
			}
	}
}

if(isset($_POST["update"])){
	if($_POST["update"]=="yes")
	{
	$user=$_POST["user"];
	$serialNum=$_POST["serialNum"];
	$bookname=$_POST["bookname"];
	$comment=$_POST["comment"];
	
	$query=$connect->prepare("update comments set USER='$user' , SERIALNUM='$serialNum', BOOKNAME='$bookname', COMMENT='$comment' where USER=".$_POST['user']);
	if($query->execute())
	{
		echo "<center><br>Record Updated!</center></br>";
	}
	}
}


if(isset($_GET['operation'])){
	if($_GET['operation']=="delete")
	{
		$query=$connect->prepare("delete from comments where USER=".$_GET['user']);
		if($query->execute())
			{
				echo "<br><center>DELETED!</center></br>";
			}
	}
}
?>
<html>
<body>
<a href="websitereviews.php">Go back to Reviews</a>
<b><center>Add Website Reviews</center></b>
<form method="post" action="harwinderindex.php">
<table align="center" border="0">

<td>comment:</td>
<td><input type="varchar" name="comment" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right">
<input type="hidden" name="insert" value="yes" />
<input type="submit" value="Insert Record"/>
</td>
</tr>
</table>
</form>

<?php
$query=$connect->prepare("select * from comments");
$query->execute();
$query->bind_result($user, $serialNum, $bookname, $comment);
echo "<table align='center' border='1'>";
echo "<tr>";
echo "<th>comment</th>";
echo "</tr>";
while($query->fetch())
{
	echo "<tr>";
	echo "<td>".$comment."</td>";
	echo "<td><a href='edit.php?operation=edit&user=".$user."&serialNum=".$serialNum."&bookname=".$bookname."&comment=".$comment."'>edit</a></td>";
	echo "<td><a href='harwinderindex.php?operation=delete&user=".$user."'>delete</a></td>";
	echo "</tr>";	
	
}
echo "</table>";
?>
</body>
</html>
<?php
}
?>