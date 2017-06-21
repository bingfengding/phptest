<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        textarea{
            font-size: 16px;
            width: 800px;
        }
    </style>
</head>
<body>
<textarea name="content" id="" cols="30" rows="10">
    项目中，php充当MySQL数据库的客户端，通过PHP连接数据库并操作数据库。
    本身PHP是一个框架，是通过PHP的扩展进行连接的。
    php.ini 里面的 extension=php_mysql.dll  前面有分号表示没开启，没就表示开启了。开启之后可以使用mysql函数

    php其操作数据库流程与cmd非常类似。只是使用的函数不同。
    建议使用mysqli，而不是mysql，
    创建数据库

    通过phpMyAdmin新建1个数据库，自己创建内容或导入外部数据。

    连接数据库

    通过函数 mysqli_connect ,相当于在cmd里面执行了mysql -u root 这种

    选择数据库




</textarea>
<br>
<?php

//连接数据库
 /* $con= mysqli_connect("localhost","root","","data_base");
    //var_dump($con);
  if(!$con){ //PHP中有值就为真，null为假
      die("连接错误".mysqli_connect_error());//die() 函数输出一条消息，并退出当前脚本。
  }else{
      echo "连接成功";
  }*/
//简化
//$con=mysqli_connect("localhost","root","") or die("连接错误".mysqli_connect_error());
$con=mysqli_connect("localhost","root","","data_base");
@$con or die("连接错误");//加@符号，屏蔽错误信息，防止信息泄露

//设置mysql客服端的字符编码
mysqli_query($con,"SET NAMES 'utf8'");

//选择数据库
//可以直接在连接的时候讲数据库放在最后的位置，如果不放进去也可以再连接，也可以修改为其他数据库。

//mysqli_select_db($con,"data_base") or die("数据库选择失败");
//查询表信息
$result = mysqli_query($con,"select * from school ORDER BY schid");//类型是资源类型，无法通过foreach遍历

echo mysqli_num_rows($result);//获取记录数
echo "<br>";
//修改数据库
mysqli_query($con,"update school set schscore=76 where schid=9");//修改表school的内容，里面代码与使用cmd的sql一致。


//var_dump($result);

//var_dump(mysqli_fetch_all($result,MYSQLI_NUM));//从结果集中取得所有行作为关联数组
//MYSQLI_ASSOC  以键值对即关联数组的形式
//MYSQLI_NUM    以普通数组的形式
//MYSQLI_BOTH   二者都有

while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){//键值对
    printf ("%s : %s",$row["schid"],$row["schname"]);
    echo "<br>";

}


while ($row=mysqli_fetch_array($result,MYSQLI_NUM)) {//索引数组
    printf("%s : %s", $row[2], $row[3]);
    echo "<br>";
}
while ($row=mysqli_fetch_row($result)) {//从结果集中取得一行，并作为索引数组返回
    printf("%s : %s", $row[4], $row[5]);
    echo "<br>";
}


mysqli_free_result($result); //释放资源



//关闭连接
mysqli_close($con);


?>
</body>
</html>