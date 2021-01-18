<?php
	require(__DIR__."/functions.php");
	$u_count=0;
	$u_datavalue=null;
	$dbh = new PDO("pgsql:host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME.";user=".DBUSER.";password=".DBPASS);
	if(isset($_COOKIE['user_cookie'])){
		$cookieid=$_COOKIE['user_cookie'];$sql = "SELECT * FROM users WHERE validflag=TRUE AND cookieid='".$cookieid."'";
		$res = $dbh->query($sql);
		foreach( $res as $value ) {
			$u_count += 1;
			$u_datavalue=$value;
		}
	}
	echo $u_count.","."$value[name]";
?>