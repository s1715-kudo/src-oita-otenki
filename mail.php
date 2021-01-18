<?php
	exec("export LANG=ja_JP.UTF-8");
	
	function signupmailsend($getmail,$securityid){
		exec ("python ".__DIR__."/signupsend.py ".$getmail." ".$securityid);
	}
	
	function signupconfirmmailsend($getmail){
		exec ("python ".__DIR__."/signupconfirmsend.py ".$getmail);
	}
?>