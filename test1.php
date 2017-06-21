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
    $cn=89;
    $math=99;
    echo $cn>=90 && $math >=90 ? "你是三好学生":"你不是好孩子";
    for($i=1;$i<10;$i+=2){
        echo "$i:锄禾日当午";
    }
    echo "<br>";
    $arr = ["tom","berry","jar","rose"];
foreach ($arr as $key=>$value){
    echo "$key:$value","<br>";
}
$sun=0;
for($i=1;$i<=100;$i++){
    $sun += $i;
}
echo $sun,"<br>";

function show(){
    echo "I is a boy","<br>";
}
show();
show();
?>
</body>
</html>