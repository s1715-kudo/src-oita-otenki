<!DOCTYPE html>
<html lang="jp">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="robots" content="noindex,nofollow">
	<title>おてんきっ！　ログイン</title>
	
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="button.css">
	<link rel="stylesheet" href="sitetitle.css">
	<link rel="stylesheet" href="textbox.css">
	<link rel="stylesheet" href="background.css">
</head>
<body>
	<div id="top"></div>
	<div id="area" >
		<ul class="circles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<a class="logo" href="index.php"><img class="logoimg" src="img/logo.png"></a>
	<div class="site_head">
		<center>
			<div id="site_title">
				<img src="img/title.jpg" >
				<p>未来の農業が<wbr>ここにある</p>
			</div>
			<br>

			<?php
				require(__DIR__."/functions.php");
				
				$getmail=$_POST['mailaddress'];
				$password=$_POST['password'];
				$errorstr="";
				
				$sql = null;
				$res = null;
				$dbh = null;
				try{
					$dbh = new PDO("pgsql:host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME.";user=".DBUSER.";password=".DBPASS);
					$sql = "SELECT * FROM users WHERE validflag=TRUE AND mailadress='".$getmail."' AND password='".$password."'";
					$res = $dbh->query($sql);
					$count = 0;
					$getcookieid = null;
					foreach( $res as $value ) {
						if(strcmp($password,"$value[password]")==0){
							$count += 1;
							$getcookieid = "$value[cookieid]";
						}
					}
					if($count==1){
						setcookie('user_cookie',$getcookieid,time()+60*60*24*7);
						header("Location: index.php");
						exit;
					}
					else{
						$errorstr="E1001";
					}
					
				} catch(PDOException $e) {
					$errorstr=$e->getMessage();
					die();
				}
				// 接続を閉じる
				$dbh = null;
				if(strcmp($errorstr,"")!=0){
					header("Location: login.php?error=".$errorstr);
					exit;
				}
			?>
			
		</center>
	</div>
</body>
</html>