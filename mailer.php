<?php
if($_REQUEST['hdnSubmit']){ /* Checking if form submitted */

  /* Initilizing SES Class */	
  require_once('ses.php');
  $ses = new SimpleEmailService('Access Key Here', 'Secret Key Here');
  
  /* Script to Verify Email Address */
  //print_r($ses->verifyEmailAddress('dev@zeewebtech.com'));
  
  /* Script to Check Verified Email Addresses List */
  //print_r($ses->listVerifiedEmailAddresses());
  
  /* Initilizing Final SES Class */
  $m = new SimpleEmailServiceMessage();
  $m->addTo($_REQUEST['email']);
  $m->setFrom('donotreply@rembrand.ca');
  $m->setSubject($_REQUEST['subject']);
  $m->setMessageFromString($_REQUEST['message']);
  
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
<?php
if (($handle = fopen("file.csv", "r")) !== FALSE) {
	
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		
        for ($c=0; $c < count($data); $c++) {
            echo $data[$c].' ';
        }
		
		echo "<br />\n";
		
    }
    fclose($handle);
}
?>

<form action="" method="post" name="email">
  <label>Email:<br /><input type="text" name="email" value="" /></label><br /><br />
  <label>Subject:<br /><input type="text" name="subject" value="" /></label><br /><br />
  <label>Message:<br /><textarea name="message" cols="50" rows="5"></textarea></label><br /><br />
  <input type="submit" value="Submit" />
  <input type="hidden" name="hdnSubmit" value="1">
</form>
</body>
</html>