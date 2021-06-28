<html lang="en">
  <head>
  <link rel="stylesheet" href="Cstyle.css">
    <meta charset="UTF-8">
    <title>客人資料更新</title>
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
        }
  </style>
   <body>
    <?php
session_start();
session_unset();
session_destroy();
?>
<?php
session_start();
    $customerID = $_POST["customerID"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $birth = $_POST["birth"];
    $sex = $_POST["sex"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $contact_name = $_POST["contact_name"];
    $contact_phone = $_POST["contact_phone"];
    $email = $_POST["email"];

    $link = mysqli_connect("localhost","root","","hotel")
            or die("無法開啟MySQL資料庫連接!<br/>");
            //送出UTF8編碼的MySQL指令
    mysqli_query($link, 'SET NAMES utf8'); 

    $sql = "UPDATE 客人 SET 名字 = '$name', 密碼 = '$password', email = '$email', 生日 = '$birth', 住家地址 = '$address', 緊急聯絡人姓名='$contact_name', 緊急聯絡人電話='$contact_phone', 電話='$phone' WHERE 客人ID = '$customerID'";

    if ($link->query($sql) === TRUE) {
      echo '<div align=center>'; 
      echo "<h1><font color= #FF7575>New record updated successfully<br>點擊跳轉回登入頁面</h1></font><br></div>";
      echo '<div align=center><button><a href="room_login.php">重新登入</a></button></div>';
      //header("Location: login.html");
    } else {
         echo '<div align=center>'; 
        echo "<h1><font color= #FF7575>註冊失敗</h1></div>";
        echo "Error: " . $sql . "<br>" . $link->error;
    }
    $link->close();
?>

   </body>

