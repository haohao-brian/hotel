<html lang="en">
  <head>
  <link rel="stylesheet" href="Cstyle.css">
    <meta charset="UTF-8">
    <title>客人註冊</title>
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
    $name = $_POST["name"];
    $password = $_POST["password"];
    $birth = $_POST["birth"];
    $sex = $_POST["sex"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $contact_name = $_POST["contact_name"];
    $contact_phone = $_POST["contact_phone"];
    $email = $_POST["email"];

    $db_link = mysqli_connect("localhost","root","","hotel") or die("die".mysql_error());
    $select_db = mysqli_select_db($db_link,'hotel');
    $sql = "SELECT * FROM 客人 WHERE email='".$email."'";
    $result = mysqli_query($db_link, $sql);
    $total_records = mysqli_num_rows($result);//取得資料筆數
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    if ($total_records!=null){
      $message = '您的Email已經註冊過了喔！';
      echo "<SCRIPT> //not showing me this
        alert('$message')
        window.location.replace('room_register.html');
      </SCRIPT>";
    }else {
      $link = mysqli_connect("localhost","root","","hotel")
            or die("無法開啟MySQL資料庫連接!<br/>");
      mysqli_query($link, 'SET NAMES utf8'); 
      $sql = "INSERT INTO 客人 (名字, 密碼, 生日, 性別, 住家地址, 電話, 緊急聯絡人姓名,緊急聯絡人電話, email)
      VALUES ('$name', '$password', '$birth', '$sex', '$address', '$phone', '$contact_name', '$contact_phone', '$email')";

      if ($link->query($sql) === TRUE) {
        echo '<div align=center>'; 
        echo "<h1><font color= #FF7575>New record created successfully<br>點擊跳轉回登入頁面</h1></font><br></div>";
        echo '<div align=center><button><a href="entrance.html" >回官網首頁</a></button></div>';
        //header("Location: login.html");
      } else {
         echo '<div align=center>'; 
        echo "<h1><font color= #FF7575>註冊失敗</h1></div>";
        echo "Error: " . $sql . "<br>" . $link->error;
      }
    }
    $link->close();
?>
   </body>