<!DOCTYPE html>
<html lang="jp">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="robots" content="noindex,nofollow">
	<title>おてんきっ！　会員登録</title>
	
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
				require(__DIR__."/mail.php");
				
				$getname=$_POST['name'];
				$getmail=$_POST['mailaddress'];
				$password=$_POST['password'];
				$password2=$_POST['password2'];
				$errorstr="";
				if(strlen($getname)!=0 && strlen($password)!=0 && strlen($getmail)!=0){
					if(strlen($getname)<64 && strlen($password)<64 && strlen($getmail)<64){
						if(strcmp($password,$password2)==0){
							$sql = null;
							$res = null;
							$dbh = null;
							try{
								$dbh = new PDO("pgsql:host=".DBHOST.";port=".DBPORT.";dbname=".DBNAME.";user=".DBUSER.";password=".DBPASS);
								if(!isRes($dbh->query("SELECT name FROM users WHERE name='".$getname."'"))){
									$mailpattern = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/";
									if(preg_match($mailpattern, $getmail) && !isRes($dbh->query("SELECT mailadress FROM users WHERE mailadress='".$getmail."'"))){
										//ユーザー名・メールアドレスがないとき
										$securityid=randomString();
										$cookieid=randomString();
										while(isRes($dbh->query("SELECT securityid FROM users WHERE securityid='".$securityid."'"))){
											$securityid=randomString();
										}
										while(isRes($dbh->query("SELECT cookieid FROM users WHERE cookieid='".$cookieid."'"))){
											$cookieid=randomString();
										}
										
										$sql = "INSERT INTO users (name,password,mailadress,validflag,securityid,cookieid) VALUES ('".$getname."','".$password."','".$getmail."',FALSE,'".$securityid."','".$cookieid."')";
										$res = $dbh->query($sql);
										signupmailsend($getmail,$securityid);
										
										echo "<p>あなたのメールアドレスに確認メールを送信しました。受信したメールのURLを開いて認証してください。</p>";
									}
									else{
										$errorstr="E0001";
									}
								}
								else{
									$errorstr="E0002";
								}
								
							} catch(PDOException $e) {
								$errorstr=$e->getMessage();
								die();
							}
							// 接続を閉じる
							$dbh = null;
						}
						else{
							$errorstr="E0003";
						}
					}
					else{
						$errorstr="E0004";
					}
				}
				else{
					$errorstr="E0005";
				}
				if(strcmp($errorstr,"")!=0){
					header("Location: signup.php?error=".$errorstr);
					exit;
				}
			?>
			
		</center>
	</div>
</body>
</html>