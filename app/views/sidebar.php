	<div class="sidebar">
		<div class="singlesid">
			<h4>Category</h4>
			<?php 
				foreach ($cat as $key => $value) { 
			?> 
				<a href="<?php echo BASE_URL; ?>/Index/postByCat/<?php echo $value['id']; ?>" class="cat"><?php echo $value['catName']; ?></a>
			<?php } ?> 
		</div>
		<div class="singlesid">
			<h4>Latest Post</h4>
			<?php 
				foreach ($latestpost as $key => $value) { 
			?> 
				<a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['id']; ?>" class="cat"><?php echo $value['title']; ?></a>
			<?php } ?>  
		</div>
	</div>
 

