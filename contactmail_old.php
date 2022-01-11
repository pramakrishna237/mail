<?php 
if(isset($_POST['submit'])){ 
	
	print_r($_POST); die()
      
    $from = $_POST['email']; // this is the sender's Email address
	
    $name = $_POST['name'];
	$phone = $_POST['phone'];
    $email = $_POST['email'];
    $service = $_POST['service'];
    $subject = $_POST['subject'];
	$textmessage = $_POST['textmessage'];
	$check=$_POST['check'];
	$multiple=$_POST['multiple'];
    
	
    $subject = "Company Name";
     $message = "Name : ".$name ."\n" . " Mobile:" . $phone ."\n"."Email : ". $email ."\n" ."Service : ".$service ."\n". "Subject : ".$subject."\n". " Message : ".$textmessage."\n". " Check:" . $check ."\n". " Multiple:" . $multiple ."\n" . $_POST['message']."\n "."\n";

    $message .= "This email is coming Landing Page";
     include_once("class.phpmailer.php");
         $mail = new PHPMailer();
         
         

     $mail->Priority = 1;
    $mail->From = $from;
    $mail->FromName = $from;
    $mail->Sender = $from;
    $mail->ReturnPath = $from;
    $mail->AddReplyTo($from, $from);
    
    $mail->AddAddress( "ramakrishna.ui010@gmail.com");
    
   
         $mail->Body = $message;
         
             $mail->AltBody = "";
         $mail->Subject = $subject ;

                $sent =$mail->Send();
    
					?>
	<script>
		alert('email submitted');
		window.location.href = 'thankyou.html';

	</script>
	<?php
    }
?>
