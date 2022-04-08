<?php
date_default_timezone_set('Asia/Kolkata');

if ($_SERVER['HTTP_HOST'] == "localhost") {
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$msg = mysqli_real_escape_string($conn, $_POST['msg']);
$date = date("Y-m-d H:i:s");

$result = mysqli_query($conn, "INSERT INTO `message`(`name`,`email`,`subject`,`message`,`date`) VALUES('$name','$email','$subject','$msg','$date');");

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

notification('New message', 'New message from an user', $date, $conn);

sendMail($officialmail, $subject, $msg);

if ($result) {
  echo 1;
} else {
  echo 0;
}
