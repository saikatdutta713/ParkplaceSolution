<?php
	
if($_SERVER['HTTP_HOST'] == "localhost"){
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$sql = "SELECT `id`,`subject`,`note`,`date` FROM `notify`";

$result = mysqli_query($conn, $sql) or die("<h2>Query failed!</h2>");

 if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			
?>

		<tr>
			<td><?php echo $row["subject"]; ?></td>
			<td><?php echo $row["note"]; ?></td>
			<td><?php echo $row["date"]; ?></td>
			<td>
				<i class="fa fa-trash-o action-button delete-button" data-id="<?php echo $row['id']; ?>" aria-hidden="true"></i>
			</td>
		</tr>


<?php
	
	 }

}else {
	echo "<tr><td colspan='4'><center><h2>No records found</h2></center></td></tr>";
}
?>