<html lang="en">
  <head>
  <link rel="stylesheet" href="CDISstyle.css">
    <meta charset="UTF-8">
    <title>客人訂房</title>
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
<?php
session_start();
    $in_time = $_POST["in_time"];
    $out_time = $_POST["out_time"];
    $number = $_SESSION["number"];
    $customerID = $_SESSION["customerID"];
    $roomID = $_POST["roomID"];

    date_default_timezone_set('Asia/Hong_Kong');
    $date = date('Y-m-d H:i');
    $date = str_replace(' ','T',$date);
    //echo $date;
    //echo $in_time;
    $dateTimestamp_in = strtotime($in_time);
    $dateTimestamp_out = strtotime($out_time);
    $dateTimestamp_now = strtotime($date);
    if (($dateTimestamp_in<=$dateTimestamp_now) || ($dateTimestamp_out<=$dateTimestamp_now)){
      $date = str_replace('T',' ',$date);
      $message = '訂房資訊錯誤，訂房日期必須在  今天('.$date.')  之後喔！';
      echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('room_status.php');
      </SCRIPT>";

      //echo "<script type='text/javascript'>alert('訂房資訊錯誤，訂房日期必須在現在時間(".$date.")之後喔！');</script>";
      //header("Location: room_status.php");
    }else{
      $link = mysqli_connect("localhost","root","","hotel")
            or die("無法開啟MySQL資料庫連接!<br/>");
            //送出UTF8編碼的MySQL指令
    mysqli_query($link, 'SET NAMES utf8'); 

    $sql = "INSERT INTO 訂單 (房間ID, 客人ID, Check_in_時間, Check_out_時間)
    VALUES ('$roomID', '$customerID', '$in_time', '$out_time')";

    if ($link->query($sql) === TRUE) {
      echo '<div align=center>'; 
      echo "<h1><font color= #FF7575>恭喜您，訂房成功囉！</h1></font><br></div>";
      echo '<div align=center><button><a href="room_status.php" >查看訂房資訊</a></button></div>';
      //header("Location: login.html");
    } else {
        echo '<div align=center>'; 
        echo "<h1><font color= #FF7575>訂房失敗</h1></div>";
        echo "Error: " . $sql . "<br>" . $link->error;
    }
    $link->close();
    }
    
?>
   </body>
   </html>