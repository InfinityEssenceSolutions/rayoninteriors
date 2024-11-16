<?php
// Check for empty fields
if(empty($_POST['name']) || 
   empty($_POST['email']) || 
   empty($_POST['message']) || 
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   echo "No arguments Provided!";
   return false;
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

// Create the email and send the message
$to = 'rayonad2024@gmail.com'; // Add your email address here
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: $email_address\n"; // This is the email address the generated message will be from
$headers .= "Reply-To: $email_address";  

if(mail($to, $email_subject, $email_body, $headers)) {
    echo 'Message has been sent successfully';
} else {
    echo 'Error: Message could not be sent.';
}
return true;
?>
