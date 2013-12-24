<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email Sender</title>
</head>

<body>
<?php
  /* Initilizing SES Class */	
  require_once('ses.php');
  $ses = new SimpleEmailService('Access Key Here', 'Secret Key Here');
  
  /* Going to define variables for subject and message */
  $subject = "Real Estate Branding and Marketing by REMbrand";
  
if (($handle = fopen("file-greetings.csv", "r")) !== FALSE) {
	
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

		$name = $data[0];
		$email = $data[1];

  		$message = file_get_contents('http://www.rembrand.ca/resources/rembrand/newsletter/dec-2013/newyear-greetings.html');
  		$message = str_replace("{date}", date("F j, Y"), $message);
		
		$message = str_replace("{name}", $name, $message);
		echo $message = str_replace("{email}", $email, $message);

		/* Initilizing Final SES Class */
		$m = new SimpleEmailServiceMessage();
		$m->addTo($email);
		$m->setFrom('donotreply@rembrand.ca');
		$m->setSubject($subject);
		$m->setMessageFromString(null,$message);

		$ses->sendEmail($m);

		echo "Newsletter sent to ".$name." (".$email.")<br />";

		sleep(1);
		
    }

    fclose($handle);

}  
?>
</body>
</html>