<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>登出成功囉！</title>
  </head>
  <style>
  		a{


  			font-size: 16px;
  			color:#FFffff;
      		text-decoration:none;
      font-weight:bold;

  		}
  		a:hover{
  			color:hsl(350, 100%, 88%);
-
  		}


  </style>
   <body>
   	
   		<div align="center"><h1><font color= #FF7575>登出成功！</h1><br><button><a href="entrance.html" >回官網首頁</font></a></button></div>

   </body>