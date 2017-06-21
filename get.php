<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a href="receive.php?name=李白&age=30">跳转</a>
<input type="button" value="跳转" onclick="location.href='receive.php'">
<?php
    //get传递，在url后面通过？来传递参数
?>
</body>
</html>