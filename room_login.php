<?php
session_start();
//echo $_SESSION["email"];
//echo isset($_SESSION["email"]);

if (isset($_SESSION["email"])){
  header("Location: room_display.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="Cstyle.css">
    <meta charset="UTF-8">
    <title>客人登入</title>
  </head>
  <body>

<div id="navigation" class="slide-right" style="position: absolute; top: 100px; left:0px;">
        <h2 align="center"><font color= #FF7575 >目錄</font></h2>
    <ul class="sidebar-nav">
        <li class="borderFade"><a href="entrance.html">回首頁</a></li>
        <li class="borderFade"><a href="room_introduction.html">房型介紹</a></li>
        <li class="borderFade"><a href="room_register.html">客人註冊</a></li>
        <li class="borderFade"><a href="room_login.php">客人登入</a></li>
        <li class="borderFade"><a href="employee_login.html">員工登入</a></li>
        <li class="borderFade"><a href="logout.php">帳號登出</a></li>
    </ul></div>

  <div class="slide-right" style="width:225px;height:210px;border:0px white dashed;position: absolute; bottom: 270px; right:380px;">
    <div style="position: absolute; bottom: 50px; top:80px; left:6px;">
    <form name="login" action="room_display.php" method="post">
      <table align="center" bgcolor="transparent" class="table" >
        <tr>
          <td><font size="2" ><font color="red";>*</font></b>email:</font></td>
        </tr><tr>
          <td width="100%"><input type="text" name="email" required><span></span></td>
        </tr>
        <tr>
          <td><font size="2" ><font color="red";>*</font>密碼:</font></td>
        </tr><tr>
        <tr>
          <td width="100%"><input type="password" name="password" required><span></span></td>
        </tr>
        <td></td>
        <tr>
          <td colspan="2" ><div align="right"><button><input type="submit" value="客人登入"></button></div></td>
        </tr>
        <!--
        <tr>
          <td colspan="2" ><div align="left"><a href="room_register.php"><button>註冊帳號</a></button></div></td>
        </tr>
      -->
      </table>
    </form></div></div>
  </body>
</html>