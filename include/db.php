<?php 
	$database['db_host']='localhost';
	$database['db_user']='root';
	$database['db_pass']='';
	$database['db_name']='cms_project';

	foreach($database as $key => $value){
		define(strtoupper($key),$value);

	}
	$connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	// if ($connect) {
	// 	echo "Successful";
	// }else{
	// 	echo "Query Fail";
	// }
	?>