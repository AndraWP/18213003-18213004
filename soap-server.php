<?php

# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# Day, Date	: Tuesday, 03 November 2015
# File		: soap-server.php


	class API {
		function helloworld(){
			return "Hello World!";
		}
		function addition($a,$b){
			return $a + $b;
		}
		function getData(){
			mysql_connect('localhost','root','');
			mysql_select_db('hotel');
			$result = mysql_query('SELECT Nama FROM pengunjung');
			$teks="";
			while ($row=mysql_fetch_array($result,MYSQL_ASSOC)){
				foreach($row as $colomn){
					$teks = $teks . " - Nama: " . $row["Nama"] . "<br>";
				}
			}	
			return $teks;
		}
	}	
		$opt=array('uri'=> 'http://localhost');
		$server=new SoapServer(NULL,$opt);
		$server-> setClass('API');
		$server-> handle();
?>
