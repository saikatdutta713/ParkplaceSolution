<?php


if ($_SERVER['HTTP_HOST'] == "localhost") {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$search = mysqli_real_escape_string($conn, $_POST['search']);

$result = mysqli_query($conn, "SELECT * FROM `city` WHERE `city` LIKE '%$search%';");

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) { ?>

		<tr class="text-center">
			<td><?php echo $row["city"]; ?></td>
			<td><?php echo $row["mobile_repair"]; ?></td>
			<td><?php echo $row["laptop_repair"]; ?></td>
			<td><?php echo $row["desktop_repair"]; ?></td>
			<td><?php echo $row["windows_7"]; ?></td>
			<td><?php echo $row["windows_8"]; ?></td>
			<td><?php echo $row["windows_10"]; ?></td>
			<td>
				<i class="fa fa-trash-o action-button delete-button" data-id="<?php echo $row['id']; ?>" aria-hidden="true"></i>
			</td>
		</tr>

<?php
	}
} else {
	echo "<tr><td colspan='8'><center><h2>No result found!</h2></center></td></tr>";
}
?>