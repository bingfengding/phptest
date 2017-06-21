<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;

        }
        table{
            border-collapse: collapse;
        }
        tr,td,th{
            border: 1px solid #cccccc;
            margin: 0;
            padding: 5px 20px 5px 10px;
        }
        td{
            height: 40px;
        }
        ul,li{
            list-style: none;
        }
        ul{
            display: inline-block;
            margin-top: 20px;
            vertical-align: middle;
        }
        li{
            float: left;
            width: 40px;
            line-height: 40px;
            height: 40px;
            text-align: center;
            font-size: 20px;
            border: 1px solid #cccccc;
            cursor:pointer;
        }
        li:hover{
            border: 1px solid #00ee00;
        }
        a{
            text-decoration: none;
            display: inline-block;
            height: 40px;
            border: 1px solid #cccccc;
            line-height: 40px;
            padding: 0 5px;
            color: black;
            vertical-align: middle;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php
    $con=mysqli_connect("localhost","root","","data_base");
    @$con or die("连接服务器失败");
    mysqli_query($con,"set names utf8");
$pagesize=10;

//$num = mysqli_num_rows($result);
$rs=mysqli_query($con,"select count(*) from project");//一行一列的记录数量
$rows=mysqli_fetch_row($rs);//转换为数组
$num=$rows[0];//获取记录数
$pagecount=ceil($num/$pagesize);

//展示表单
if(isset($_GET["pagenow"])){
    $pagenow = $_GET["pagenow"];
    $pagestate=($pagenow-1)*$pagesize;
    $sql="select * from project ORDER BY proid DESC LIMIT "."$pagestate,$pagesize";

}else{
    $sql="select * from project ORDER BY proid DESC LIMIT 0,10";
}
$result=mysqli_query($con,$sql);

?>
<p><a href="./add.php">添加商品</a></p>
<table>
    <tr>
        <th>编号</th>
        <th>商品名称</th>
        <th>规格</th>
        <th>价格</th>
        <th>库存量</th>
        <th>图片</th>
        <th>网址</th>
        <th>修改</th>
        <th>删除</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td>",$row["proid"],"</td>";
        echo "<td>",$row["proname"],"</td>";
        echo "<td>",$row["prospec"],"</td>";
        echo "<td>",$row["promoney"],"</td>";
        echo "<td>",$row["pronum"],"</td>";
        echo $row["proimg"]=="图片暂缺"||$row["proimg"]==""? "<td>图片暂缺</td>":"<td><img src='../".$row["proimg"]."'></td>";
        echo "<td>",$row["prourl"],"</td>";
        echo"<td>","<input type='button' value='修改' onclick='location.href=\"modify.php?id=".$row["proid"]."\"'>","</td>";
        echo"<td>","<input type='button' value='删除' onclick=jump(".$row['proid'].")>","</td>";
        echo "</tr>";
    }
    ?>
</table>
<a href="admin.php">首页</a>
<a href=<?php
if(!isset($_GET['pagenow'])||$pagenow==1){
    echo "admin.php?pagenow=1";
}else{
    echo "admin.php?pagenow=".($pagenow-1);
}

?>>上一页</a>
<a href=<?php
if(!isset($_GET['pagenow']) && $pagecount==1){
    echo "admin.php?pagenow=1";
}elseif(!isset($_GET['pagenow']) && $pagecount>1){
    echo "admin.php?pagenow=2";
}elseif(isset($_GET['pagenow'])&&$pagenow==$pagecount){
    echo "admin.php?pagenow=".$pagecount;
}else{
    echo "admin.php?pagenow=".($pagenow+1);
}

?>>下一页</a>
<a href=<?php

    echo "admin.php?pagenow=".$pagecount;

?>>末页</a>
<ul>
    <?php
    for ($i=1;$i<=$pagecount;$i++){
        echo "<li onclick='location.href=\"admin.php?pagenow=$i\"'>".$i."</li>";
    }
    ?>
</ul>

<?php
mysqli_free_result($result);
mysqli_close($con);
?>
<script>
    function jump(id) {
        if(confirm("是否确定删除？")){
            location.href="delete.php?id="+id;
        }
    }
</script>
</body>
</html>