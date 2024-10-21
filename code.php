<?php
session_start();
include('db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token) {
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'cosajohnmark69@gmail.com';                     //SMTP username
    $mail->Password   = 'qxeq juso pzot zdrj';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('cosajohnmark69@gmail.com', $name);
    $mail->addAddress($email, $name);     //Add a recipient
   

    $mail->isHTML(true);                                  
    $mail->Subject = 'Email verification from cosa';
    $email_template = "
        <h1>You have Registered with cosa</h1>
        <h4>Verify your Email address to login with the link below:</h4>
        <br><a href='http://localhost/cosa%20new%20folder/login_registration/verify_email.php?token=$verify_token'>Click here to verify</a>
    ";

    $mail->Body    = $email_template;
    $mail->AltBody = 'Verify your email address to complete the registration.';
   
    try {
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone']; 
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $verify_token = md5(rand()); 

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("SELECT email FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['status'] = "It looks like you already have an account with us. Try logging in or use a different email address.";
    } else {
        $stmt = $con->prepare("INSERT INTO users (name, phone, email, password, verify_token) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param('sssss', $name, $phone, $email, $password, $verify_token);
        $query_run = $stmt->execute();

        if ($query_run) {
            if (sendemail_verify($name, $email, $verify_token)) {
                $_SESSION['status'] = "Success! We’ve sent you a confirmation email. Please check your inbox to verify your account and get started.";
            } else {
                $_SESSION['status'] = "Oops! We couldn't send the verification email. Please try again.";
            }
        } else {
            error_log("SQL Error: " . $stmt->error);
            $_SESSION['status'] = "Oops! Something went wrong with your registration. Please try again, or contact support if the issue persists.";
        }
    }
    $stmt->close();
    header("Location: register.php");
    exit(0);
}
?>