function floginbox(width){
	$.ajax({
		type: 'post',
		url: "login-box.php",
		success: function(result){
			var insert="";
			var resultl=result.split(',');
			
			var m1="";
			var m2="";
			if(resultl[0]=="1"){
				m1+="<a href='account.php'>"+resultl[1]+"</a></p>";
				m2+="<a href='logout.php'>ログアウト</a></p>";
			}
			else{
				m1+="<a href='login.php'>ログイン</a></p>";
				m2+="<a href='signup.php'>新規登録</a></p>";
			}
			document.getElementById('menuline1').innerHTML=m1;
			document.getElementById('menuline2').innerHTML=m2;
			
			if(width>900){
				if(resultl[0]=="1"){
					insert+="<p class='line_margin accountlink'><a href='account.php'>"+resultl[1]+"</a></p>";
					insert+="<p class='line_margin'><a href='logout.php' class='btn btn--blue btn--emboss btn--cubic'>ログアウト</a></p>";
				}
				else{
					insert+="<p class='line_margin'><a href='login.php' class='btn btn--blue btn--emboss btn--cubic'>ログイン</a></p>";
					insert+="<p class='line_margin'><a href='signup.php' class='btn btn--blue btn--emboss btn--cubic'>新規登録</a></p>";
				}
				$('.hamburger').hide();
				$('.globalMenuSp').hide();
			}
			else{
				$('.hamburger').show();
				$('.globalMenuSp').show();
			}
			document.getElementById('login_box').innerHTML=insert;
			
		}
	});
}

$(function() {
	$('.hamburger').click(function() {
		$(this).toggleClass('active');
		if ($(this).hasClass('active')) {
			$('.globalMenuSp').addClass('active');
		} else {
			$('.globalMenuSp').removeClass('active');
		}
	});
});