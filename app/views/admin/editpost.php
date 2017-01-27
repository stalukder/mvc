<script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<td width="70%">
<h2>Edit Article </h2><hr>
 
 <br>
 <?php foreach ($postbyid as $key => $value) {
 ?>
 <form action="<?php echo BASE_URL; ?>/Admin/updatePost/<?php echo $value['id']; ?>" method="post"> 
	<table>
		<tr>
			<td>Title:</td>
			<td><input type="text" value="<?php echo $value['title']; ?>" name="title"></td>
		</tr>
		<tr>
			<td>Content:</td>
			<td><textarea name="mytext" id="" cols="30" rows="10"><?php echo $value['mytext']; ?></textarea></td>
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
				<option
				<?php if($catn['id']== $value['cat']): ?>
					selected="selected"
				<?php endif; ?>

				 value="<?php echo $catn['id']; ?>"><?php echo $catn['title']; ?></option> 
				<?php }  ?> 
			</select></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Update"></td>
		</tr>
	</table>
</form>
<?php } ?>
</td>