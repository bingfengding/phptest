<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        span{
            display: inline-block;
            border: 1px solid #cccccc;
            width: 100px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php
    $max = 0;
    $account = 0;
    $num=[10,20,35,11,45,31,50,32,18];
    foreach ($num as $index=>$value){
        echo "$index:$value","<br>";
        $max=$num[$index]>$max?$num[$index]:$max;
        $account+= $value;
    }
echo $max;
echo "<br>";
echo $account;
echo "<br>";
echo max(3,2);
echo "<br>";
echo count($num);
?>

<form action="" method="post" name="form">
    <h2>求阶层</h2>
    <span>请输入1个正整数：</span><input type="text" name="num">
    <input type="submit" value="提交" name="button">
</form>
<?php
if(isset($_POST["num"])){
    $numOne = $_POST["num"]+0;
    $oAccount = 1;
    if($numOne=="" || !is_int($numOne) || $numOne < 0){
        echo "请输入1个正整数";
    }else{
        $numOne += 0;
        for ($i=1;$i<=$numOne;$i++){
            $oAccount *= $i;
        }
        echo $oAccount;
    }
}
?>
<form action="" method="post" name="form2">
    <h2>水仙花数</h2>
    <span>请输入 n位正整数(n≥3)：</span><input type="text" name="num2">
    <input type="submit" value="提交" name="button2">
    <br>
</form>
<?php
if(isset($_POST["button2"])){
    $num2 = $_POST["num2"];
    if ($num2==""|| is_int($num2) ||$num2<100){
        echo "请输入3位或以上的正整数";
    }else{
        $num_arr= str_split($num2);
        $oLength =count($num_arr);
        $result=0;
        //var_dump($num_arr);
        //echo $oLength;
        foreach ($num_arr as $index=>$value){
            if($num_arr[$index]==0){
                echo "请确认数字内不能为0";
                break;
            }else{
                $result+=pow($num_arr[$index],3);
            }
        }
        $num2+=0;
        if($result==$num2){
            echo $num2,"是水仙花数";
        }else{
            echo $num2,"不是水仙花数";
        };
    }
}
?>

<br>
<hr>
<br>

<?php
    for($i=1;$i<=9;$i++){
        for ($j=1;$j<=$i;$j++){
            echo "<span>".$j."*".$i."=".($i*$j)."</span>";
        }
        echo "<br>";
    }
?>
</body>
</html>