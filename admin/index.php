<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
  header("Location: admin.php");
}

if ($_SERVER['HTTP_HOST'] == "localhost") {
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$sql = "SELECT `id`,`username`,`password` FROM `admin`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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


    .main-content {
      height: 100%;
      width: 100%;
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
      height: auto;
      width: 100%;
      margin-top: 40px;
      border-radius: 15px;
      display: flex;
      justify-content: center;
    }

    .row-1 {
      margin-top: 9%;
    }

    .main .home-card {
      width: 350px;
      height: 350px;
      margin: 30px 10px;
      display: flex;
      flex-direction: row;
      color: #1d2231;
      border-radius: 15px;
      box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.3);
      overflow: hidden;
    }

    .main .home-card-content {
      height: 100%;
      width: 100%;
      background-color: #fff;
      border-bottom-right-radius: 15px;
      border-top-right-radius: 15px;
      border-radius: 15px;
    }

    .row-1 .card-header {
      font-size: 1.6rem;
      font-weight: bold;
      color: #908484;
    }

    .single-input i {
      font-size: 2.3rem;
      color: #9f9f9f;
      position: absolute;
      top: 12px;
    }

    .input-group {
      width: 95%;
      font-size: 17px;
      position: absolute;
      transition: all 0.6s ease-in-out;
    }

    .otp-box {
      transform: translateX(100%);
      padding-top: 35px;
    }

    .single-input {
      margin: 30px 12px;
      position: relative;
    }

    .input-field {
      width: 100%;
      padding: 10px 40px;
      border-bottom: 1px solid #ff105f;
      outline: none;
      background: transparent;

    }

    .submit-button {
      margin: 35px auto;
      width: 80%;
      height: 30px;
      position: relative;
      border-radius: 30px;
      background: linear-gradient(to right, #027580, #169daa);
      color: white;
      cursor: pointer;
    }



    @media screen and (max-width: 992px) {

      .row-1 {
        margin-top: 5%;
      }
    }

    @media screen and (max-width: 600px) {

      .card-body {
        padding: 0;
      }

      .main .home-card-content {
        width: 100%;
      }

      .card-text {
        margin-left: 0;
      }
    }

    @media screen and (max-width: 441px) {

      .main-content {
        overflow-x: auto;
        overflow-y: auto;
      }

      .main .home-card {
        margin: 30px 2%;
      }
    }
  </style>
</head>

<body>

  <div class="main-content">
    <div class="main">
      <div class="container">
        <div class="row row-1 d-flex justify-content-center unselectable">
          <div class="col">
            <div class="total-booking home-card">
              <div class="home-card-content card">
                <div class="card-body">
                  <!-- Edited input form -->
                  <div class="input-group d-flex flex-column n-edit">
                    <span class="single-input d-flex flex-row">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                      <input type="text" class="input-field user-id" name="user-id" placeholder="Enter User Id">
                    </span>
                    <span class="single-input d-flex flex-row">
                      <i class="fa fa-key" aria-hidden="true"></i>
                      <input type="password" class="input-field pass" name="password" placeholder="Enter Password">
                    </span>
                    <button type="submit" class="submit-button submit-button-n-edit login-button">Log In</button>
                  </div>
                  <!-- Otp Box -->
                  <div class="input-group d-flex flex-column otp-box">
                    <span class="single-input d-flex flex-row">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                      <input type="text" class="input-field otp-input" name="otp-input" placeholder="Enter Otp">
                    </span>
                    <button type="submit" class="submit-button submit-button-otp">Save</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script src="https://kit.fontawesome.com/95b99d7a50.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- jQuery (https://jquery.com/download/) -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="../js/moment.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      // const diffInMilliseconds = Math.abs(new Date('2019/10/1 00:00:00') - new Date('YYYY/MM/DD hh:mm:ss'));

      // console.log(new Date('YYYY/MM/DD hh:mm:ss')); //86400000

      // login button handle
      $(document).on('click', '.login-button', function(event) {
        console.log("clicked");
        var email = $('.user-id').val();
        var pass = $('.pass').val();
        let otp = Math.floor(Math.random() * (1000000 - 100000)) + 15;

        if (email == "") {
          alert('Please enter Your mail id!');
        } else if (pass == "") {
          alert("Please enter password!");
        } else {
          $.ajax({
            url: './api/login/authenticate.php',
            type: 'POST',
            data: {
              pass: pass,
              email: email
            },

            success: function(data) {
              console.log(data);
              if (data == 1) {
                $.ajax({
                  url: './api/login/otp.php',
                  type: 'POST',
                  data: {
                    otp: otp
                  },

                  success: function(data) {
                    console.log('otp ' + data);
                    if (data == 1) {
                      $('.n-edit').css('transform', 'translateX(100%)');
                      $('.otp-box').css('transform', 'translateX(0)');
                    } else {
                      console.log("Failed to send Otp!");
                    }
                  }
                })

              } else if (data == 2) {
                alert('Invalid Username!');
              } else {
                alert('Wrong password!');
              }
            }
          })
        }

      });

      $(document).on('click', '.submit-button-otp', function(event) {

        let otp_input = $('.otp-input').val();
        var email = $('.user-id').val();
        var pass = $('.pass').val();

        $.ajax({
          url: './api/login/otp.php',
          type: 'POST',
          data: {
            check_otp: otp_input
          },

          success: function(data) {
            console.log(data);
            if (data == 1) {
              window.location = "admin.php";

            } else if (data == 2) {
              alert("Otp Expired!");
            } else {
              alert("Invalid otp!");
            }
          }
        })

      });

    });
  </script>

</body>

</html>