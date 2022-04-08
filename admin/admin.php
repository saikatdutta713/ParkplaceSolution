<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
	header("Location: index.php");
}
print_r($_SESSION);
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
		}

		.main .sidebar-toggle {
			position: absolute;
			left: 20px;
			top: -18px;
			cursor: pointer;
		}

		.sidebar-toggle i {
			padding: 5px;
			border-radius: 5px;
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

		.main i {
			font-size: 2.3rem;
			color: #9f9f9f;
			margin-top: 34px;
			margin-right: 14px;
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

		.row-2 tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		.row-2 thead {
			position: sticky;
			top: -13px;
		}

		.row-2 .card-body {
			height: 450px;
			overflow-y: auto;
		}

		.confirm-button {
			cursor: pointer;
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

	<?php include 'admin-sidebar.php';

	$current_bookings = mysqli_query($conn, 'select * from booking_request');

	$total_users = mysqli_num_rows(mysqli_query($conn, 'select `id` from users'));

	$total_staff = mysqli_num_rows(mysqli_query($conn, 'select `p_id` from p_details'));

	?>

	<div class="main-content">
		<div class="main">
			<div class="sidebar-toggle unselectable">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</div>
			<div class="container">
				<div class="row row-1 unselectable">
					<div class="col">
						<div class="total-booking home-card">
							<i class="fa fa-briefcase" aria-hidden="true"></i>
							<div class="home-card-content card">
								<h5 class="card-header">Total Booking</h5>
								<span class="card-text"><?php echo mysqli_num_rows($current_bookings); ?></span>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="total-user home-card">
							<i class="fa fa-user" aria-hidden="true"></i>
							<div class="home-card-content card">
								<h5 class="card-header">Total Users</h5>
								<span class="card-text"><?php echo $total_users ?></span>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="total-staff home-card">
							<i class="fa fa-users" aria-hidden="true"></i>
							<div class="home-card-content card">
								<h5 class="card-header">Total staff</h5>
								<span class="card-text"><?php echo $total_staff ?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="row-2 row">
					<div class="col">
						<div class="booking">
							<div class="card">
								<div class="card-header unselectable">Recent Booking</div>
								<div class="card-body">
									<table>
										<thead>
											<tr class="text-center">
												<th>booking Id</th>
												<th>Service</th>
												<th>Customer Name</th>
												<th>Email</th>
												<th>Phone</th>
												<th>building</th>
												<th>area</th>
												<th>landmark</th>
												<th>pincode</th>
												<th>city</th>
												<th>time slot</th>
												<th>Booking Date</th>
												<th colspan="3">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if (mysqli_num_rows($current_bookings) > 0) {
												while ($current_bookings_row = mysqli_fetch_assoc($current_bookings)) {
											?>
													<tr class="text-center">
														<td><?php echo $current_bookings_row["booking_id"]; ?></td>
														<td><?php echo $current_bookings_row["service"]; ?></td>
														<td><?php echo $current_bookings_row["full_name"]; ?></td>
														<td><?php echo $current_bookings_row["email"]; ?></td>
														<td><?php echo $current_bookings_row["phone"]; ?></td>
														<td><?php echo $current_bookings_row["building"]; ?></td>
														<td><?php echo $current_bookings_row["area"]; ?></td>
														<td><?php echo $current_bookings_row["landmark"]; ?></td>
														<td><?php echo $current_bookings_row["pincode"]; ?></td>
														<td><?php echo $current_bookings_row["city"]; ?></td>
														<td><?php echo $current_bookings_row["time_slot"]; ?></td>
														<td><?php echo $current_bookings_row["booking_date"]; ?></td>
														<td>
															<i class="fa fa-check-square-o action-button confirm-button" data-id="<?php echo $current_bookings_row['booking_id']; ?>" aria-hidden="true"></i>
														</td>
														<td>
															<i class="fa fa-times action-button reject-button" data-id="<?php echo $current_bookings_row['booking_id']; ?>" aria-hidden="true"></i>
														</td>
													</tr>
											<?php
												}
											} else {
												echo "<tr><td colspan='13'><center><h2>No records found</h2></center></td></tr>";
											}
											?>

										</tbody>
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
			$('.sidebar-toggle').on('click', function() {
				if (x % 2 != 0) {
					console.log('if');
					$(':root').css('--sidebarwidth', '0px');
				} else {
					console.log('else');
					$(':root').css('--sidebarwidth', '250px');
				}

				x++;

			})

			// Notification count
			notification_count();
		});

		// Accept booking request
		$(document).on('click', '.accept-button', function(event) {

			let val = $(this).data('id');
			let element = this;

			$.ajax({
				url: 'requested-booking-ajax-accept.php',
				type: 'POST',
				data: {
					id: val
				},

				success: function(data) {

					alert(data)

					if (data == 1) {
						$(element).closest("tr").fadeOut();
						booking_request_load();
						accepted_booking_load();
					} else {
						alert("Request not accepted!");
					}
				}
			})

		});

		// Reject booking request
		$(document).on('click', '.reject-button', function(event) {

			let val = $(this).data('id');
			let element = this;

			$.ajax({
				url: 'requested-booking-ajax-reject.php',
				type: 'POST',
				data: {
					id: val
				},

				success: function(data) {

					if (data == 1) {
						$(element).closest("tr").fadeOut();
					} else {
						alert("Failed! try again");
					}
				}
			})

		});
	</script>

</body>

</html>