<!doctype html>
<html>
	<head><title>Sending Mail</title></head>

	<body>
		<?php
			echo "<p>Thank you, <b> $_POST[name]</b>, for your message!";
			echo "<p> Your email address is: <b>$_POST[email]</b>. </p>";
			echo "<p> Your message was: <br>";
			echo "$_POST[message] </p>";

			// start building the message
			$msg = 	"Name:	$_POST[name]\n";
			$msg .= "Email:	$_POST[email]\n";
			$msg .= "Message: $_POST[message]\n";

			// set up the mail

			$recipient = "henry.spivey@sjsu.edu";
			$subject = "Form Submission Results";
			$mailheaders = "MIME-Version: 1.0\r\n";
			$mailheaders .= "Content-type:text/html;charset=ISO-8859-1\r\n";
			$mailheaders .= "From: My Web Site <dormshopper@gmail.com> \n";
			$mailheaders .= "Reply to: $_POST[email]";


			// send the mail
			mail($recipient, $subject, $msg, $mailheaders);
			
		?>
	</body>
</html>

