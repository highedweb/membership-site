<?php
$errno = -20;
$errstr = 'if you can read this I did not get overwritten';
$s = fsockopen('smtp.sendgrid.net', 2525, $errno, $errstr)
?>

errno: <?php echo $errno ?>
<br/>
errstr: <?php echo $errstr ?>
<br />
$s: <?php var_dump($s); fclose($s); ?>
<br />
<?php

require_once('Mail.php');

$mailer = Mail::factory('smtp', array('host' => 'smtp.sendgrid.net', 'port' => 2525, 'auth' => true,
																			'username' => 'highedweb', 'password' => 'hewebpass'));

var_dump($mailer);

$to = 'techcommittee@highedweb.org';
$rtn = $mailer->send($to, array('From' => '"HighEdWeb Spam Machine" <highedweb@betamatch.me>',
												 'To' => $to,
												 'Subject' => 'Test from membership.highedweb.org'),
									 'Someone clicked on the JDW SendGrid Test Script at http://membership.highedweb.org/jdwtest/jdw.php'
						);
?>
<br />
mailer sender returned: <?php var_dump($rtn); ?>

<?php phpinfo(); ?>