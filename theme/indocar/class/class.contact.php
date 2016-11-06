<?php

/**
 * Class Contact for Javelinee CMS theme.
 * 
 * @version: 1.0 / 14 Feb 2015
 * @author: M ABD AZIZ ALFIAN <aalfiann@gmail.com>
 * @copyright 2014 Javelinee
 * @license: Creative Common License
 * 
 */

	class contact extends theme {

		private $image;

		public static function mail(){
			global $host,$site,$lang;

			$aaa=rand(0,5);
			$bbb=rand(3,9);

			if (isset($_POST['mailsend'])) {
				if (($aaa + $bbb) == $_POST['smath']) {
					$web = filter_var($site['title'], FILTER_SANITIZE_STRING);
					$email = filter_var($site['email'], FILTER_SANITIZE_EMAIL);
					$from = filter_var($_POST['from'], FILTER_SANITIZE_EMAIL);
					$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
					$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
					$message = wordwrap($message, 70);
					$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
					$header = "From : $from" . "\n\r" .
    					"Reply-To: $name, $from" . "\r\n" .
    					"X-Mailer: $web";
					$send = mail($email,$subject,$message,$header);
					echo 'Success send message';
				}
				else { 
						echo 'Wrong answer! Please try again.';
				}
			}
			echo '
				<form method="post" action="'.$_SERVER['PHP_SELF'].'#contact">
								<div class="row 50%">
									<div class="6u"><input type="text" name="name" placeholder="Name" required></div>
									<div class="6u"><input type="text" name="from" placeholder="Email" required></div>
								</div>
								<div class="row 50%">
									<div class="12u">
										<input type="text" name="subject" placeholder="Subject" required>
									</div>
								</div>
								<div class="row 50%">
									<div class="12u">
										<textarea name="message" placeholder="Message" required></textarea>
									</div>
								</div>

								<div class="row 50%">
									<div class="2u">
										<input type="text" name="smath" placeholder="'.$aaa.' + '.$bbb.' = ?" required>
									</div>
								</div>

								

								
								<div class="row">
									<div class="12u">
										<input type="submit" name="mailsend" value="Send Message" />
									</div>
								</div>
							</form>';
		}
	}