<?php

# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# Day, Date	: Thursday, 05 November 2015
# File		: rest-api.php

	function get_info_by_id($No_ID){
		$info = array();
		mysql_connect('localhost','root','');
		mysql_select_db('hotel');
		$result = mysql_query("SELECT No_ID, Nama FROM pengunjung WHERE No_ID = '$No_ID'");
		$info = mysql_fetch_array($result,MYSQL_ASSOC);
		return $info;
	}
	
	if (isset($_GET["action"])){
		switch ($_GET["action"]){
			case "get_info";
				if (isset($_GET["No_ID"]))
					$value = get_info_by_id($_GET["No_ID"]);
				else
					$value = "ERROR";
				break;	
		}
	}
	
	exit(json_encode($value));
?>
