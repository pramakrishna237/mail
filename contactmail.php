<?php

//echo "test"; die; 
if(isset($_POST['contact_submit'])){ 
	
	
	//print_r($_POST); die; 
    $from = $_POST['email']; // this is the sender's Email address	
    $name = $_POST['name'];
	$phone = $_POST['phone'];
    $email = $_POST['email'];
    //$service = implode(",",$_POST['multiple']);
	$service = $_POST['service'];
    $subject = $_POST['subject'];
	$textmessage = $_POST['textmessage'];
	$check=$_POST['check'];	
	$agreed = ($_POST['check'] == 'on') ? "Agreed" : "Not Agreed";    
	
    $subject ="  Services : " . $service . " " ;
    $message = " Name : ".$name ."<br/>";
	$message .=" Mobile : " . $phone ."<br/>";
	//$message .=" Email : ". $email ."<br/>";
	//$message .=" ".$subject."<br/>";
	$message .=" Message : ".$textmessage."<br/>";
	$message .=" Agreed to the terms and conditions : " . $agreed ."<br/>";
	$message .= " Services : " . $service . "<br/>";
	
	//$message .= "";
    //$message .= "This email is coming from companyname Landing Page";
	//$message .="Our team will get in touch with you shortly."."<br/>";
	//$message .="To know more, please connect with us on Twitter, Facebook and LinkedIn."."<br/>";
    //$message .="https://twitter.com/"."<br/>";
	//$message .="https://www.facebook.com/"."<br/>";
	//$message .="https://www.linkedin.com/"."<br/>";
	//$message .="Thank you!"."<br/>";
	//$message .="Team Nextclick "."<br/>";
	//$message .="www.nextclick.info";
		
    include_once("phpmailer.php");
	$headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$mail = new PHPMailer;
	$mail->setFrom($email, $name);
	$mail->AddAddress("ramakrishna.ui010@gmail.com", "Rama Krishna");
	
	$mail->addReplyTo($email, $name);
	$mail->isHTML(true);			
	$mail->Subject = $subject;			
	$mail->Body = $message;			
	if ($mail->send()) {
		
		// Email for responder Email
		
	$res_subject = "Thank you for applying to comapany!";  // Please add responder email subject
	$res_message=" " . $email . "<br/>";	
	$res_message.="Hello " .$name ."<br/><br/>";	
	$res_message.="Thank you for applying to company name. We have received your application for the Service of    "  . $service ."<br/> <br/>";
	
	$res_message .="The company recruitment team will reach out to you if we decide to proceed with your application."."<br/>";
	$res_message .="<a href='https://www.facebook.com/'><img src='http://www.nextclick.info//images/facebbook30.png'></a> | <a href='https://www.linkedin.com/company/nextclick-info-solutions/'><img src='http://www.nextclick.info//images/linkedin30.png'></a> | <a href='https://twitter.com/NextClickInfoS1'><img src='http://www.nextclick.info//images/twitter30.png'></a>";

		$res_mail = new PHPMailer;
		$res_mail->setFrom("contact@company.info", "companyname");
		$res_mail->AddAddress($email, $name);		
		$res_mail->addReplyTo("contact@company.info", "comapany");		
		$res_mail->isHTML(true);			
		$res_mail->Subject = $res_subject;			
		$res_mail->Body = $res_message;	
		$res_mail->send();
		
		header("location: ../thankyou.html");
	} 
	else {
		header("location: ../fail.html");
	}

}
?>
