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
<?php
/*
修改虚拟目录：
打开Apache下的 conf/httpd.conf  DocumentRoot "${INSTALL_DIR}/www"  双引号里面修改虚拟目录地址  例如 “C:/www”  这个修改是制定虚拟目录位置

<Directory "${INSTALL_DIR}/www/">  双信号修改为上面对应的  ，这个修改是给对应地址给予访问权限

修改指定默认打开的文件


<IfModule dir_module>
    DirectoryIndex index.php index.php3 index.html index.htm
</IfModule>


讲需要被索引服务默认打开的文件类型添加进去，直接输入对应地址就会打开指定文件，而不需要再地址里面添加对应文件名


修改端口：
Listen 0.0.0.0:80   修改80就好，例如Listen 0.0.0.0:8080


最近的dns解析服务器再本机的 C:\Windows\System32\drivers\etc\hosts


一个Apache支持多个网站，是从浏览器角度的看起来，每个网站都是独立主机。称之为虚拟主机

配置虚拟主机：
Apache下的 httpd.conf


# Virtual hosts
Include conf/extra/httpd-vhosts.conf  //确认该行前面没警号依照文件提示去修改  httpd-vhosts.conf


再后面的配置文件中依照例子进行修改即可。

C:\Windows\System32\drivers\etc\hosts 下去添加对应的域名为本机







*/

?>
</body>
</html>