<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$search_value = mysqli_real_escape_string($conn, $_POST['search']);

$sql = "SELECT `id`,`name`,`email`,`phone`,`address` FROM `users` WHERE `id` LIKE '%$search_value%' OR `name` LIKE '%$search_value%' OR `email` LIKE '%$search_value%' OR `phone` LIKE '%$search_value%' OR `address` LIKE '%$search_value%' ";

$result = mysqli_Query($conn, $sql) or die("Query failed!");

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {

?>

		<tr>
			<td><?php echo $row["id"]; ?></td>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["phone"]; ?></td>
			<td><?php echo $row["address"]; ?></td>
			<td>
				<i class="fa fa-trash-o action-button delete-button" data-id="<?php echo $row['id']; ?>" aria-hidden="true"></i>
			</td>
		</tr>

<?php

	}
} else {
	echo "<tr><td colspan='6'><center><h2>No records found</h2></center></td></tr>";
}

?>