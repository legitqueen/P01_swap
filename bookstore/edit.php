<html>
<form method="post" action="index.php">
<table align="center" border="0">
<tr>
<td>user:</td>
<td><input type="text" name="user" value="<?php echo $_GET['user']; ?>" /></td>
</tr>
<tr>
<td>serialNum:</td>
<td><input type="text" name="serialNum" value="<?php echo $_GET['serialNum']; ?>"/></td>
</tr>
<tr>
<td>bookname:</td>
<td><input type="text" name="bookname" value="<?php echo $_GET['bookname']; ?>"/></td>
</tr>
<tr>
<td>comment:</td>
<td><input type="text" name="comment" value="<?php echo $_GET['comment']; ?>"/></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right">
<input type="hidden" name="user" value="<?php echo $_GET['user'] ?>" />
<input type="hidden" name="update" value="yes" />
<input type="submit" value="update Record"/>
</td>
</tr>
</table>
</form>
<html>