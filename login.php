<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
    <title> Login Page   </title>
</head>
<body>
<form method="post" id="loginform" >
    <input type="text" name="user"  placeholder="UserName...">
    <span id="eruser"></span>
    <br><br>
    <input type="password" name="pass" placeholder="PassWord...">
    <span id="erpass"></span>
    <br><br>
    <input type="submit" name="login" value="LOGIN">
    <span id="valid"></span>
</form>
    <script src="jquery.min.js" ></script>
    <script src="login.js"></script>
</body>
</html>