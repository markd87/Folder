<?php

require_once('functions.php');

$tagname=$_POST['tagname'];

$query="SELECT u.* FROM urls u, tags t WHERE u.id = t.url_id AND t.tag='{$tagname}';";

echo display_urls_with_query($query);

?>