<?php
session_start();
if ($_SESSION['admin_logged_in']) {
	header("Location: index.php");
}
if ($_SERVER['HTTP_HOST'] == "localhost") {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="refresh" content="">
	<title>ParkplaceSolution - Admin panel</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

		:root {

			--sidebarwidth: 250px;

			font-size: 10px;
			width: 100px;
		}

		* {
			border: 0;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			outline: none;
		}

		body {
			height: 100%;
			width: 100%;
		}

		.unselectable {
			-webkit-user-select: none;
			/* Safari */
			-ms-user-select: none;
			/* IE 10 and IE 11 */
			user-select: none;
			/* Standard syntax */
		}

		.sidebar {
			width: var(--sidebarwidth);
			height: 100%;
			background-color: #027580;
			color: white;
			font-weight: 400;
			transition: 0.5s all ease-in-out;
			font-size: 1.6rem;
			position: fixed;
			top: 0;
			left: 0;
			z-index: 2;
			overflow: hidden;
		}

		.sidebar a {
			text-decoration: none;
			color: #fff;
		}

		.navbar-brand {
			font-size: 1.8rem;
			font-weight: 700;
		}

		.sidebar-content {
			padding: 1rem 1rem;
		}

		.side-item {
			min-width: 250px;
			cursor: pointer;
			padding: 1.5rem 1rem;
			font-size: 1.7rem;
		}

		.sidebar .side-item:hover {
			font-weight: 600;
			background-color: rgba(0, 0, 0, .2);
		}

		.active {
			font-weight: 600;
			background-color: rgba(0, 0, 0, .2);
		}

		.notification-count {
			height: 25px;
			min-width: 25px;
			max-width: 40px;
			border-radius: 30px;
			margin-left: 2rem;
			margin-top: 4px;
			padding: 0 5px;
			background-color: red;
			font-weight: 400;
			font-size: 1.5rem;
			text-align: center;
		}

		.main-content {
			height: 100%;
			width: calc(100% - var(--sidebarwidth));
			position: fixed;
			top: 0;
			right: 0;
			background-color: #f1f5f9;
			transition: 0.5s all ease-in-out;
		}

		.main {
			width: 100%;
			height: 100%;
			position: absolute;
			overflow: auto;
		}

		.main .sidebar-toggle {
			position: sticky;
			left: 20px;
			top: -18px;
			cursor: pointer;
		}

		.sidebar-toggle i {
			padding: 5px;
			border-radius: 5px;
			margin-top: 34px;
			margin-right: 14px;
		}

		.sidebar-toggle i:hover {
			border: 3px solid #9f9f9f;
		}

		.main .container {
			height: auto;
			width: 100%;
			margin-top: 40px;
			border-radius: 15px;
		}

		.main .home-card {
			width: 190px;
			margin: 20px 10px;
			display: flex;
			flex-direction: row;
			color: #1d2231;
			padding-left: 15px;
			border-radius: 15px;
			box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.3);
		}

		.main .home-card-content {
			height: 99px;
			width: 165px;
			background-color: #fff;
			border-bottom-right-radius: 15px;
			border-top-right-radius: 15px;
		}

		.row-1 .card-header {
			font-size: 1.6rem;
			font-weight: bold;
			color: #908484;
		}

		.sidebar-toggle i {
			font-size: 2.3rem;
			color: #9f9f9f;
		}

		.card-text:last-child {
			margin-top: 13px;
			margin-left: 20px;
			font-size: 2.0rem;
			color: rgb(0, 134, 120);
			font-weight: 600;
		}

		.row:last-child {
			margin-top: 50px;
			margin-bottom: 30px;
			box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.3);
			border-radius: 15px;
		}

		.row-2 .card-header {
			padding-left: 25px;
			padding-top: 13px;
			padding-bottom: 13px;
			font-size: 1.6rem;
			font-weight: bold;
			color: #908484;
		}

		.row-2 table {
			width: 100%;
			font-size: 1.5rem;
		}

		.row-2 th,
		td {
			padding: 15px;
		}

		.row-2 th {
			background-color: #f1eaea;
			color: #454242;
		}

		.row-2 td {
			color: #908484;
			font-weight: 600;
		}

		td i {
			margin-left: 5px;
			margin-right: 5px;
		}

		.row-2 tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.row-2 thead {
			position: sticky;
			top: -13px;
		}

		.row-2 .card-body {
			height: max-content;
			max-height: 521px;
			overflow-y: auto;
			display: flex;
			flex-wrap: wrap;
		}

		.search {
			position: relative;
		}

		.products-filter {
			border-radius: 20px;
			padding-left: 35px;
			padding-right: 10px;
			height: 30px;
			width: 210px;
			font-size: 17px;
		}

		.products-filter:focus {
			border: 2px solid #027580;
		}

		.search i {
			position: absolute;
			font-size: 19px !important;
			color: #027580;
			left: 8px;
			top: 7px;
		}



		.action-button {
			cursor: pointer;
			font-size: 18px;
		}


		.form-group {
			font-size: 15px;
		}

		.save_new_product {
			height: 30px;
			width: 70px;
			background-color: #027580;
			color: white;
			border-radius: 15px;
			font-size: 16px;
			font-weight: 600;
			border: 2px solid #027580;
			cursor: pointer;
		}

		.product_image_preview {
			width: 100%;
			height: 100%;
		}

		.carousel-indicators li {
			width: 10px;
			height: 10px;
			border-radius: 100%;
		}

		/* The switch - the box around the slider */
		.switch {
			position: relative;
			display: inline-block;
			width: 60px;
			height: 34px;
		}

		/* Hide default HTML checkbox */
		.switch input {
			opacity: 0;
			width: 0;
			height: 0;
		}

		/* The slider */
		.slider {
			position: absolute;
			cursor: pointer;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #ccc;
			-webkit-transition: .4s;
			transition: .4s;
		}

		.slider:before {
			position: absolute;
			content: "";
			height: 26px;
			width: 26px;
			left: 4px;
			bottom: 4px;
			background-color: white;
			-webkit-transition: .4s;
			transition: .4s;
		}

		input:checked+.slider {
			background-color: #2196F3;
		}

		input:focus+.slider {
			box-shadow: 0 0 1px #2196F3;
		}

		input:checked+.slider:before {
			-webkit-transform: translateX(26px);
			-ms-transform: translateX(26px);
			transform: translateX(26px);
		}

		/* Rounded sliders */
		.slider.round {
			border-radius: 34px;
		}

		.slider.round:before {
			border-radius: 50%;
		}


		@media screen and (max-width: 650px) {

			.main-content {
				overflow-y: auto;
				overflow-x: auto;
			}
		}

		@media screen and (max-width: 600px) {

			.main-content {
				overflow-y: auto;
				overflow-x: auto;

			}
		}

		@media screen and (max-width: 441px) {

			.main .home-card {
				margin: 30px 17%;
			}
		}
	</style>
