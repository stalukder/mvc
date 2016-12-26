

<div class="contenttex">
<?php 
foreach ($idpost as $key => $value) { 
?> 
	<div class="details">
		<div class="titlw">
			<h2><?php echo $value['title']; ?></h2>
			<p>Category: <a href="<?php echo BASE_URL; ?>/Index/postByCat/<?php echo $value['cat']; ?>"><?php echo $value['catName']; ?></a></p>
		</div>
		<div class="desc">
			<?php echo $value['mytext']; ?>
		</div>
	</div> 
<?php } ?>
</div>
