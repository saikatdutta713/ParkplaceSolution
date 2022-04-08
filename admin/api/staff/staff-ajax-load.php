<?php
	
if($_SERVER['HTTP_HOST'] == "localhost"){
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$sql = "SELECT `p_id`,`p_name`,`email`,`phn_no`,`address`,`profession`,`password`,`joining_date`,`leaving_date`,`status` FROM `p_details`";

$result = mysqli_query($conn, $sql) or die("Query failed!");



 if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			
?>

	<tr>
		<td><?php echo $row["p_id"]; ?></td>
		<td><?php echo $row["p_name"]; ?></td>
		<td><?php echo $row["joining_date"]; ?></td>
		<td><?php echo $row["leaving_date"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><?php echo $row["phn_no"]; ?></td>
		<td><?php echo $row["address"]; ?></td>
		<td><?php echo $row["profession"]; ?></td>
		<td><?php echo $row["password"]; ?></td>
		<td><?php echo $row["status"]; ?></td>
		<td>
			<i class="fa fa-trash-o action-button delete-button" data-id="<?php echo $row['p_id']; ?>" aria-hidden="true"></i>
		</td>
	</tr>


<?php }

}else {
	echo "<tr><td colspan='11'><center><h2>No records found</h2></center></td></tr>";
}
?>