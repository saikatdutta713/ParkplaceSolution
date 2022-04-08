<?php
	
if($_SERVER['HTTP_HOST'] == "localhost"){
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$sql = "SELECT `p_id`,`p_name`,`email`,`phn_no`,`address`,`profession`,`password`,`Request_date` FROM `temp_p_details`";

$result = mysqli_query($conn, $sql) or die("<h2>Query failed!</h2>");



 if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			
?>

		<tr>
			<td><?php echo $row["p_id"]; ?></td>
			<td><?php echo $row["p_name"]; ?></td>
			<td><?php echo $row["Request_date"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["phn_no"]; ?></td>
			<td><?php echo $row["address"]; ?></td>
			<td><?php echo $row["profession"]; ?></td>
			<td><?php echo $row["password"]; ?></td>
			<td>
				<i class="fa fa-check-square-o action-button accept-button" data-id="<?php echo $row['p_id']; ?>" aria-hidden="true"></i>
			</td>
			<td>
				<i class="fa fa-times action-button reject-button" data-id="<?php echo $row['p_id']; ?>" aria-hidden="true"></i>
			</td>
		</tr>


<?php
	
	 }

}else {
	echo "<tr><td colspan='10'><center><h2>No records found</h2></center></td></tr>";
}
?>