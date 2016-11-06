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
						echo '<font color="red">Wrong answer! Please try again.</font><br>';
				}
			}
			echo '
				<form role="form" method="post" action="'.$_SERVER['PHP_SELF'].'#contact">
					<div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Your name" required>
                        <br>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="from" placeholder="Your email" required>
                        <br>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="subject" placeholder="Subject" required>
                        <br>
                        <textarea class="form-control" rows="3" name="message" placeholder="Message" required></textarea>
                        <label for="exampleInputName1">Please answer!</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="smath" placeholder="'.$aaa.' + '.$bbb.' = ?" required>
                    </div>

					<button type="submit" name="mailsend" class="btn btn-default">Submit</button>
				</form>';
		}
	}