<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Email Sender</title>
</head>

<body>
<?php
require_once('ses.php');
$ses = new SimpleEmailService('Access Key Here', 'Secret Key Here');
?>
</body>
</html>