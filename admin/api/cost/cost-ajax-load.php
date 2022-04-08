<?php

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$result = mysqli_query($conn,"SELECT `id`,`city`,`mobile_repair`,`laptop_repair`,`desktop_repair`,`windows_7`,`windows_8`,`windows_10` FROM `city` 
								where mobile_repair != 0 OR laptop_repair != 0 OR desktop_repair != 0 OR windows_7 != 0 
								OR windows_8 != 0 OR windows_10 != 0 ");

// print_r(mysqli_fetch_assoc($result));
if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){?>

		<tr class="text-center">
			<td><?php echo $row["city"]; ?></td>
			<td><?php echo $row["mobile_repair"]; ?></td>
			<td><?php echo $row["laptop_repair"]; ?></td>
			<td><?php echo $row["desktop_repair"]; ?></td>
			<td><?php echo $row["windows_7"]; ?></td>
			<td><?php echo $row["windows_8"]; ?></td>
			<td><?php echo $row["windows_10"]; ?></td>
			<td>
				<i class="fa fa-trash-o action-button cost-delete" data-id="<?php echo $row['id']; ?>" aria-hidden="true"></i>
			</td>
		</tr>

<?php
    }
}else {
	echo "<tr><td colspan='11'><center><h2>No records found</h2></center></td></tr>";
}
?>