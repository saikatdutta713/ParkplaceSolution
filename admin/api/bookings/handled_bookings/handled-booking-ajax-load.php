<?php
	
if($_SERVER['HTTP_HOST'] == "localhost"){
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$sql = "SELECT * FROM `handled_booking`";

$result = mysqli_query($conn, $sql) or die("<h2>Query failed!</h2>");



 if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			
?>

		<tr class="text-center">
			<td><?php echo $row["booking_id"]; ?></td>
			<td><?php echo $row["service"]; ?></td>
			<td><?php echo $row["full_name"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["phone"]; ?></td>
			<td><?php echo $row["building"]; ?></td>
			<td><?php echo $row["area"]; ?></td>
			<td><?php echo $row["landmark"]; ?></td>
			<td><?php echo $row["pincode"]; ?></td>
			<td><?php echo $row["city"]; ?></td>
			<td><?php echo $row["time_slot"]; ?></td>
			<td><?php echo $row["booking_date"]; ?></td>
			<td><?php echo $row["completing_date"]; ?></td>
			<td>
				<i class="fa fa-trash-o action-button delete-button" data-id="<?php echo $row['booking_id']; ?>" aria-hidden="true"></i>
			</td>
		</tr>


<?php
	
	 }

}else {
	echo "<tr><td colspan='11'><center><h2>No records found</h2></center></td></tr>";
}
?>