<?php
 error_reporting(E_ALL); ini_set('display_errors', 1); 

require_once('configi.php');
require_once('functions.php');

$url=$_POST['url'];
//$url=mysql_real_escape_string($url);
$description=$mysqli->real_escape_string($_POST['description']);
$tags=$mysqli->real_escape_string($_POST['tag']);
$pass=$_POST['password'];

$query="SELECT pass FROM users WHERE user='markd'";
$res=$mysqli->query($query);
$res_arr=mysqli_fetch_array($res);
$real_pass=$res_arr['pass'];

$arr=array();
if (hash('sha256',$pass)==$real_pass){
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