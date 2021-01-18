<?php
	require(__DIR__."/functions.php");
	$inputmessage=$_POST["inputmessage"];
	$polygoncolor=str_replace("#","",$_POST["polygoncolor"]);
	$place=$_POST["place"];
	$gpolygonlist=str_replace("[","",str_replace("]","",$_POST["polygonlist"]));
	foreach(explode(",",$gpolygonlist) as $val){
		$polygonlist0[]=$val*1.0;
	}
	
	for($pi=0;$pi<count($polygonlist0)/2;$pi++){
		$polygonlist[]=[$polygonlist0[$pi*2],$polygonlist0[$pi*2+1]];
	}
	if(strlen($inputmessage)<256){
		$sql = null;
		$res = null;
		$dbh = null;
		try{
			$dbh = new PDO("pgsql:host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME.";user=".DBUSER.";password=".DBPASS);
			
			$commentkey=randomString();
			while(isRes($dbh->query("SELECT * FROM comments WHERE commentkey='".$commentkey."'"))){
				$commentkey=randomString();
			}
			$date = date('Y-m-d H:i:s');
			$cookieid=$_COOKIE['user_cookie'];
			$dbh = new PDO("pgsql:host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME.";user=".DBUSER.";password=".DBPASS);
			$sql = "SELECT * FROM users WHERE validflag=TRUE AND cookieid='".$cookieid."'";
			$res = $dbh->query($sql);
			$userid=null;
			foreach( $res as $value0 ) {
				$userid="$value0[userid]";
			}
			unset($res);
			
			$sql = "INSERT INTO comments (polygoncolor,text,createtime,place,commentkey,userid) VALUES ('".$polygoncolor."','".$inputmessage."','".$date."','".$place."','".$commentkey."',".$userid.")";
			$res = $dbh->query($sql);
			unset($res);
			
			$sql = "SELECT * FROM comments WHERE commentkey='".$commentkey."'";
			$res = $dbh->query($sql);
			$commentid=null;
			foreach( $res as $value1 ) {
				$commentid="$value1[commentid]";
			}
			unset($res);
			
			for ($pvi=0;$pvi<count($polygonlist);$pvi++){
				$sql = "INSERT INTO points (lat,lng,commentid,ordernum) VALUES ('".$polygonlist[$pvi][0]."','".$polygonlist[$pvi][1]."','".$commentid."','".$pvi."')";
				$res = $dbh->query($sql);
				unset($res);
			}
			
		} catch(PDOException $e) {
			$errorstr=$e->getMessage();
			die();
		}
		// 接続を閉じる
		$dbh = null;
	}
	else{
		echo "コメントは256文字以下にしてください";
	}
?>