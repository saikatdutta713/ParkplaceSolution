<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$search_value = mysqli_real_escape_string($conn, $_POST['search']);

$sql = "SELECT `s_id`,`s_name`,`service_type`,`offer` FROM `service` WHERE `s_id` LIKE '%$search_value%' OR `s_name` LIKE '%$search_value%' OR `service_type` LIKE '%$search_value%' OR `offer` LIKE '%$search_value%' ORDER BY `s_id` DESC";

$result = mysqli_Query($conn, $sql) or die("Query failed!");

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {

?>

		<tr class="text-center">
			<td><?php echo $row["s_id"]; ?></td>
			<td><?php echo $row["s_name"]; ?></td>
			<td><?php echo $row["service_type"]; ?></td>
			<td><?php echo $row["offer"]; ?></td>
			<td>
				<i class="fa fa-trash-o action-button delete-button" data-id="<?php echo $row['s_id']; ?>" aria-hidden="true"></i>
			</td>
		</tr>

<?php

	}
} else {
	echo "<tr><td colspan='6'><center><h2>No records found</h2></center></td></tr>";
}

?>