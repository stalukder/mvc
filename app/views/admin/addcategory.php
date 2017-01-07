<td width="70%">
<h2>Welcome Admin Panel </h2><hr>
<?php 
if(isset($msg)){
	echo $msg;
}

 ?>
 <br>
<form action="<?php echo BASE_URL; ?>/Admin/insertCategory" method="post">
	<table>
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title"></td>
		</tr>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="catName"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>
</td>