</head>

<body>

	<?php include 'admin-sidebar.php'; ?>

	<div class="main-content">
		<div class="main">
			<div class="sidebar-toggle unselectable">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</div>
			<div class="container">
				<div class="row-2 row" style="max-height: fit-content; height: auto;">
					<div class="card w-100">
						<div class="card-header">Add New Product</div>
						<div class="card-body">
							<div class="col col-4 d-flex justify-content-center" style="max-height: 350px;">
								<div class="card" style="width: 38rem;">
									<div class="card-body image-preview-card-body" style="overflow-y:hidden;">

									</div>
									<div class="card-footer bg-transparent border-success">
										<p class="card-text text-center ml-0 mt-0">Product Image Preview</p>
									</div>
								</div>
							</div>
							<div class="col">

								<form action="./api/upload/product_image.php" method="POST" enctype="multipart/form-data" id="add_product_form">
									<div class="form-group">
										<input class="product_input" id="upload" type='file' name="image[]" size=30 multiple>
									</div>
									<div class="form-group">
										<input type="hidden" class="form-control form-control-lg product_input" name="id" id="product_id" placeholder="Product id">
									</div>
									<div class="form-group">
										<label for="product_name">Name</label>
										<input type="text" class="form-control form-control-lg product_input" name="name" id="product_name" placeholder="Product name">
									</div>
									<div class="form-group">
										<label for="product_desc">Describtion</label>
										<textarea class="form-control form-control-lg product_input" name="desc" id="product_desc" rows="3"></textarea>
									</div>
									<div class="form-group">
										<label for="product_price">price</label>
										<input type="text" class="form-control form-control-lg product_input" name="price" id="product_price" placeholder="Product price">
									</div>
									<br><br>
									<div class="form-group text-center">
										<input type="submit" class="save_new_product" value="Save" />
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="row-2 row">
					<div class="col">
						<div class="products">
							<div class="card">
								<div class="card-header unselectable">Products
									<span class="search float-right">
										<input class="products-filter" type="text" placeholder="search for a product">

										<i class="fa fa-search" aria-hidden="true"></i>
										<i class="fa fa-search" aria-hidden="true"></i>
									</span>
								</div>
								<div class="card-body product-controller">
									<table>
										<thead>
											<tr class="text-center">
												<th>Id</th>
												<th>Name</th>
												<th>Describtion</th>
												<th>price</th>
												<th>Image View</th>
												<th>Special Product</th>
												<th colspan="2">Action</th>
											</tr>
										</thead>
										<tbody class="new-product"></tbody>
										<tbody class="products_list"></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/95b99d7a50.js" crossorigin="anonymous"></script>

	<script type="text/javascript">
		var x = 1;

		$(document).ready(function() {

			$(".image-preview-card-body").html('<img class="d-block w-100 h-100" src="../image/default-image.jpg" alt="Third slide">');

			// Image Preview During New Product Add
			$('#upload').change(function(e) {

				$(".image-preview-card-body").html('<div id="productimagepreview" class="carousel slide" data-ride="carousel"> <ol class = "carousel-indicators image-preview-indicators" > </ol> <div class = "carousel-inner image-preview-items" > </div> <a class = "carousel-control-prev" href = "#productimagepreview" role = "button" data-slide = "prev" ><span class = "carousel-control-prev-icon" aria-hidden = "true" > </span> <span class = "sr-only" > Previous </span> </a> <a class = "carousel-control-next" href = "#productimagepreview" role = "button"data-slide = "next" ><span class = "carousel-control-next-icon" aria-hidden = "true" > </span> <span class = "sr-only" > Next </span> </a> </div>');

				var images = $("#upload")[0].files;

				for (var i = 0; i < images.length; i++) {

					let pre_html = $(".image-preview-items").html();
					let pre_html_indicators = $(".image-preview-indicators").html();
					if (i == 0) {
						$(".image-preview-indicators").html(pre_html_indicators + '<li data-target = "#productimagepreview " data-slide-to = "' + i + '" class = " active " > </li>');
						$(".image-preview-items").html(pre_html + '<div class="carousel-item active"> <img class = "d-block w-100 h-100" src = ' + '"' + URL.createObjectURL(images[i]) + '"' + ' alt = "First slide" ></div>');
					} else {
						$(".image-preview-indicators").html(pre_html_indicators + '<li data-target = "#productimagepreview " data-slide-to = "' + i + '"  > </li>');
						$(".image-preview-items").html(pre_html + '<div class="carousel-item"> <img class = "d-block w-100 h-100" src = ' + '"' + URL.createObjectURL(images[i]) + '"' + ' alt = "First slide" ></div>');
					}

				}

			})

			// Reset image preview and input fields
			function resetForm() {
				$(".image-preview-card-body").html('<img class="d-block w-100 h-100" src="../image/default-image.jpg" alt="Third slide">');
				$(".product_input").val("");
			}

			var update_product = false;

			// Handle New Product Add Form
			$('#add_product_form').on("submit", function(e) {
				e.preventDefault();

				if (!update_product) {
					$.ajax({
						url: 'api/product/add_product.php',
						type: 'POST',
						data: new FormData(this),
						contentType: false,
						processData: false,

						success: function(data) {
							console.log(data);
							alert(data);
							productload();
							resetForm();
						}
					});
				} else {

					$.ajax({
						url: 'api/product/edit_product.php',
						type: 'POST',
						data: new FormData(this),
						contentType: false,
						processData: false,

						success: function(data) {
							console.log(data);
							alert(data);
							productload();
							resetForm();
						}
					});
				}


			})


			//toggle sidebar
			$('.sidebar-toggle').on('click', function() {
				if (x % 2 != 0) {
					$(':root').css('--sidebarwidth', '0px');
				} else {
					$(':root').css('--sidebarwidth', '250px');
				}

				x++;

			})


			// Load products
			productload();

			function productload() {
				$.ajax({
					url: './api/product/products_load.php',
					type: 'get',
					success: function(data) {
						$('.products_list').html(data);
						// console.log(data);
					}
				});

			}


			// live search
			$(".products-filter").keyup(function(event) {
				let x = $(".products-filter").val();

				$.ajax({
					url: './api/product/products_live_search.php',
					type: 'POST',
					data: {
						search: x
					},

					success: function(data) {
						$('.products_list').html(data);
					}
				})

			});

			// delete product
			$(document).on('click', '.product-delete', function(event) {

				let id = $(this).data('id');

				$.ajax({
					url: './api/product/delete_product.php',
					type: 'POST',
					data: {
						id: id
					},

					success: function(data) {

						$(this).closest("div").fadeOut().delay(3000);

						productload();
						alert(data);
					}
				})
			});



			// Update Product Details
			$(document).on('click', '.product-edit', function(event) {
				update_product = true;

				let id = $(this).data('id');

				$.ajax({
					url: './api/product/get_single_product_info.php',
					type: 'POST',
					data: {
						id: id
					},

					success: function(response) {
						response = JSON.parse(response);

						$("#product_id").val(response.id);
						$("#product_name").val(response.name);
						$("#product_desc").val(response.describtion);
						$("#product_price").val(response.price);

						// $(".image-preview-card-body").html('<div id="productimagepreview" class="carousel slide" data-ride="carousel"> <ol class = "carousel-indicators image-preview-indicators" > </ol> <div class = "carousel-inner image-preview-items" > </div> <a class = "carousel-control-prev" href = "#productimagepreview" role = "button" data-slide = "prev" ><span class = "carousel-control-prev-icon" aria-hidden = "true" > </span> <span class = "sr-only" > Previous </span> </a> <a class = "carousel-control-next" href = "#productimagepreview" role = "button"data-slide = "next" ><span class = "carousel-control-next-icon" aria-hidden = "true" > </span> <span class = "sr-only" > Next </span> </a> </div>');


						// for (let i = 0; i < response.image.length; i++) {

						// 	let pre_html = $(".image-preview-items").html();
						// 	let pre_html_indicators = $(".image-preview-indicators").html();
						// 	if (i == 0) {
						// 		$(".image-preview-indicators").html(pre_html_indicators + '<li data-target = "#productimagepreview " data-slide-to = "' + i + '" class = " active " > </li>');
						// 		$(".image-preview-items").html(pre_html + '<div class="carousel-item active"> <img class = "d-block w-100 h-100" src = ' + '"' + URL.createObjectURL(response.image[i]) + '"' + ' alt = "First slide" ></div>');
						// 	} else {
						// 		$(".image-preview-indicators").html(pre_html_indicators + '<li data-target = "#productimagepreview " data-slide-to = "' + i + '"  > </li>');
						// 		$(".image-preview-items").html(pre_html + '<div class="carousel-item"> <img class = "d-block w-100 h-100" src = ' + '"' + URL.createObjectURL(response.image[i]) + '"' + ' alt = "First slide" ></div>');
						// 	}

						// }
					}
				})
			});

			$(document).on('change', '.switch', function(event) {
				console.log(event);
				if (document.getElementById('switch').checked) {
					var state = 1;
				} else {
					var state = 0;
				}

				let id = $(event.target).data('id');

				$.ajax({
					url: './api/product/special_product_state.php',
					type: 'POST',
					data: {
						id: id,
						state: state
					},

					success: function(response) {
						alert(response);
					}
				})

			})


			// notification count
			notification_count();

		});
	</script>

</body>

</html>