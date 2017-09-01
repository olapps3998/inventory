<?php
/*$hostName	= "localhost";
$username	= "root";
$password	= "admin";
$dbName		= "db_inventory";*/

if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1"  || $_SERVER["REMOTE_ADDR"] == "::1"  || $_SERVER["HTTP_POST"] == "localhost" ) {
	$hostName = "localhost";
	$dbName   = "db_inventory"; //$database_conn = "zecorind_mitra2";
	$username = "root"; //$username_conn = "zecorind_root";
	$password = "admin";
}
else {
	$hostName = "mysql.idhostinger.com";
	$dbName   = "u197022578_inven"; //$database_conn = "zecorind_mitra2";
	$username = "u197022578_inven"; //$username_conn = "zecorind_root";
	$password = "M457r1P 81";
}

$connect = mysqli_connect($hostName,$username,$password,$dbName);
?>