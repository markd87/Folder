<?php
 error_reporting(E_ALL); ini_set('display_errors', 1); 

require_once('configi.php');
require_once('functions.php');

$url=$_POST['url'];
$description=$_POST['description'];
$tags=$_POST['tag'];
$pass=$_POST['password'];

$arr=array();
if (md5($pass)=='e6b0b3e7caac6c46df2b09f6214aa312'){
	$query="INSERT INTO urls(url, description) VALUES('{$url}','{$description}')";
	$mysqli->query($query);
	$lastid=$mysqli->insert_id;
	$tags_arr=explode(",",trim($tags));
	foreach ($tags_arr as $tag){
		$query="INSERT INTO tags(tag, url_id) VALUES('{$tag}','{$lastid}')";
		$mysqli->query($query);
	};	
	$urls=display_urls();
	$tags=display_tags();
	$arr=array($urls,$tags);
	echo json_encode($arr);
} else {
	$arr=array('bad');
	echo json_encode($arr);
};

?>