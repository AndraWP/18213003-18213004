<?php 

# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# Day, Date	: Tuesday, 03 November 2015
# File		: soap-client.php

	$opt=array('location'=>'http://localhost/soap-server.php',
	'uri'=>'http://localhost/');
	$api = new SoapClient(Null,$opt);
	echo $api -> helloworld();
	echo '<br />';
	echo '4 + 2 = ';
	echo $api -> addition(2,4);
	echo '<br />';	
	echo $api -> getData();
?>
