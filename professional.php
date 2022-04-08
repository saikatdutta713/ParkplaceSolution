<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="refresh" content="">
	<title>ParkplaceSolution - Admin panel</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

	<style type="text/css">

		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

		:root {

			--sidebarwidth :0px;

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

		.unselectable  {
            -webkit-user-select: none; /* Safari */
            -ms-user-select: none; /* IE 10 and IE 11 */
            user-select: none; /* Standard syntax */
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

		

		.main .container {
			height: 100%;
			width: 100%;
			margin-top: 40px;
            border-radius: 15px;
		}

		.main .home-card {
			width: 190px;
			height: 300px;
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
			width: 100px;
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
    		color: #8c762e;
		}

		.row-2 table {
  		  width: 100%;
  		  font-size: 1.5rem;
		}

		.row-2 th,td {
			padding: 15px;
		}

		.row-2 th {
			background-color: #8c762e;
			color: #454242;
		}

		.row-2 td {
			color: #908484;
			font-weight: 600;
		}

		.row-2 tr:nth-child(even) {background-color: #f2f2f2;}

		.row-2 thead {
			position: sticky;
			top: -13px;
		}

		.row-2 .card-body {
			height: 500px;
			overflow-y: auto;
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
        
        input[type=text], select
         {
  		width: 50%;
 		 padding: 12px 20px;
 		 margin: 8px 0;
 		 display: inline-block;
  		border: 1px solid #ccc;
 		 border-radius: 4px;
  		box-sizing: border-box;
		}
input[type=submit] {
  width: 30%;
  background-color:#ff7300;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

 
	</style>
</head>
<body>
	
	

	<div class="main-content">
		<div class="main">
			
			<div class="container">
				
				<div class="row-2 row">
					<div class="col">
						<div class="booking">
							<div class="card">
								<div class="card-header unselectable"><center>PROFESSIONAL REGISTRATION FORM</center></div>
								<div class="card-body">
										<form method="post" action="pform.php">
											Name:
											<input type="text" name="name" placeholder="Name" >
											
											<br><br>
											Email:<input type="text" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>
											Phone No:<input type="text" name="ph_no" placeholder="Phone Number" ><br><br>
											Address:<input type="text" name="address" placeholder="Address"><br><br>
											Profession:<input type="text" name="profession" placeholder="Profession"><br><br>
											Qualification:<input type="text" name="qualification" placeholder="Qualification"><br><br>
											Gender:
       									    <input type="radio" name="gender" id="male" value="male" >Male
       									    <input type="radio" name="gender" id="female" value="female">Female<br><br>
        									Password:<input type="text" name="password" 
      									    title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
      									    <center><input type="submit" value="Submit"></center></form>
								</div>
							</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>




	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script type="text/javascript">

		var x = 1;

		$(document).ready(function() {
			$('.sidebar-toggle').on('click', function(){
				if (x%2!=0) {
					console.log('if');
					$(':root').css('--sidebarwidth', '0px');
				}else {
					console.log('else');
					$(':root').css('--sidebarwidth', '250px');
				}

				x++;

			})
		});

	</script>

</body>
</html>