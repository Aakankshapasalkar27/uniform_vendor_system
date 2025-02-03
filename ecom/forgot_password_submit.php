<?php
require('connection.inc.php');
require('functions.inc.php');


	$email=get_safe_value($con,$_POST['email']);
	$res=mysqli_query($con,"select * from users where email='$email'");
	$check_user=mysqli_num_rows($res);
	if($check_user>0){
		$row=mysqli_fetch_assoc($res);
		$pwd=$row['password'];
		$html="Your password  is $pwd";
		include('smtp/PHPMailerAutoload.php');
		$mail=new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host="smtp.gmail.com";
		$mail->Port=587;
		$mail->SMTPSecure="tls";
			$mail->SMTPAuth=true;
		$mail->Username="atlantawatersolutions786@gmail.com";
		$mail->Password="jdcokrlyzzlstxka";
		$mail->SetFrom("atlantawatersolutions786@gmail.com");
		$mail->addAddress($email);
		$mail->IsHTML(true);
		$mail->Subject="Password recovery";
		$mail->Body=$html;
		$mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		));
	
		if($mail->send()){
			echo "Please check your Email";
		}else{
			//echo "Error occur";
		}

	}else{
		echo "Email Id not registered with us";
		die();
	}
	





?>