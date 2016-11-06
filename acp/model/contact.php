<?php
	include '../config.php';
	include 'safe.php';
	include $root.'/acp/model/set.lang.php';
	include $root.'/acp/apps/recaptcha/key.php';
	
		require_once('recaptchalib.php');
		$privatekey = $recaptcha['private_key'];
		$resp = recaptcha_check_answer ($privatekey,
		$_SERVER["REMOTE_ADDR"],
		$_POST["recaptcha_challenge_field"],
		$_POST["recaptcha_response_field"]);
 
		if (!$resp->is_valid)
			{	
				echo "<script language=\"javascript\">";
				echo "alert(\"".$lang['failed_send_message']."\");";
				echo "window.location.href = \"".$host."\";";			
				echo "</script>";
				echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=".$host."\"></noscript></head><body><noscript>".$lang['failed_send_message']."</noscript></body></html>";
			}
			else {
				$web = filter_var($site['title'], FILTER_SANITIZE_STRING);
				$email = filter_var($site['email'], FILTER_SANITIZE_EMAIL);
				$from = filter_var($_POST['from'], FILTER_SANITIZE_EMAIL);
				$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
				$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
				$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
				$message = wordwrap($message, 70);
				$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
				$header = "From : $from" . "\n\r" .
    				"Reply-To: $name, $from" . "\r\n" .
    				"Phone: $phone" . "\r\n" .
    				"X-Mailer: $web";
				$send = mail($email,$subject,$message,$header);

					if($send) { 
						echo "<script language=\"javascript\">";
						echo "alert(\"".$lang['success_send_message']."\");";
						echo "window.location.href = \"".$host."\";";			
						echo "</script>";
						echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=".$host."\"></noscript></head><body><noscript>".$lang['success_send_message']."</noscript></body></html>";
						}
					else { 
							echo "<script language=\"javascript\">";
							echo "alert(\"".$lang['failed_send_message']."\");";
							echo "window.location.href = \"".$host."\";";			
							echo "</script>";
							echo "<html><head><noscript><meta http-equiv=\"refresh\" content=\"2; URL=".$host."\"></noscript></head><body><noscript>".$lang['failed_send_message']."</noscript></body></html>";
					}
}
?>