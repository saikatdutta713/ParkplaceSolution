<?php
if ($_SERVER['HTTP_HOST'] == "localhost") {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>login</title>
	<meta http-equiv="refresh" content="">
	<meta name="google-signin-scope" content="profile email">
	<meta name="google-signin-client_id" content="461567781839-vnadmj3485ucdfvu7f2oqun75ch76hka.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
		}

		.unselectable {
			-webkit-user-select: none;
			/* Safari */
			-ms-user-select: none;
			/* IE 10 and IE 11 */
			user-select: none;
			/* Standard syntax */
		}

		.main-login {
			height: 100%;
			width: 100%;
			background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url(image/login.png);
			background-position: center;
			background-size: cover;
			position: absolute;
		}

		.content-box {
			width: 380px;
			height: 480px;
			position: relative;
			margin: 6% auto;
			background: #fff;
			padding: 5px;
			overflow: hidden;
		}

		.button-box {
			width: 220px;
			margin: 35px auto;
			position: relative;
			box-shadow: 0 0 20px 3px #169daa1f;
			border-radius: 30px;
		}

		.toggle-btn {
			padding: 10px 30px;
			cursor: pointer;
			background: transparent;
			border: 0;
			outline: none;
			position: relative;
		}

		#btn {
			top: 0;
			left: 0;
			position: absolute;
			width: 110px;
			height: 100%;
			background: linear-gradient(to right, #ff4000, #ff5921);
			border-radius: 30px;
			transition: 0.5s;
		}

		.social-icons {
			margin: 30px;
			text-align: center;
			display: flex;
			flex-direction: row;
			justify-content: center;
		}

		.social-icons img {
			width: 40px;
			margin: 0 12px;
			box-shadow: 0 0 20px 0 #7f7f7f3d;
			cursor: pointer;
			border-radius: 50%;
		}

		.form-container .input-group {
			top: 180px;
			position: absolute;
			width: 280px;
			transition: 0.5s;
		}

		.form-container .input-field {
			width: 100%;
			padding: 10px 0;
			margin: 5px 0;
			border-top: 0;
			border-right: 0;
			border-left: 0;
			border-bottom: 1px solid #999;
			outline: none;
			background: transparent;
		}

		.form-container .submit-btn {
			width: 85%;
			padding: 10px 30px;
			cursor: pointer;
			display: block;
			margin: auto;
			background: linear-gradient(to right, #ff4000, #ff5921);
			border: 0;
			outline: none;
			border-radius: 30px;
			color: white;
		}

		.check-box {
			margin: 30px 10px 34px 0;
		}

		.forgot-pass {
			color: #ff105f;
			cursor: pointer;
			margin: 15px 0px 30px 160px;
		}

		.form-container span {
			color: #ff105f;
			font-size: 14px;
			bottom: 68px;
			position: absolute;
		}

		#login {
			left: 50px;
		}

		#register {
			left: 450px;
		}

		.otp-box {
			padding-top: 0;
			margin: 60px auto;
			transform: translateX(400px);
			transition: 0.6s;
			position: absolute;
		}

		.title {
			font-size: 25px;
			font-weight: 600;
			margin: 0 100px;
			color: #027580;
			border-bottom: 1.5px solid #ff105f;
		}

		.single-input {
			margin: 30px 12px;
			margin-top: 85px;
			position: relative;
			display: flex;
			flex-direction: row;
		}

		.single-input i {
			font-size: 20px;
			color: #9f9f9f;
			position: absolute;
			top: 12px;
			left: 5px;
		}

		.input-field {
			width: 100%;
			padding: 10px 40px;
			border-bottom: 1px solid #ff105f;
			outline: none;
			background: transparent;
		}

		.submit-button {
			margin: 30px;
			width: 80%;
			height: 30px;
			position: relative;
			border-radius: 30px;
			background: linear-gradient(to right, #ff4000, #ff5921);
			color: white;
			cursor: pointer;
		}

		.cng-pass-box {
			padding-top: 0;
			margin: 60px auto;
			transform: translateX(400px);
			transition: 0.6s;
		}
	</style>
</head>

<body>
	<div class="main-login">
		<div class="content-box">
			<div class="form-container">
				<div class="button-box unselectable">
					<div id="btn"></div>
					<button type="button" class="toggle-btn login-toggle-btn" style="color: white">Log In</button>
					<button type="button" class="toggle-btn register-toggle-btn">Register</button>
				</div>
				<!-- <div class="social-icons">
					<div id="google_signin"><img src="image/google.png" height="40px" width="70px"></div>
					<div id="facebook_signin"><img src="image/facebook.png" height="40px" width="70px"></div>
				</div> -->
				<form id="login" class="input-group">
					<input type="text" class="input-field" placeholder="User Id" required>
					<input type="text" class="input-field" placeholder="Enter Password" required>
					<p class="forgot-pass unselectable">Forgot Password?</p>
					<button type="submit" class="submit-btn">Log In</button>
				</form>
				<form id="register" class="input-group">
					<input type="text" class="input-field" placeholder="User Id" required>
					<input type="text" class="input-field" placeholder="Enter Password" required>
					<input type="text" class="input-field" placeholder="Confirm Password" required>
					<input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
					<button type="submit" class="submit-btn">Register</button>
				</form>
			</div>
			<!-- Otp Box -->
			<div class="otp-box">
				<span class="title">Otp Verification</span>
				<span class="single-input">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="text" class="input-field otp-input" name="otp-input" placeholder="Enter Otp">
				</span>
				<button type="submit" class="submit-button submit-button-otp">Save</button>
			</div>
			<!-- Change Password -->
			<div class="cng-pass-box">
				<span class="title">Change Password</span>
				<span class="single-input" style="margin-top: 40px;">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="text" class="input-field password-input" placeholder="Enter New Password">
				</span>
				<span class="single-input" style="margin-top: 40px;">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="text" class="input-field confirm-password-input" placeholder="Confirm New Password">
				</span>
				<button type="submit" class="submit-button submit-button-pass">Save</button>
			</div>
			<!-- Google signup -->
			<div class="g-signin2" data-onsuccess="onSignIn"></div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/95b99d7a50.js" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.button-box').on('click', '.register-toggle-btn', function() {
				$('#login').css('left', '-400px');
				$('#register').css('left', '50px');
				$('#btn').css('left', '110px');
				$('.register-toggle-btn').css({
					color: 'white',
					transition: '0.5s'
				});
				$('.login-toggle-btn').css({
					color: 'black',
					transition: '0.5s'
				});
			});

			$('.button-box').on('click', '.login-toggle-btn', function() {
				$('#login').css('left', '50px');
				$('#register').css('left', '450px');
				$('#btn').css('left', '0');
				$('.login-toggle-btn').css({
					color: 'white',
					transition: '0.5s'
				});
				$('.register-toggle-btn').css({
					color: 'black',
					transition: '0.5s'
				});
			});
		});

		function onSuccess(googleUser) {
			console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
			console.log('Logged in as: ' + googleUser.getBasicProfile().getEmail());
			console.log('Logged in as: ' + googleUser.getBasicProfile().getId());
		}

		function onFailure(error) {
			console.log(error);
		}

		function renderButton() {
			gapi.signin2.render('my-signin2', {
				'scope': 'profile email',
				'width': 50,
				'height': 50,
				'longtitle': true,
				'theme': 'dark',
				'onsuccess': onSuccess,
				'onfailure': onFailure
			});
		}

		// function onSignIn(googleUser) {
		// 	var profile = googleUser.getBasicProfile();
		// 	console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
		// 	console.log('Name: ' + profile.getName());
		// 	console.log('Image URL: ' + profile.getImageUrl());
		// 	console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
		// }
	</script>
</body>

</html>