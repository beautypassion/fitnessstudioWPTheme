<?php require_once("../../../../wp-load.php"); ?>

<meta http-equiv="refresh" content="3; url=<?php echo site_url(); ?>" />
<meta charset="UTF-8" />

<?php 
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   //empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   ?>
   <div style="text-align:center;padding:15%;color:#4286f4;font-size: 75px;background-color:#f0f0f0;font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif">
   <?php echo "Some information is missing! Please check your entries and try again"; ?>
   </div>
   <?php return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars_decode($_POST['message']));

// Create the email and send the message
$to = get_option( 'c_email' ); // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$generated_mail = get_option( 'send_email' );
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: $generated_mail\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
?>
<div style="text-align:center;padding:15%;color:#4286f4;font-size: 75px;background-color:#f0f0f0;font-family: Montserrat,"Helvetica Neue",Helvetica,Arial,sans-serif">
<?php echo "Your message has been sent successfully!"; ?>
</div>
<?php
return true;         
?>
