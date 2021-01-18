<?php
	require(__DIR__."/functions.php");
	$place=$_POST["place"];
	$sql = null;
	$res = null;
	$sql2 = null;
	$res2 = null;
	$dbh = null;
	try{
		echo '{';
		$dbh = new PDO("pgsql:host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME.";user=".DBUSER.";password=".DBPASS);
		$sql = "SELECT * FROM comments WHERE place='".$place."'";
		$res = $dbh->query($sql);
		$v1flag = TRUE;
		foreach( $res as $value1 ) {
			if(!$v1flag)echo ',';
			else $v1flag=FALSE;
			$commentid="$value1[commentid]";
			$userid="$value1[userid]";
			
			echo '"'.$commentid.'":{';
			echo '"polygoncolor":"#'."$value1[polygoncolor]".'",';
			echo '"text":"'.str_replace("\n", "\\n","$value1[text]").'",';
			echo '"createtime":"'."$value1[createtime]".'",';
			
			$sql2 = "SELECT * FROM users WHERE userid=".$userid;
			$res2 = $dbh->query($sql2);
			foreach( $res2 as $value2 ) {
				echo '"username":"'."$value2[name]".'",';
			}
			unset($res2);
			
			$sql2 = "SELECT * FROM points WHERE commentid=".$commentid." ORDER BY ordernum ASC";
			$res2 = $dbh->query($sql2);
			echo '"points":[';
			$v2flag = TRUE;
			foreach( $res2 as $value2 ) {
				if(!$v2flag)echo ',';
				else $v2flag=FALSE;
				echo '['."$value2[lat]".','."$value2[lng]".']';
			}
			unset($res2);
			unset($v2flag);
			echo ']';
			
			echo '}';
		}
		
		echo '}';
	} catch(PDOException $e) {
		$errorstr=$e->getMessage();
		die();
	}
	// 接続を閉じる
	$dbh = null;
?>