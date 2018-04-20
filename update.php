<?php
include_once('C:/xampp/htdocs/WP/wordpress/wp-content/plugins/valid/symbiota/config/symbini.php');

include_once('C:/xampp/htdocs/WP/wordpress/wp-content/plugins/valid/symbiota/classes/ProfileManager.php');


//include_once($SERVER_ROOT.'/classes/ProfileManager.php');

$login = array_key_exists('login',$_POST)?$_POST['login']:'';
$emailAddr = array_key_exists('emailaddr',$_POST)?$_POST['emailaddr']:'';
$action = array_key_exists("submit",$_REQUEST)?$_REQUEST["submit"]:'';
echo ($login);
echo ($action);
$pHandler = new ProfileManager();
$displayStr = '';

//Sanitation
if($login){
	if(!$pHandler->setUserName($login)){
		$login = '';
		$displayStr = 'Invalid login name';
	}
}
if($emailAddr){
	if(!$pHandler->validateEmailAddress($emailAddr)){
		$emailAddr = '';
		$displayStr = 'Invalid login name';
	}
}
if($action && !preg_match('/^[a-zA-Z0-9\s_]+$/',$action)) $action = '';


if($action == "Create Login"){
	$okToCreateLogin = true;
	if($okToCreateLogin){
		if($pHandler->checkLogin($emailAddr)){
			echo ("Entered Checklogin<br>");
			if($pHandler->register($_POST)){
				echo ("Entered Register<br>");
				header("Location: ../valid/symbiota/index.php");
			}
			else{
				$displayStr = 'FAILED: Unable to create user.<div style="margin-left:55px;">Please contact system administrator for assistance.</div>';
			}
		}
		else{
			$displayStr = $pHandler->getErrorStr();
		}
	}
}

?>