<?php

	require_once("configi.php");

	function get_urls(){
    global $mysqli;
		$query="SELECT * FROM urls ORDER by time DESC";
		return $mysqli->query($query);
	}

	function get_tags(){
    	global $mysqli;
		$query="SELECT DISTINCT(tag) AS tag FROM tags";
		return $mysqli->query($query);
	}

	function display_urls(){
     global $mysqli;
		 $results=get_urls();
		 $out='';
         while ($url=mysqli_fetch_array($results)) {
                $id=$url['id'];
                $query="SELECT t.tag FROM tags t WHERE url_id={$id};";
                $tagnames=$mysqli->query($query);
                $tagout=" ";
                $out.= "<li> <a href='{$url['url']}' target='_blank'>{$url['url']}</a>";
                $out.="<br/><span class='lead small'>{$url['description']}</span><br/>";
                #echo $explode(',',$tags);
                while ($tag=mysqli_fetch_array($tagnames)){
                  $tagout.="<a href='#' class='tag lead small' id='{$tag['tag']}'>{$tag['tag']}</a> ";
        		};
                $out.=$tagout;
                $out.="<br/> <span class='time small'>{$url['time']}</span>";
		}
		return $out;
	}

	function display_urls_with_query($query){
     global $mysqli;
		 $results=$mysqli->query($query);
		 $out='';
         while ($url=mysqli_fetch_array($results)) {
                $id=$url['id'];
                $query="SELECT t.tag FROM tags t WHERE url_id={$id};";
                $tagnames=$mysqli->query($query);;
                $tagout=" ";
                $out.= "<li> <a href='{$url['url']}' target='_blank'>{$url['url']}</a>";
                $out.="<br/><span class='lead small'>{$url['description']}</span><br/>";
                #echo $explode(',',$tags);
                while ($tag=mysqli_fetch_array($tagnames)){
                  $tagout.="<a href='#' class='tag lead small' id='{$tag['tag']}'>{$tag['tag']}</a> ";
        		};
                $out.=$tagout;
                $out.="<br/> <span class='time small'>{$url['time']}</span>";
		}
		return $out;
	}

  function display_tags(){
    
      $results=get_tags();
      $out="";
      while ($tag=mysqli_fetch_array($results)) {
        $out.="<a href='#' class='tag lead small' id='{$tag['tag']}'>{$tag['tag']}</a>". " ";
      }
      return $out;
  }


?>