<?php
date_default_timezone_set('Asia/Kolkata');

if ($_SERVER['HTTP_HOST'] == "localhost") {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

// Mail Function
function sendMail($to, $subject, $message)
{
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: ParkplaceSolution' . "\r\n";
    $msg = "<html><head>" .
        "<meta http-equiv='Content-Language' content='en-us'>" .
        "<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>" .
        "</head><body>" . $message .
        "<br><br></body></html>";
    mail($to, $subject, $msg, $headers);
}

// Notification function
function notification($sub, $note, $date, $conn)
{
    mysqli_query($conn, "INSERT INTO `notify`(`subject`,`note`,`date`) VALUES('$sub','$note,'$date');");
}
    
session_start();

if (isset($_POST['otp'])) {

    $otp = mysqli_real_escape_string($conn, $_POST['otp']);

    $sql = "UPDATE `admin` SET `otp`='$otp',`create_at`= '" . date("Y-m-d H:i:s") . "' WHERE `id` = 1";

    $to_email = $officialmail;
    $subject = 'Parkplacesolution verification code';
    $message = 'Hi, You can enter this code to login: ' . $otp;

    if (sendMail($to_email, $subject, $message)) {
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 2;
        }
    } else {
        echo 0;
    }
} elseif (isset($_POST['check_otp'])) {
    $otp = mysqli_real_escape_string($conn, $_POST['check_otp']);

    $result = mysqli_query($conn, "SELECT `otp`,`create_at` FROM `admin` WHERE `id` = 1 AND `otp`='$otp'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $datetime = new datetime($row['create_at']);
        $datetime1 = new datetime();

        if (date_diff($datetime1, $datetime)->i <= 10) {
            $_SESSION['admin_logged_in'] = true;
            echo 1;
        } else {
            echo 2;
        }
    } else {
        echo 0;
    }
} else {
    echo 3;
}
