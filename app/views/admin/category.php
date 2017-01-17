<td width="70%">
<?php 
if(!empty($_GET['msg'])){
	$msg = unserialize($_GET['msg']);
	foreach ($msg as $key => $value) {
		echo "<h3 style='color:green'>".$value."</h3>";
	}
} 
 ?>

<h2>Category List </h2><hr>


<table border="1">
	<tr>
		<th>Serial</th>
		<th>Category Name</th>
		<th>Category Title</th>
		<th>Action</th>
	</tr>
<?php 
$i =0;
foreach ($cat as $key => $value) {
	$i++;
?>
	<tr>
		<th><?php echo $i; ?></th>
		<th><?php echo $value['catName'] ?></th>
		<th><?php echo $value['title'] ?></th>
		<th>
			<a href="<?php echo BASE_URL; ?>/Admin/editCat/<?php echo $value['id']; ?>">Edit</a> ||
			<a onclick="return confirm('Are you confirm?');" href="<?php echo BASE_URL; ?>/Admin/deleteCat/<?php echo $value['id']; ?>">Delete</a>
		</th>
	</tr>
<?php 
} ?>
</table>

</td>