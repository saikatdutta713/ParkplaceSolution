<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$type = mysqli_real_escape_string($conn, $_POST['type']);

$sql = "SELECT `s_id`,`s_name`,`service_type` FROM `service` WHERE `service_type` LIKE '%$type%'";

$result = mysqli_query($conn, $sql) or die("<h2>Query failed!</h2>");



if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {

?>
		<div class="sidebar-component">
			<a href="booking.php?service=<?php echo strtok($type, ' ') . ' ' . $row['s_name']; ?>&type=<?php echo $type; ?>">
				<h5 style="color: black;text-transform:uppercase">
					<?php echo $row["s_name"]; ?>
				</h5>
				<i class="fa fa-chevron-right" aria-hidden="true"></i>
			</a>
		</div>



<?php

	}
} else {
	echo "<h2 style='font-size: 18px;text-align:center;margin-top:10px'>No Service Available!</h2>";
}
?>