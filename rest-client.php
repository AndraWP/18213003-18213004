<?php

# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# Day, Date	: Thursday, 05 November 2015
# File		: rest-client.php

	if(isset($_GET["action"]) && isset($_GET["No_ID"]) && (isset($_GET["action"]) == "get_info")){
		$info = file_get_contents('http://localhost/rest-api.php?action=get_info&No_ID=' . $_GET["No_ID"]);
		echo $info;
		$info = json_decode($info,true);
	}
?>

<table border="1" style="width:25%">
	<tr>
		<th>No_ID</th>
		<th>Nama</th>
	</tr>
	
	<tr>
		<td><?php echo $info["No_ID"]?></td>
		<td><?php echo $info["Nama"]?></td>
	</tr>
</table>
