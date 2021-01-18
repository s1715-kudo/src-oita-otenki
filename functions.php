<?php
	date_default_timezone_set('Asia/Tokyo');
	define('DBHOST',"ec2-75-101-212-64.compute-1.amazonaws.com");
	define('DBPORT',"5432");
	define('DBNAME',"dc981cs4vjijok");
	define('DBUSER',"aqupakmemmxhja");
	define('DBPASS',"0bc386a9140e27d0cfe08a7b76dd59ddc481b88b2068c0ac9d4aadfd41602b62");
	define('DBACCESSPASS',"3hQi1ItNIq5tyRxDzT4o2naTr6sviLTlBeLavvBdo5EDzU8EuHjJICgRFRAB0ZTw");
	define('DELETEFLAG',FALSE);
	
	function randomString($length = 16){
		return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
	}
	
	function isRes($res){
		$res0=$res;
		$count=0;
		foreach($res0 as $value0) {
			$count += 1;
		}
		unset($value0);
		unset($res0);
		return $count != 0;
	}
?>