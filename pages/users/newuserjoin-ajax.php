<?php 
if(!defined('ABSPATH'))
	define('ABSPATH', dirname(dirname(dirname(__FILE__))));
require ABSPATH.'/setting.php';
header("Content-type:application/json; charset=UTF-8");

global $mydb;
$data=null;
$errorsinfo=null;

//加入成员
if($_POST['mode']==3){	
	$mydb->update_user_gid($_POST['user_name'],$_POST['user_gname']);
	$errorsinfo=$mydb->__get('last_errors');
}
//踢出成员
if($_POST['mode']==4) {
	$mydb->clear_user_gid($_POST['user_name']);
	$errorsinfo=$mydb->__get('last_errors');
}

$jsonpre=array('data'=>$data,'errorsinfo'=>$errorsinfo);
$json=json_encode($jsonpre);
echo $json;
?>