<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = "Contaminant Control Contact Form";
  $body = $_POST['body'];

  require_once "PHPmailer/PHPMailer.php";
  require_once "PHPmailer/SMTP.php";
  require_once "PHPmailer/PException.php";

  $mail = new PHPMailer();    //new object

  //smto settings
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "rourkebradley@gmail.com";
  $mail->Password = "L1verp00l97";
  $mail->Port = 587;
  $mail->SMTPSecure = "tls";

  //email settings
  $mail->isHTML(true);
  $mail->setFrom($email, $name);
  $mail->addAddress("rourkebradley@gmail.com");
  $mail->Subject = $subject;
  $mail->Body = $body;

  if($mail->send())
  {
    $status = "Success";
    $response = "Email is sent!";

  } else {
    $status = "Error";
    $response = "Failed: <br> ". $mail->ErrorInfo;
  }

  exit(json_encode(array("status" => $status, "response" => $response)))
}

?>
