

	<div class="contenttex">
<?php 
foreach ($catpost as $key => $value) { 
?> 
	<div class="post">
		<h2><?php echo $value['title']; ?></h2>
			<p>Category: <a href="<?php echo BASE_URL; ?>/Index/postByCat/<?php echo $value['cat']; ?>"><?php echo $value['catName']; ?></a></p>
		<div class="descrip"><?php 

		$text = $value['mytext']; 
		if(strlen($text) > 200){ 
			$text = substr($text, 0,200); 
		}
		echo $text; 

		?>
			<a href="<?php echo BASE_URL; ?>/Index/postDetails/<?php echo $value['id']; ?>" class="readmore">Read More</a>
		</div>
	</div>
<?php } ?>
	</div>
