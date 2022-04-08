<?php


if ($_SERVER['HTTP_HOST'] == "localhost") {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$search = mysqli_real_escape_string($conn, $_POST['search']);

$filtered_products = mysqli_query($conn, "SELECT * FROM `products` WHERE `id` LIKE '%$search%' OR `name` LIKE '%$search%' OR `describtion` LIKE '%$search%' OR `price` LIKE '%$search%';");

if (mysqli_num_rows($filtered_products) > 0) {
	while ($row = mysqli_fetch_assoc($filtered_products)) {
		$product_id = $row["id"];
		$product_images = mysqli_query($conn, "SELECT * FROM product_image WHERE product_id = $product_id") ?>

		<tr class="text-center">
			<td><?php echo $row["id"]; ?></td>
			<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["describtion"]; ?></td>
			<td><?php echo $row["price"]; ?></td>
			<td style="width: 300px;">

				<div id="<?php echo "product" . $product_id; ?>" class="carousel slide" data-ride="carousel" data-interval="false">
					<ol class="carousel-indicators">
						<?php for ($i = 0; $i < mysqli_num_rows($product_images); $i++) {
							if ($i == 0) { ?>

								<li data-target="#<?php echo "product" . $product_id; ?>" data-slide-to='<?php echo $i ?>' class=" active "></li>

							<?php } else { ?>

								<li data-target="#<?php echo "product" . $product_id; ?>" data-slide-to='<?php echo $i ?>'></li>

						<?php }
						} ?>
					</ol>
					<div class="carousel-inner">

						<?php $flag = false;
						while ($single_row = mysqli_fetch_assoc($product_images)) {
							if (!$flag) { ?>

								<div class="carousel-item active">
									<img class="d-block w-100 product_images" src="../uploads/<?php echo $single_row['image']; ?>" alt="<?php echo $row['name']; ?>">
								</div>

							<?php $flag = true;
							} else { ?>

								<div class="carousel-item">
									<img class="d-block w-100 product_images" src="../uploads/<?php echo $single_row['image']; ?>" alt="<?php echo $row['name']; ?>">
								</div>

						<?php }
						} ?>

					</div>
					<a class="carousel-control-prev" href="#<?php echo "product" . $product_id; ?>" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#<?php echo "product" . $product_id; ?>" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</td>
			<td>

				<i class="fa fa-edit action-button product-edit" data-id="<?php echo $row['id']; ?>" aria-hidden="true"></i>
				<i class="fa fa-trash-o action-button product-delete" data-id="<?php echo $row['id']; ?>" aria-hidden="true"></i>
			</td>
		</tr>

<?php
	}
} else {
	echo "<tr><td colspan='11'><center><h2>No records found</h2></center></td></tr>";
}
?>