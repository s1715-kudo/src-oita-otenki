<!DOCTYPE html>
<html lang="jp">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="robots" content="noindex,nofollow">
	<title>おてんきっ！　アカウント情報</title>
	
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="button.css">
	<link rel="stylesheet" href="sitetitle.css">
	<link rel="stylesheet" href="textbox.css">
	<link rel="stylesheet" href="background.css">
</head>
<body>
	<div id="top"></div>
	<div id="area">
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
	<div class="header">
		<a class="logo" href="index.php"><img class="logoimg" src="img/logo.png"></a>
	</div>
	<div class="site_head">
		<center>
			<div id="site_title">
				<img src="img/title.jpg" >
				<p>未来の農業が<wbr>ここにある</p>
			</div>
			<br>

			<?php
				require(__DIR__."/functions.php");
				$u_count=0;
				$u_datavalue=null;
				$dbh = null;
				if(isset($_COOKIE['user_cookie'])){
					$cookieid=$_COOKIE['user_cookie'];
					$dbh = new PDO("pgsql:host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME.";user=".DBUSER.";password=".DBPASS);
					$sql = "SELECT * FROM users WHERE validflag=TRUE AND cookieid='".$cookieid."'";
					$res = $dbh->query($sql);
					foreach( $res as $value ) {
						$u_count += 1;
						$u_datavalue=$value;
					}
				}
				if($u_count==1){
					echo "<h4>ユーザ名</h4><p>"."$value[name]"."</p><br>";
					echo "<h4>メールアドレス</h4><p>"."$value[mailadress]"."</p><br>";
					$sql2 = null;
					$res2 = null;
					$sql2 = "SELECT COUNT(*) FROM comments WHERE userid='$value[userid]'";
					$res2 = $dbh->query($sql2);
					foreach( $res2 as $value ) {
						echo "<h4>農地数</h4><p>"."$value[0]"."</p><br>";
					}
				}
			?>
			
		</center>
	</div>
</body>
</html>