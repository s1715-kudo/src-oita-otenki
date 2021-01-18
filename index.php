<!DOCTYPE html>
<html lang="jp">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<meta name="robots" content="noindex,nofollow">
	<title>おてんきっ！</title>
	
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="button.css">
	<link rel="stylesheet" href="sitetitle.css">
	<link rel="stylesheet" href="textbox.css">
	<link rel="stylesheet" href="background.css">
	<link rel="stylesheet" href="menu.css">
	<link rel="stylesheet" href="loading.css">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<script src="jquery.rwdImageMaps.min.js"></script>
	<script type="text/javascript" src="functions.js"></script>
	<script type="text/javascript" src="main.js"></script>
	<script type="text/javascript" src="menu.js"></script>
	<script type="text/javascript" src="onload.js"></script>
	<script type="text/javascript" src="background.js"></script>
	<script type="text/javascript" src="holiday.js"></script>
	<script type="text/javascript" src="amedas.js"></script>
	<script type="text/javascript" src="forecast.js"></script>
	<script type="text/javascript" src="loading.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW-SS_6cjTV2KB9-l3C6HJKYRcOqBSe5Q&callback=initMap" defer></script>
	<script src="map.js"></script>
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
	?>
</head>
<body>
	<div id="loader-bg">
		<div id="loader">
			<img src="img/loading.gif" alt="Now Loading..." />
			<p>Now Loading...</p>
		</div>
	</div>
	<div id="wrap">
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
			<div class='hamburger'>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<nav class='globalMenuSp'>
				<ul>
					<li id="menuline1"></li>
					<li id="menuline2"></li>
				</ul>
			</nav>
			<div id="login_box"></div>
		</div>

		<div class="site_head">
			<center>
				<div id="site_title">
					<img src="img/title.jpg" >
					<p>未来の農業が<wbr>ここにある</p>
				</div>
				<p id="place_name"></p>
				<img id="oita_img" src="img/oita.png" usemap="#link">
				<p id="oitamaptext"></p>
			</center>
			<map name="link">
				<area shape="circle" coords="252,28,10" href="index.php?place=kunimi" alt="国見" onmouseover="changeAreaMapText('国見')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="125,60,10" href="index.php?place=nakatsu" alt="中津" onmouseover="changeAreaMapText('中津')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="195,70,10" href="index.php?place=bungo-takata" alt="豊後高田" onmouseover="changeAreaMapText('豊後高田')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="254,122,10" href="index.php?place=kitsuki" alt="杵築" onmouseover="changeAreaMapText('杵築')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="157,126,10" href="index.php?place=innnai" alt="院内" onmouseover="changeAreaMapText('院内')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="110,177,10" href="index.php?place=kusu" alt="玖珠" onmouseover="changeAreaMapText('玖珠')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="160,184,10" href="index.php?place=yufuin" alt="湯布院" onmouseover="changeAreaMapText('湯布院')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="178,312,10" href="index.php?place=taketa" alt="竹田" onmouseover="changeAreaMapText('竹田')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="259,250,10" href="index.php?place=inukai" alt="犬飼" onmouseover="changeAreaMapText('犬飼')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="257,348,10" href="index.php?place=ume" alt="宇目" onmouseover="changeAreaMapText('宇目')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="342,305,10" href="index.php?place=saiki" alt="佐伯" onmouseover="changeAreaMapText('佐伯')" onmouseout="changeAreaMapText('')">
				<area shape="circle" coords="350,362,10" href="index.php?place=kamae" alt="蒲江" onmouseover="changeAreaMapText('蒲江')" onmouseout="changeAreaMapText('')">
				
				<area shape="circle" coords="125,100,10" href="index.php?place=yabakei" alt="耶馬渓">
				<area shape="circle" coords="285,100,10" href="index.php?place=musashi" alt="武蔵">
				<area shape="circle" coords="40,177,10" href="index.php?place=hita" alt="日田">
				<area shape="circle" coords="260,198,10" href="index.php?place=oita" alt="大分">
				<area shape="circle" coords="338,192,10" href="index.php?place=saganoseki" alt="佐賀関">
				<area shape="circle" coords="28,230,10" href="index.php?place=tsubakigahana" alt="椿ヶ鼻">
				<area shape="circle" coords="310,245,10" href="index.php?place=usuki" alt="臼杵">
			</map>
		</div>
		<div class="data_area">
			<input type="radio" name="tab_name" id="tab_weather" checked>
			<label class="tab_class" for="tab_weather">天気予報</label>
			<div class="content_class">
				<center>
					<br>
					<button id="forecast_button" onclick="click_forecast()"></button>
					<dl id="forecast_table">
					</dl>
				</center>
			</div>
			
			<input type="radio" name="tab_name" id="tab_amedas" >
			<label class="tab_class" for="tab_amedas">アメダス</label>
			<div class="content_class">
				<center>
					<br>
					<dl id="amedas_table">
					</dl>
				</center>
			</div>
			
			<input type="radio" name="tab_name" id="tab_map" >
			<label class="tab_class" for="tab_map">マップ</label>
			<div class="content_class">
				<br>
				<center>
					<p id="map_content_length_p" class="line_margin viewmap_w">
						<span id="map_content_length"></span>
						<?php
							$viewallcomments=filter_input(INPUT_GET, 'view_all_comments');
							if(strlen($viewallcomments)==0)$viewallcomments='0';
							if(strcmp($viewallcomments,'0')!=0){
								$sql2 = null;
								$res2 = null;
								$sql2 = "SELECT COUNT(*) FROM comments";
								$res2 = $dbh->query($sql2);
								foreach( $res2 as $value ) {
									echo "/"."$value[0]";
								}
							}
						?>
					</p>
					<div id="map2"></div>
					<div id="map_info" class="viewmap_w">
						<h3>農地情報</h3>
						<div id="map_info_data">農地をタッチまたはクリックしてください</div>
					</div>
				</center>
			</div>
			
			<input type="radio" name="tab_name" id="tab_comment" >
			<label class="tab_class" for="tab_comment">コメント</label>
			<div class="content_class">
				<center>
					<br>
					<?php
						if($u_count==1){
							echo '
								<div id="autosave_text"></div>
								<p id="commenterror" class="font_red line_margin"></p>
								<br>
								<div id="map"></div>
								<div id="map_info">
									<p class="line_margin">
										<input type="button" value="一つ戻る" onclick="map_back();"/>
										<input type="button" value="消去" onclick="map_clear();"/>
									</p>
									<p class="line_margin">
										色の変更<input type="color" id="select_color" />
									</p>
									<p id="polygon_area" class="line_margin">0.00㎡</p>
									<form id="mapForm">
										コメント欄<br>
										<textarea id="formComment"></textarea>
										<br>
										<input type="button" value="登録" onclick="map_send();"/>
									</form>
								</div>';
						}
						else{
							echo "<a href='login.php'>ログインしてください</a><br>";
						}
					?>
				</center>
			</div>
			<div class="site_fooder">
				<div id="site_description">
					<h2>サイト概要</h2>
					<p class="site_description_p">本サイトは、大分県内の各地域の気温、降水量、風向、風速、日照時間、さらには天気予報までもが一目で確認できるお天気情報サイトです。また、お好きな農地にコメントをすることができ、それによって県内の農家の方々のコミュニケーションを支えます。</p>
					<p class="site_description_p">私たちのポリシーは、「万人が喜ぶ世界を作ろう」でございます。本サイトは、まったくの非営利でございますので、安心してお使いいただけます。また、本サイトはGUIに非常に優れておりますので、小さなお子様やご高齢の方でも特に問題なくお使いいただけるかと思います。</p>
					<p class="site_description_p">this site provides temperature, quantity of rain, wind direction, wind speed, sun time and weather forecasts in each regions of oita prefecture. and you can comment to places where you like,in this way we help communication of people in your prefecture.</p>
					<p class="site_description_p">our policy is "We make a world which all people were pleasured".this site is complete non-profit , so you can use safely. in addition , this site is superior to use GUI , therefore we think all people can use regardless of your old.</p>
					<p class="site_description_p">Author　Nakaoka</p>
				</div>
			</div>
		</div>
		<div id="site_up"><a href="#top"><img src="img/up.png" width="50px" height="50px"></a></div>
	</div>
</body>
</html>