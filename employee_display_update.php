
<html lang="en">
  <head>
  <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>資料修改</title>
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
   <body><?php
session_start();
    $employeeID = $_POST["employeeID"];
    $name = $_POST["name"];
    $birth = $_POST["birth"];
    $sex = $_POST["sex"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $班別 = $_POST["shift"];
    $department = $_POST["department"];
    $position = $_POST["position"]; 
    $password = $_POST["password"];

    $link = mysqli_connect("localhost","root","","hotel")
            or die("無法開啟MySQL資料庫連接!<br/>");
            //送出UTF8編碼的MySQL指令
    mysqli_query($link, 'SET NAMES utf8'); 

    $sql = "UPDATE 員工 SET 員工姓名 = '".$name."', 密碼 = '".$password."',  生日 = '".$birth."', 住家地址 = '".$address."', 電話='".$phone."' WHERE 員工ID = '".$employeeID."'";

    if ($link->query($sql) === TRUE) {
      echo '<div align=center>'; 
      echo '<h1><font color= #FF7575>New record updated successfully<br>點擊跳轉回登入頁面</h1></font><br></div>';
      echo '<div align=center><button><a href="employee_login.html">重新登入</a></button></div>';
      //header("Location: login.html");
    } else {
        echo '<div align=center>'; 
        echo '<h1><font color= #FF7575>修改失敗！QQ</h1></font><br></div>';
        echo '<div align=center><button><a href="employee_display.php">重新修改</a></button></div>';
        echo "Error: " . $sql . "<br>" . $link->error;
    }
    $link->close();
?>

   </body>