<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="Cstyle.css">
    <meta charset="UTF-8">
    <title>退房成功囉！</title>
  </head>
  <style>
      a{
        font-size: 16px;
        color:#FFffff;
      font-weight:bold;
        text-decoration:none;
      }
      a:hover{
        color:hsl(350, 100%, 88%);

      }

  </style>
   <body>
    <!--
      <div align="center"><h1><font color= #FF7575>登出成功！<br><a href="entrance.html" >♥ 回首頁 ♥</font></a></h1></div>
--><?php
session_start();
    $reportID = $_POST["reportID"];

    $link = mysqli_connect("localhost","root","","hotel")
            or die("無法開啟MySQL資料庫連接!<br/>");
            //送出UTF8編碼的MySQL指令
    mysqli_query($link, 'SET NAMES utf8'); 

    $sql = "DELETE FROM 訂單 WHERE 訂單ID='".$reportID."'";

    if ($link->query($sql) === TRUE) {
      echo '<div align=center>'; 
      echo "<h1><font color= #FF7575>好的，我們已經幫您退房。<br>";
      echo "有任何問題歡迎來電客服：(06)0487087</h1></font><br></div>";
      echo '<div align=center>'; 
      echo '<button><a href="room_status.php" >看房間資訊</a></button>&nbsp;&nbsp;';
      echo '<button><a href="entrance.html" >回官網首頁</a></button></div>';
      //header("Location: login.html");
    } else {
        echo "註冊失敗";
        echo "Error: " . $sql . "<br>" . $link->error;
    }
    $link->close();
?>

   </body>