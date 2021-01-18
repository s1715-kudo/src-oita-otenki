function getDay(str) {
	var dw=new Date (str).getDay();
	var list=["日","月","火","水","木","金","土"];
	return list[dw];
}

function getParam(name, url) {
	if (!url) url = window.location.href;
	name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function setKeyinit(key,value){
	var url_key=getParam(key);
	if(url_key==null)url_key=value;
	else if((typeof value)=="number")url_key=Number(url_key);
	return url_key;
}

function errorcodeString(e){
	switch(e){
		case "E0001":
			return "メールアドレスが不正です"
		break;
		
		case "E0002":
			return "別のユーザ名にしてください"
		break;
		
		case "E0003":
			return "パスワードが一致していません"
		break;
		
		case "E0004":
			return "64文字以内で入力してください"
		break;
		
		case "E0005":
			return "入力されていません"
		break;
		
		case "E1001":
			return "不正なログイン"
		break;
		
		default:
			return ""
		break;
	}
}
