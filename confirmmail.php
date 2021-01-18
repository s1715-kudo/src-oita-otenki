<!DOCTYPE html>
<html lang="jp">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="robots" content="noindex,nofollow">
	<title>おてんきっ！　会員登録完了</title>
	
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="button.css">
	<link rel="stylesheet" href="sitetitle.css">
	<link rel="stylesheet" href="textbox.css">
	<link rel="stylesheet" href="background.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<script src="jquery.rwdImageMaps.min.js"></script>
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
	<div class="header">
		<a class="logo" href="index.php"><img class="logoimg" src="img/logo.png"></a>
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
				require(__DIR__."/mail.php");
				$sql = null;
				$res = null;
				$dbh = null;
				$getmail=filter_input(INPUT_GET, 'mail');
				$getsecurityid=filter_input(INPUT_GET, 'id');
				
				try{
					$dbh = new PDO("pgsql:host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME.";user=".DBUSER.";password=".DBPASS);
					$sql = "SELECT * FROM users WHERE validflag=FALSE AND mailadress='".$getmail."' AND securityid='".$getsecurityid."'";
					$res = $dbh->query($sql);
					$count=0;
					foreach( $res as $value ) {
						$count+=1;
					}
					if($count==1){
						$sql = "UPDATE users SET validflag=TRUE WHERE mailadress='".$getmail."' AND securityid='".$getsecurityid."'";
						$res = $dbh->query($sql);
						echo "会員登録が完了しました<br>";
						signupconfirmmailsend($getmail);
						
					}
					else{
						echo "エラーが発生しました";
					}
				} catch(PDOException $e) {
					echo $e->getMessage();
					die();
				}
				$dbh = null;
				
			?>
			
		</center>
	</div>
</body>
</html>