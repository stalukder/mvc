<td width="70%">
<h2>Edit Cat </h2><hr>
<?php 
if(isset($msg)){
	echo $msg;
}

 ?>
 <?php 
	if(isset($catbyid)){
	foreach ($catbyid as $key => $value) { ?> 
 <br>
<form action="<?php echo BASE_URL; ?>/Admin/updatCategory/<?php echo $value['id']; ?>" method="post">

	<table> 
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title" value="<?php echo $value['title']; ?>"></td>
		</tr>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="catName" value="<?php echo $value['catName']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>
</td>

<?php } } ?>