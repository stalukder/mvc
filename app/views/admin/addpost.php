<script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<td width="70%">
<h2>Add Article </h2><hr>
<?php 
if(isset($msg)){
	echo $msg;
}
if(isset($posterrors)){
	echo "<div class=\"error\">";
	foreach ($posterrors as $key => $value) {
		 switch ($key) {
		 	case 'title':
		 		foreach ($value as $key => $val) {
		 			echo "Title ". $val. "<br>";
		 		}
		 		break;
		 	case 'mytext':
		 		foreach ($value as $key => $val) {
		 			echo "Content ". $val. "<br>";
		 		}
		 		break;
		 	case 'cat':
		 		foreach ($value as $key => $val) {
		 			echo "Category ". $val. "<br>";
		 		}
		 		break; 
		 }
	}
	echo "</div>";
}

 ?>
 <br>
 <form action="<?php echo BASE_URL; ?>/Admin/addNewPost" method="post"> 
	<table>
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title"></td>
		</tr>
		<tr>
			<td>Content:</td>
			<td><textarea name="mytext" id="" cols="30" rows="10"></textarea></td>
			<script>
			    CKEDITOR.replace( 'mytext' );
			</script>
		</tr>
		<tr>
			<td>Category:</td>
			<td><select name="cat" id="">
				<option value="0">Select One</option>
				<?php 
				foreach ($cat as $key => $catn) { ?>
				<option value="<?php echo $catn['id']; ?>"><?php echo $catn['title']; ?></option> 
				<?php }  ?> 
			</select></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>
</td>