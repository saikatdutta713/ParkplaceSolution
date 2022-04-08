<?php
session_start();
if($_SESSION['admin_logged_in']){
  header("Location: index.php");
}
if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
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

			--sidebarwidth :250px;

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

		.unselectable  {
            -webkit-user-select: none; /* Safari */
            -ms-user-select: none; /* IE 10 and IE 11 */
            user-select: none; /* Standard syntax */
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
			min-width:250px;
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

		.row-2 th,td {
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

		.row-2 tr:nth-child(even) { background-color: #f2f2f2; }

		.row-2 thead {
			position: sticky;
			top: -13px;
		}

		.row-2 .card-body {
			height: 521px;
			overflow-y: auto;
		}

		.search { position: relative; }

		.service-table-filter{
			border-radius: 20px;
			padding-left: 35px;
			padding-right: 10px;
			height: 30px;
			width: 210px;
			font-size: 17px;
		}

		.service-table-filter:focus {
			border: 2px solid #027580;
		}

		.search i {
			position: absolute;
			font-size: 19px !important;
			color: #027580;
			left: 8px;
			top: 7px;
		}

		.add-button {
			position: relative;
		}

		.add-button input {
			border-radius: 20px;
			padding-left: 35px;
			padding-right: 10px;
			margin-right: 15px;
			height: 30px;
			width: 150px;
			font-size: 17px;
			cursor: pointer;
			background-color: #fff;
			color: #908484;
		}

		.add-button input:focus {
			border: 2px solid #027580;
		}

		.add-button i {
			position: absolute;
			font-size: 16px !important;
			color: #027580;
			left: 20px;
			top: 8px;
		}

		.new-service {
			background-color: rgba(0,0,0,.03);
		}

		.new-service input {
			border: 2px solid #027580;
			width: 130px;
			height: 28px;
			padding-left: 10px;
			padding-right: 10px;
			border-radius: 15px;
		}

		.service-button {
			width: 80px;
			color: white;
			background-color: #027580;
			border-radius: 15px;
			cursor: pointer;
		}

		.action-button {
			cursor: pointer;
			font-size: 18px;
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
				<div class="row-2 row">
					<div class="col">
						<div class="booking">
							<div class="card">
								<div class="card-header unselectable">Services
									<span class="search float-right">
										<input class="service-table-filter"
										id="service-search-name" type="text" name="service-search-name" placeholder="search for any field">

										<i class="fa fa-search" aria-hidden="true"></i>
									</span>
									<span class="add-button float-right">
										<i class="fa fa-plus" aria-hidden="true"></i>
										<input type="button" value="Add Service">
									</span>
								</div>
								<div class="card-body">
									<table>
										<thead>
											<tr class="text-center">
												<th>Service Id</th>
												<th>Service Name</th>
												<th>Service Type</th>
												<th>Offer</th>
												<th colspan="2">Action</th>
											</tr>
										</thead>
										<tbody class="new-service"></tbody>
										<tbody id="table-data"></tbody>
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
		

		$(document).ready(function(){
			$('.service-type').select2();
		})

		$(document).ready(function() {

  			

			// $('.service-type')
			// .select2()
			// .on('select2:select', function(e) {
			// 	console.log(e.params.data.element.innerText);
			// });
			// console.log('ok');

			//toggle sidebar
			$('.sidebar-toggle').on('click', function(){
				if (x%2!=0) {
					$(':root').css('--sidebarwidth', '0px');
				}else {
					$(':root').css('--sidebarwidth', '250px');
				}

				x++;

			})


			// Load services
			function serviceload() {
				$.ajax({
					url : 'api/services/services-ajax-load.php',
					type: 'post',
					success: function(data) {
						$('#table-data').html(data);
					}
				});
			}
			serviceload();


			// live search
			$(".service-table-filter").keyup(function(event) {
				let x = $(".service-table-filter").val();

				$.ajax({
					url: 'api/services/services-ajax-live-search.php',
					type: 'POST',
					data: {search: x},

					success: function(data) {
						$('#table-data').html(data);
					}
				})
				
				
			});

			// delete service
			$(document).on('click', '.delete-button', function(event) {

				let x = $(this).data('id');
				let element = this;

				$.ajax({
					url: 'api/services/services-ajax-delete.php',
					type: 'POST',
					data: {id: x},

					success: function(data){

						if (data == 1) {
							$(element).closest("tr").fadeOut().delay(3000);
							serviceload();
						}
						else {
							alert("Request not accepted!");
						}
					}
				})
				
			});

			// Add new service
			$('.add-button').click(function(event) {

				<?php 

				$result = mysqli_query($conn, "SELECT MAX(s_id) AS s_id FROM service ");

				$row = mysqli_fetch_assoc($result);

				$s_id_val = $row["s_id"] + 1;

				$services = mysqli_query($conn, 'SELECT `service_type` FROM `service_catagory`;');

				?>

				$('.new-service').html('<tr class="text-center new-service-form"><td><input type="text" class="service-id text-center" value="<?php echo $s_id_val; ?>" placeholder="Enter Here"></td><td><input type="text" class="service" style="width: 160px" value="" placeholder="Enter Service Name"></td></td><td><select class="service-type" name="state" style="border: solid #027580 2px;padding: 3px 7px 3px 10px;border-radius: 15px" ><option>Select Service Type</option><?php while($row = mysqli_fetch_assoc($services)){?><option value="<?php echo $row['service_type']; ?>"> <?php echo $row['service_type']; ?> </option> <?php } ?></select></td><td><input type="text" class="offer" value="" placeholder="Enter Offer"></td><td><button type="submit" class="service-button">Save</button></td></tr>');
				
				
			});

			// Handle new service form with ajax
			$(document).on('click','.service-button', function(event) {
					
				let service_id = $('.service-id').val();
				let service_name = $('.service').val();
				let type = $('.service-type').val();
				let offer = $('.offer').val();

				$.ajax({
					url: 'api/services/service-ajax-insert.php',
					type: 'POST',
					data: {s_id: service_id, service_name: service_name, type: type, offer: offer },

					success: function(data){

						if (data == 1) {
							$('.new-service').html("");
							serviceload();
						}
						else {
							alert('Insertion failed! try again');
						}
					}
				})
			});

			// notification count
			notification_count();
			
		});

	</script>

</body>
</html>
