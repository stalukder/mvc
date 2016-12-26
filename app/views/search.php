<div class="search">
	<form action="<?php echo BASE_URL; ?>/Index/search/" method="post">
		<input type="text" name="keyword" placeholder="Search here...">
		<select name="category" id="category">
			<option value="">Select One</option>
			<?php 
				foreach ($cat as $key => $value) { 
			?>  
				<option value="<?php echo $value['id']; ?>"><?php echo $value['catName']; ?></option>
			<?php } ?>  
		</select>
		<button type="submit">Search</button>
	</form>
</div>