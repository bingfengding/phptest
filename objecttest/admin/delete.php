<?php
    $con=mysqli_connect("localhost","root","","data_base") or die("连接失败");
    mysqli_query($con,"set names utf8");
    $oId=$_GET["id"];
    $delete = mysqli_query($con,"delete from project where proid=$oId");
    if($delete){
        header("location:admin.php");
    }else{
        echo "删除失败";
    }
    mysqli_free_result($result);
    mysqli_close($con);