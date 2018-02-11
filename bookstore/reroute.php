<?php
$connect=mysqli_connect("localhost","root","","bookstore");

$longname = $_POST['name'];
print $longname;

$query= $connect->prepare("DELETE FROM `stocks` WHERE `supplier` = \"$longname\"");

if ($query->execute()){
	sleep(3);
	header('Location: delete.php');
	exit();

}else{
  echo "Error in executing";
}
?>