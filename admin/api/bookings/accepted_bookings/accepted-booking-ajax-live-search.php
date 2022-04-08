<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$search_value = mysqli_real_escape_string($conn, $_POST['search']);

$sql = "SELECT * FROM `accepted_booking` WHERE `booking_id` LIKE '%$search_value%' OR `service` LIKE '%$search_value%' OR `full_name` LIKE '%$search_value%' OR `email` LIKE '%$search_value%' OR `phone` LIKE '%$search_value%' OR `city` LIKE '%$search_value%' OR `booking_date` LIKE '%$search_value%' OR `pincode` LIKE '%$search_value%' OR `time_slot` LIKE '%$search_value%' OR `accepting_date` LIKE '%$search_value%'";

$result = mysqli_Query($conn, $sql) or die("Query failed!");

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
			<td><?php echo $row["accepting_date"]; ?></td>
			<td>
				<i class="fa fa-check-square-o action-button confirm-button" data-id="<?php echo $row['booking_id']; ?>" aria-hidden="true"></i>
			</td>
		</tr>

<?php

	}
} else {
	echo "<tr><td colspan='9'><center><h2>No records found</h2></center></td></tr>";
}

?>