<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

?>

<div class="sidebar d-flex flex-column unselectable">
	<div class="sidebar-header unselectable">
		<div class="navbar-brand p-3">
			<img src="../image/logo.png" height="35px" width="35px" style="border-radius: 15px">
			<span class="p-1">Parkplace Solution</span>
		</div>
	</div>
	<div class="sidebar-content">
		<a href="./admin.php">
			<div class="side-item unselectable">
				<i class="fa fa-home p-2" aria-hidden="true"></i>
				Home
			</div>
		</a>
		<a href="./bookings.php">
			<div class="side-item unselectable">
				<i class="fa fa-briefcase p-2" aria-hidden="true"></i>
				Bookings
			</div>
		</a>
		<a href="./staff.php">
			<div class="side-item unselectable">
				<i class="fa fa-users p-2" aria-hidden="true"></i>
				Staff
			</div>
		</a>
		<a href="./requested-staff.php">
			<div class="side-item unselectable">
				<i class="fa fa-users p-2" aria-hidden="true"></i>
				Requested Staff
			</div>
		</a>
		<a href="./users.php">
			<div class="side-item unselectable">
				<i class="fa fa-user p-2" aria-hidden="true"></i>
				Users
			</div>
		</a>
		<a href="./services.php">
			<div class="side-item unselectable">
				<i class="fa fa-wrench p-2" aria-hidden="true"></i>
				Services
			</div>
		</a>
		<a href="./message.php">
			<div class="side-item unselectable">
				<i class="fa fa-envelope p-2" aria-hidden="true"></i>
				Messages
			</div>
		</a>
		<a href="./account.php">
			<div class="side-item unselectable">
				<i class="fa fa-gear p-2" aria-hidden="true"></i>
				Account
			</div>
		</a>
		<a href="./products.php">
			<div class="side-item unselectable">
				<i class="fa fa-shopping-cart" aria-hidden="true" style="margin-left: 3px;margin-right: 5px;"></i>
				Products
			</div>
		</a>
		<a href="./controls.php">
			<div class="side-item unselectable">
				<i class="fa fa-gears p-2" aria-hidden="true"></i>
				Controls
			</div>
		</a>
		<a href="./notification.php">
			<div class="side-item unselectable d-flex">
				<i class="fa fa-bell p-2" aria-hidden="true"></i>
				Notifications
				<span class="notification-count justify-content-end"></span>
			</div>
		</a>
		<a href="./logout.php">
			<div class="side-item unselectable">
				<i class="fa fa-sign-out p-2" aria-hidden="true"></i>
				Log Out
			</div>
		</a>
	</div>
</div>

<script type="text/javascript" charset="utf-8">
	function notification_count() {

		$.ajax({
				url: 'api/notification/notification-count-ajax.php',
				type: 'POST',

				success: function(data) {
					$('.notification-count').html(data);
				}
			})
			.done(function() {
				notification_count();
			})
	}
</script>