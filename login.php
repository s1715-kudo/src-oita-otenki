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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<script src="jquery.rwdImageMaps.min.js"></script>
	<script src="functions.js"></script>
	<?php
		if(isset($_COOKIE['user_cookie'])){
			header("Location: index.php");
			exit;
		}
	?>
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
	<div class="site_head">
		<center>
			<div id="site_title">
				<img src="img/title.jpg" >
				<p>未来の農業が<wbr>ここにある</p>
			</div>
			<br>
			<p id="errortext" class="font_red"></p>
			<script>
				document.getElementById('errortext').innerHTML=errorcodeString(setKeyinit("error",""))
			</script>
			<br>
			<form id="login" class="loginform" method="post" action="post-login.php">
				<div class="textBox">
					<input class="text" name="mailaddress" type="textbox" placeholder="Email Address" onkeyup="this.setAttribute('value', this.value);" value=""/>
					<label class="label">Email Address</label>
					<label class="error"></label>
				</div>
				<div class="textBox">
					<input class="text" name="password" type="password" placeholder="Password" onkeyup="this.setAttribute('value', this.value);" value=""/>
					<label class="label">Password</label> 
					<label class="error"></label>
				</div>
				<p class="line_margin"><button type="submit" name="signinbutton" class="buttonhide"><a class="btn btn--blue btn--emboss btn--cubic">ログイン</a></button></p>
				<p class="line_margin"><a href="signup.php">アカウント作成</a></p>
			</form>
		</center>
	</div>
</body>
</html>