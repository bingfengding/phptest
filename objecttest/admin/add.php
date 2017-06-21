<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            width: 500px;
            margin: 0 auto;
        }
        tr,td,th{
            margin: 0;
            padding: 1px 20px 1px 10px;
        }
        td div{
            display: inline-block;
            margin-left: 30%;
        }
        td input[type="text"]{
            width:300px;
        }
    </style>
</head>
<body>

<form action="#" method="post" onsubmit="return cheak()">
    <table>
        <tr><td colspan="2">添加商品:</td></tr>
        <tr>
            <td>商品名称:</td>
            <td><input type="text" name="proname" id="proname"></td>
        </tr>
        <tr>
            <td>商品规格:</td>
            <td><input type="text" name="prospec" id="prospec"></td>
        </tr>
        <tr>
            <td>商品价格:</td>
            <td><input type="text" name="promoney" id="promoney"></td>
        </tr>
        <tr>
            <td>库存量:</td>
            <td><input type="text" name="pronum" id="pronum"></td>
        </tr>
        <tr>
            <td>图片地址:</td>
            <td><input type="text" name="proimg" id="proimg"></td>
        </tr>
        <tr>
            <td>网址:</td>
            <td><input type="text" name="prourl" id="prourl"></td>
        </tr>
        <tr><td colspan="2">
                <div>
                    <input type="submit" value="确认添加" name="submit">
                    <input type="button" value="返回" id="return" onclick="fn1()">
                    <input type="button" value="刷新" onclick="fn2()">
                </div>
            </td></tr>
    </table>
</form>
<?php
if(isset($_POST["submit"])){ //post提交必须要表单参与，get提交比较灵活。
    $proname = $_POST["proname"];
    $prospec = $_POST["prospec"];
    $promoney = $_POST["promoney"];
    $pronum = $_POST["pronum"];
    $proimg = $_POST["proimg"];
    $prourl = $_POST["prourl"];
    $con=mysqli_connect('localhost',"root","","data_base") or die("连接失败");

    mysqli_query($con,"set names utf8");
    $result=mysqli_query($con,"select * from project");
    $sql="insert into project (proid,proname,prospec,`promoney`,pronum,proimg,prourl) values (null,'$proname','$prospec','$promoney','$pronum','$proimg','$prourl')";
    if(mysqli_query($con,$sql))
        header("location:admin.php");
    else
     die("添加商品失败");

    mysqli_free_result($result);
    mysqli_close($con);
}
?>
<script>
    var oProname = document.getElementById("proname"),
        oProspec = document.getElementById("prospec"),
        oPromoney = document.getElementById("promoney");
        oPronum = document.getElementById("pronum");

    function fn1() {
        //history.back();
        //location.replace("admin.php");//用新文档替换当前文档 ，因为被替换了所以无法点返回
        location.assign("admin.php");//加载新的文档
    }
    function fn2() {
        location.reload();//重新加载当前文档
    }
function cheak() {
    if(oProname.value==""){
        alert("商品名称不能为空");
        oProname.focus();
        return false;
    }
    if(oProspec.value==""){
        alert("商品规格不能为空");
        oProspec.focus();
        return false;
    }
    if(oPromoney.value=="" || isNaN(oPromoney.value)){
        alert("价格必须为数字");
        oPromoney.select();
        return false;
    }
    if(oPronum.value=="" || isNaN(oPronum.value) || oPronum.value.indexOf(".")+1){
        alert("库存量必须为正整数");
        oPronum.select();
        return false;
    }


}
</script>
</body>
</html>