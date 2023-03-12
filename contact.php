<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to iDiscuss - Coding Forum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        #ques{
            min-height: 637px;
        }
        body{
          text-align: start;
        }
        .form-center {
          width: 530px;
          margin: 0 auto;
        }
        form{
          display: inline-block;
        }
    </style>
</head>
  <body>

    <?php include 'Partials/_dbconnect.php'; ?>
    <?php include 'Partials/_header.php'; ?>

    <div class="container my-4 mb-3 form-center" id=ques>
        <h1 class="text-center">Contact Us</h1>
        <form action="<?php echo $_SERVER["REQUEST_URI"]?>" method="post" class="bg-secondary bg-opacity-10 p-3 mt-3" style="width:500px">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="emailaddress" name="emailaddress" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Subject</label>
              <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="mb-3">
            <label for="floatingTextarea2">Type your message</label>
            <textarea class="form-control mt-2" id="message" name="message" rows="3"></textarea>
        </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-success">
      </form>
    </div>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST'){
  
  // Insert into contact db
  $name = $_POST['name'];
  $from = $_POST['emailaddress'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $sql = "INSERT INTO `contacts` (`name`, `email_address`, `subject`, `message`)
    VALUES ('$name', '$from', '$subject', '$message')";
  
  $result = mysqli_query($conn, $sql);
  
  // Mailing System
  $mail->isSMTP();                                           
  $mail->Host       = 'smtp.gmail.com';                     
  $mail->SMTPAuth   = true;                                   
  $mail->Username   = 'cyborgbot00001@gmail.com';                    
  $mail->Password   = 'jtmwlxnonbhjmjbi';                             
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
  $mail->Port       = 465;   
  
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $from = $_POST['emailaddress'];


  $mail->setFrom($_POST['emailaddress'], $_POST['name']);

  $mail->addAddress($_POST['emailaddress']);             


  $mail->isHTML(true);                                 
  $mail->Subject = $_POST['subject'];
  $mail->Body    = $_POST['message'];

  $mail->send();

  if($mail->send()){
    echo '
      <div class="alert alert-success alert-dismissible fade show mb-0 my-0" role="alert">
        <strong>Success!</strong> Message has been sent!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
  else
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

?>
    
    <?php include 'Partials/_footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>