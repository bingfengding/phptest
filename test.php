<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
    <?php
        echo "我是谁？<br>";
    //单行注释；
    #单行注释；
    /*
     多行注释
    四种风格
    标准风格
        <?php
        //1标准风格
    ?>
        //2短标记风格

    <?
        //默认情况是不支持的，需要在PHP的配置文件内（php.ini）找到 short_open_tag = Off  改成  = On
    ?>
        //3ASP风格
        <%
        //默认不支持，在配置文件内（php.ini）找到asp_tags = Off 改成 = On
    %>
        //script标记风格
        <script language="php">
                echo "script 风格";
            </script>
        //php语句以分号结束，
    //php的关键字不区分大小写，例如 if，echo等，变量名区分大小写

    //PHP命名规则
    变量必须以$开头，$不是变量的组成部分，只是表示变量名从这里开始，除开$符号外，以字母，下划线开头，后面跟字母，下划线，数字

    & 是获取值得地址     . 为链接字符串，"我是"."妹子" 即为 "我是妹子"。等于js里面的字符串之间拼接用+号。

//常量
    当一个值在脚本周期不发生变化，可以命名为常量。常量名不能用$开头。
    define()关键字来命名常量,默认区分大小写，由三个参数组成
    define("变量名","值"，布尔值)，true为不区分，false为区分。默认为false
    常量无法重复定义，在定义常量的时候用defined()先判断是否被定义，
//变量的数据类型
    四种标量类型
        1，boolean 布尔型
            true false
        2，integer 整型
            范围一般为 -（2的31次方） 到 （2的31次方-1）
        3，float 浮点型 存放整数与小数
        4，string 字符串  单引号字符串:为普通的字符串，双引号字符串：会替换变量
    二种复合类型
        1，array 数组
        2，object 对象
    特殊类型
        1，resource 资源  只要访问不属于PHP的东西就属于资源类型。
        2，null 无类型
     */


    //运算符：
    /*
        算数运算符
         +，-，*，/，
        PHP内+ 只能做算数运算，无法做如同JS里面的字符串连接。

    逻辑运算符
    || &&  ！
    逻辑运算符是用来连接比较运算符的



    */


    echo "10aa"+"20aa";
    echo "<br>";
    echo "a10aa"+"20aa";
    echo "<br>";
    echo "a10aa"+"b20aa";
    echo "<br>";
    $a=5;
    echo ++$a;
    echo "<br>";
    $b = "abc";
    $c = 0;
    if($c==$b){ //在PHP里面中比较的时候会转换为同类型进行比较，“abc”转换为数字为0，与JS不一样
        echo "相等";
    }else{
        echo "不相等";
    }
    ?>
   <br>
    <?
    echo "我是短标识";
    ?>
    <br>
    <%
     echo "Asp风格";
    %>
    <br>
    <script language="php">
        echo "script 风格";
    </script>
    <br>
    <hr>
<?php
    $a = 10;
    $b= &$a; //&表示获取 $a 得地址， 将 $a 得地址赋值给$b;
    $c= $a; //这是讲值赋值给 $c
    $a++;
    echo $b;
    echo "<br>";
    echo $c;
    unset($a);//销毁变量名。值依旧在。是由PHP的垃圾回收机制销毁的。
    echo $b;
?>
    <br>
    <hr>
<?php
    $a = "锄禾日当午";
    $b = "a";
    echo $$b;  //分析   $b 储存的1个变量名a，$$b 即为 $"a";$表示后续为变量名， 则 为$a, $a = "锄禾日当午"，所以输出了 "锄禾日当午"
    define("name","李白",true);
    echo "<br>";
if (!defined("name")){
        define("name","刘备");
}
echo name;
echo "<br>";

?>
    <hr>
<?php
$bane = "杜甫";
echo "my name is $bane";
echo "<br>";
echo 'my name is $bane';
echo "<br>";
echo "{$bane }是我名字"; //$表示后面的即为变量名，所以变量名与其他字符串之间需要用东西隔开。否则会无法识别。使用大括号隔开效果最好,大括号左边的括号需要挨着$符号，否则会在页面显示出来
echo "<br>";
echo "${bane}是我名字"; //调换位置也可以
?>
    <br>
    <hr>
<?php
/*
数组
    索引数组 通过元素的位置坐下标，默认从0开始，每次增加1，可以更改数组的起始下标
    $str = ["tom","berry","ketty","rose"];
    echo $str[0],"<br>"
    echo $str[1],"<br>"
    关联数组 以键值对为关联，键为下标，
    $str1 = ["name"=>"李白","sex"=>"男","age"=>"23"];
    echo $str1[name].$str1[sex].$str1[age];


输出语句
    echo  只能输出数字，字符串 可以依次输出多个参数，无返回值
        对于boolean
        echo true; 输出结果为1
        echo false; 为空
    var_dump()可以输出数据类型，与值
        输出数组会包含键值，数据类型，长度。
        输出字符串包含长度，数据类型，值
    print_r() //输出数组
    print 基本上与echo一样， 不过他是1个函数，只能输出1个参数，
        输出成功结束之后会返回值1，失败会返回0，

*/
$str = ["tom","berry","ketty","rose"];
    echo $str[0],"<br>",$str[1],"<br>";

$str1 = ["name"=>"李白","sex"=>"男","age"=>"23"];
    echo $str1["name"].$str1["sex"].$str1["age"],"<br>";
$stu = [3=>"a","b","c","d"]; //将数组的起始下标更改为了3
    print_r($stu);
echo "<br>";
    var_dump(true);
echo "<br>";
var_dump(124.4);
echo "<br>";
var_dump("this is test");

$abc = print "<br>";
echo $abc;


?>
    <br>
    <hr>
<?php
/*
    PHP中，字符串链接使用  .  来链接

.=    a.=b    即为 a = a.b;

*/
$a = "hello";
$b = "world";

echo $a.=$b;

//三元运算符

echo "<br>";
$c = 10;
echo $c%2 == 0 ? "偶数":"奇数";
?>
    <br>
    <hr>
<?php
if (isset($_POST{'num'})) { //isset用来判断变量是否已经赋值并且不为空。
    $num =  $_POST{'num'}+0;//获取输入的数据 加0将字符串转换为数字类型
    //判断是否是数字 is_numeric() 用来判断是否是数字或是否是数字字符串。是就返回true，否则返回false
    //is_int()判断是否是整型，10为整型 "10"不是整型
    if(is_numeric($num) && is_int($num)){
        echo $num%2 == 0 ?  " {$num}是一个偶数" :" {$num}是一个奇数";
    }else{
        echo "请输入1个整数";
    }
    }
?>
    <?php
    //在PHP里面外部变量只能外部用，不能再内部使用例如
        $oName = 1;
        function fn1(){
           // echo $oName; 这样是无法获取到外部的变量的，如果内部需要使用外部变量需要加条件
            echo $GLOBALS['$oName'];
        }
    ?>
    <form action="" method="post">

        <input type="text" value="请输入1个数：" name="num" id="num">
        <input type="submit" value="提交" id="submit">

    </form>
</body>
</html>