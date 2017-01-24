<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.13/js/jquery.dataTables.js"></script>
<td width="70%">
<?php 
if(!empty($_GET['msg'])){
	$msg = unserialize($_GET['msg']);
	foreach ($msg as $key => $value) {
		echo "<h3 style='color:green'>".$value."</h3>";
	}
} 
 ?>

<h2>Article List </h2><hr>


<table id="table_id" class="display"  data-page-length='5'>
	<thead>
		<tr>
			<th>Serial</th>
			<th>Title</th>
			<th>Content</th>
			<th>Category</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
<?php 
$i =0;
foreach ($alpost as $key => $value) {
	$i++;
?>
	<tr>
		<th><?php echo $i; ?></th>
		<th><?php echo $value['title'] ?></th>
		<th><?php 
		$contnt = $value['mytext'];
		if(strlen($contnt) > 100)
			echo substr($contnt, 0, 100); ?></th>
		<th><?php 
			foreach ($cat as $key => $catn) {
				if($catn['id'] == $value['cat'])
					echo $catn['title'];
			}  ?></th>
		<th>
			<a href="<?php echo BASE_URL; ?>/Admin/editPost/<?php echo $value['id']; ?>">Edit</a> ||
			<a onclick="return confirm('Are you confirm?');" href="<?php echo BASE_URL; ?>/Admin/deletePost/<?php echo $value['id']; ?>">Delete</a>
		</th>
	</tr>
<?php 
} ?>
</tbody>
</table>

</td>

<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>