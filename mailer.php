<?php
if($_REQUEST['hdnSubmit']){ /* Checking if form submitted */

  /* Initilizing SES Class */	
  require_once('ses.php');
  $ses = new SimpleEmailService('Access Key Here', 'Secret Key Here');
  
  /* Going to define variables for subject and message */
  $subject = "Real Estate Branding and Marketing by REMbrand";
  $message = file_get_contents('http://www.rembrand.ca/resources/rembrand/newsletter/dec-2012/rembrand-newsletter.html');
  $message = str_replace("{date}", date("F j, Y"), $message);
  $message = str_replace("{name}", $_REQUEST['name'], $message);
  $message = str_replace("{email}", $_REQUEST['email'], $message);
  
  /* Initilizing Final SES Class */
  $m = new SimpleEmailServiceMessage();
  $m->addTo($_REQUEST['email']);
  $m->setFrom('donotreply@rembrand.ca');
  $m->setSubject($subject);
  $m->setMessageFromString(null,$message);
  
  print_r($ses->sendEmail($m));
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email Sender</title>
</head>

<body>
<!-- Simple Email Form to Send -->
<form action="" method="post" name="email">
  <label>Name:<br /><input type="text" name="name" value="" /></label><br /><br />
  <label>Email:<br /><input type="text" name="email" value="" /></label><br /><br />
  <input type="submit" value="Submit" />
  <input type="hidden" name="hdnSubmit" value="1">
</form>
</body>
</html>