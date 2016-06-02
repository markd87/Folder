<?php

 error_reporting(E_ALL); ini_set('display_errors', 1); 

require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title></title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    
  <style>
  ol{
    margin:0;
    padding:0;
  }
  .main{
    border-bottom:1px dotted #ccc;
  }

  button#add{
    margin-top:10px;
  }

  div#links{
    margin-top:30px;
  }

  a.tag{
    color: sandybrown;
    text-decoration: none;
  }

  a.tag:hover{
    text-decoration: none;
  }

  p.small{
    font-size:14px;
  }

  ul#url_list li{
    border-bottom: 1px dashed #ccc;
  }

  ul#url_list{
    list-style-type: none;
    padding-left: 0;
  }

  div#tags_div span.brown{
    color:sandybrown;
  }

  div#add_btn{
    margin-top:2em;
  }

  div.addform{
    display: none;
    margin-bottom: 3px;
  }

  span.time{
    color:gray;
  }

  div.centered{
    text-align: center;
  }

  div#title{
    background-image: url("folder.png");
    background-repeat: no-repeat;
    background-size: 43px;
    background-position: 135px 20px;
  }
  </style>  

  </head>
  <body>
    <div class="container main">
      <div class='row'>
        <div class="col-xs-11" id='title'>
          <h1>Folder</h1>
          <p class="lead">Links for later read and reference</p>
        </div>
      <div class='col-xs-1' id='add_btn'>
        <button type="button" class='btn btn-info btn-lg' name="submit" id="add">+</button>
      </div>
    </div>
      <div class='addform'>
        <form action='add.php' method='POST' id='add_form'>
            <div class='row'>
              <div class='col-xs-4'>
                <label for="url">URL</label>
                <input type="text" class="form-control" name="urlinput" placeholder="Enter URL" >
              </div>
              <div class='col-xs-3'>
                <label for="tags">Tags</label>
                <input type="text" class="form-control" name="tagsinput" placeholder="Enter comma separated tags">
              </div>
                <div class='col-xs-3'>
                  <label for="desc">Description</label>
                  <textarea class="form-control" name="descinput" rows="3" placeholder="Write a short descritption"></textarea>
                </div>
                <div class='col-xs-2'>
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="passinput" placeholder="Password">
                </div>
                </div>
                  <div class='row'>
                    <div class='col-xs-2'>
                      <button class='btn btn-success btn-sm' id='submit' type='submit'>Add</button>
                    </div>
                  </div>
            </div>
        </form>
          <div class='row col-sm-12 centered'>
              <div id='status'></div>
          </div>
            <div class='row col-xs-14' style='text-align:right; margin:0px; padding:0px;'>
                <a href='http://www.markdanovich.com'>Mark Danovich</a>, on <a href='https://github.com/markd87/Folder'>GitHub</a>
            </div>
      </div>
    </div>

    <div class="container">
      <div class="row" id='links'>
        <div class="col-sm-8" id="output">
          <ul id='url_list'>
              <?php
                echo display_urls();
              ?>
          </ol>
        </div>

        <div class="col-sm-4">
          <span class='lead'>Tags</span><br/>
          <div id='tags_div'>
          <?php 
              echo display_tags();
          ?>
        </div>
        </div>
    </div>
  </div>



  
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.js"></script>
<script type="text/javascript" src="main.js"></script>


  </body>

</html>