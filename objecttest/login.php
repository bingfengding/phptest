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

<form action="" method="post" name="form">
    <span>账号:</span><input type="text" name="user">
    <span>密码:</span><input type="password" name="pwd">
    <input type="submit" value="登录" name="submit">
</form>
<?php
if(isset($_POST["submit"])){
    $user=$_POST["user"];
    $pwd=$_POST["pwd"];
    $con=mysqli_connect("localhost","root","","data_base");
    mysqli_query($con,"set names utf8");
    $sql="select * from `user` WHERE `users`='$user' and `password`='$pwd'";
    $sql_admin="select * from adminuser WHERE adminuser ='$user' and  adminpwd ='$pwd'";
    $result=mysqli_query($con,$sql);
    $result_admin=mysqli_query($con,$sql_admin);
    if(mysqli_num_rows($result)){
        //echo "登录成功";
        //php用header头跳转，语法:header('location:url地址');
        header('location:showshop.php');
    }elseif(mysqli_num_rows($result_admin)){
        header('location:./admin/admin.php');
    }
    else{
        echo "您的账号或密码有误";
    }
    //$result=mysqli_query($con,"select * from `user` ");
    /*$sure=0;
    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        if($user==$row["users"] and $pwd==$row["password"]){
            $sure=1;
            break;
        }
    }
    if(!$sure){
        echo "您的账号或密码错误";
    }else{
        echo "登录成功";
    }*/
}
?>
</body>
</html>