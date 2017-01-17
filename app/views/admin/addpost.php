<script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<td width="70%">
<h2>Add Article </h2><hr>
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
			<td>Content:</td>
			<td><textarea name="mytext" id="" cols="30" rows="10"></textarea></td><script>
    CKEDITOR.replace( 'mytext' );
</script>
		</tr>
		<tr>
			<td>Category:</td>
			<td><select name="cat" id="">
				<option value="">One</option>
				<option value="">Two</option>
				<option value="">Three</option>
			</select></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>
</td>