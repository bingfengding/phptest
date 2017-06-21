<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mysql</title>
</head>
<body>
<?php
/*
数据库模型分类
层次模型
    层次模型类似于电脑资源管理器的形式，
        优点：分类管理，查询同一类很方便
        缺点：如果查询很多不是同一类的数据，效率低，层次结构可以造成数据无效，例如张经理管理了1个叫张三的，李经理也管理了1个叫张三的，层次结构无法区分到底是1个张三还是二个。
网状模型
    解决了层次模型的数据无效问题，但导航问题依旧没处理，查询不同类型多个数据依旧很慢
关系模型
    记录与记录之间通过属性之间的关系进行连接
    保证了数据的独立性，并形成数据集之间的关系
    缺点：查询多种不同数据需要查询多个表，效率非常慢。
结构化查询语言(Structured Query Language)简称SQL，用来操作关系型数据库
常用的关系型数据库
    Access
    MySQL
        扩展了MySql
    Sql server
        扩展了T-Sql
    Oracle
        扩展了PL/Sql
标准SQL是所有关系型数据库都支持的操作语句，也叫SQL-92
不同数据库在标准SQL的基础上扩展了自己的东西。
连接数据库
    MYSQL自带1个MYSQL命令行客户端，这个客户端方便但是只能连接本地的MYSQL。因此通过Windows自带的cmd连接数据库。
DOS命令  在dos环境下命令行没有分号，在mysql环境下需要加分号
    1,进入盘符:
    语法：盘符:  例如c:
    2,进入盘符下的指定文件夹
    语法： cd 路径 例如:c:\>cd windows/System32
    3,进入上级目录
    语法: cd ..
    4,查看当前文件夹内的内容
    语法:dir
    5,进入根目录 /表示根
    语法:cd /
连接MySQL服务器需要的参数:
Host:   主机          -h   本地为localhost 127.0.0.1  其他地址输入对应的ip地址
Username:用户名       -u   wampServer 默认用户名为root
Password:  密码       -p  默认密码为空
Port: 端口            -P  默认端口为3306
举例：进入本地的
mysql -h localhost -u root -p -P 3306
如果连接的是本地的，密码为空，端口为默认，则都可以省略
mysql -u root

退出数据库
exit;   quit;    \q;

//数据库操作 数据库本质就是一个文件。操作数据库的软件叫数据库管理系统
创建数据路
    语法;
    Create database 数据名  例如 Create database aa
        如果创建已存在的数据库会报错
    创建的时候进行判断如果不存在就创建
        create database if not exists 数据名  例如 Create database if not exists aa
    如果创建的数据库名为关键字,特殊字符等会报错提示
        解决办法：在名字上加上反引号。键盘1的前面，波浪号的下面
        例如：create database `create`;
    创建的时候添加字符编码形式
        Create database 数据名 charset=字符编码   //这里的不能添加横杠
    例如 create database abc charset=utf8;
查询数据库
    Show databases
    显示数据库的创建语句 能查询到创建的数据库的字符编码等信息
    Show create database 数据名
+--------------------+
| Database           |
+--------------------+
| information_schema |
| data               |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
更改数据库
    更改数据库的字符编码
    alter database 数据库名 选项
    例如：alter database charset=gbk;
删除数据库
    drop database 数据名；
    例如：drop database aa;
    删除不存在会报错，因此在删除之前进行判断是否存在
    例如：drop database if exists aa;
选择数据库
    use 数据库名；
    例如 use aa；

数据库操作
    几个概念
        在数据库内，表的
            行叫记录，一行就表示一条记录，
            列叫字段，一列是一个字段。字段也叫属性。
        1个表内包括多个字段。

    创建表
    语法：Create table 表名   字段1，数据类型这个必备，其他的可以省略。
    字段名1 数据类型，[null|not null] [default],[auto_increment],[primary key],
    字段名2 数据类型，
    ......
        default:默认值。
        not null：不为空。
        auto_increment:自动增长。//自动增长的如果一旦对应的被使用过，那么增长会依照被使用了的继续增长，而不是依照表里面最后个数字增长，例如 id为1到7，讲id=7的删除，再进行自动增长会为8，而不是继续使用7.
        primary key:主键。
            特点：不能为空，不能重复，一个表只能存在1个主键。但是一个主键可以由多个字段组成。
    数据类型：
        1，int：整型   用于那种需要用来运算的，手机号这种适合用varchar
            tinyint 最大为255，适合年龄这种
            smallint
            bigint
        2，decimal(3,1) 小数，第一个参数为总位数，第二个参数为小数点后面有几位。
        3，char(数字)：字符  固定长度     char(10), 10个字符长度，如果只用了5个，剩下的也会留着。//效率最高 一般固定长度用char，不固定长度用varchar
        4，varchar(数字):字符  可变长度     varchar(10),10个字符长度，如果只用了5个，剩下的回收。//节约资源
        5，text  大段文字
        6，binary 二进制，例如照片类型
创建表例如：
    create table stu(
    stuid int not null,
    stuname varchar(10)
    );
查询表：
    语法：
        show tables；
+--------------------+
| Table_in_data      |
+--------------------+
| stu                |
| stu2               |
+--------------------+
查询创建表的信息：
    语法
        show create table 表名;
        show create table 表名 \G;  让table字段和create table 字段竖排。
显示表结构:
    语法
        describe 表名；  describe 为描述的意思；  可以简写为   desc 表名;
+---------+-------------+------+-----+---------+-------+
| Field   | Type        | Null | Key | Default | Extra |
+---------+-------------+------+-----+---------+-------+
| stuid   | int(11)     | NO   |     | NULL    |       |
| stuname | varchar(10) | NO   |     | NULL    |       |
+---------+-------------+------+-----+---------+-------+
field表示字段，type表示数据类型
删除表格：
    drop table 表名;
    删除多个表格：
        drop table 表1,表2,表3;

创建1个较复杂的表：
create table stu(
    `id` int auto_increment primary key,
    `name` varchar(10) not null,
    sex char(1) not null,
    `add` varchar(50) not null default '地址不详',
    score decimal(3,1)
);
+-------+--------------+------+-----+----------+----------------+
| Field | Type         | Null | Key | Default  | Extra          |
+-------+--------------+------+-----+----------+----------------+
| id    | int(11)      | NO   | PRI | NULL     | auto_increment |
| name  | varchar(10)  | NO   |     | NULL     |                |
| sex   | char(1)      | NO   |     | NULL     |                |
| add   | varchar(50)  | NO   |     | 地址不详 |                |
| score | decimal(3,1) | YES  |     | NULL     |                |
+-------+--------------+------+-----+----------+----------------+
//可以通过SHOW VARIABLES语句查看系统变量及其值。
例如：
show variables like 'character_set%';查询MySQL默认的字符集。
*/
/*
 数据操作  增删改查
 插入数据（增）
    语法：
        insert into 表名 (字段名1,字段2) values (值1，值2)；
        例如：insert into stu (id,name,sex,`add`) values (1,'李白','男','北京');
    插入的的字段可以与数据库的字段顺序不一致，但是值必须与插入的字段顺序一致
    如果省略插入的字段，那么后续的值必须保持与数据表的字段顺序一致。
        例如：insert into stu values (4,'诸葛亮','男','重庆',99);
    自动增长的插入
        例如:insert into stu values (null,'王昭君','女','湖南',91);
    默认值插入
        例如:insert into stu values (null,'刘备','男',default,78);
修改数据（改）
    语法：
        update 表名 set 字段1=值1,字段2=值2 where 条件;
        例如：
            修改id等于6的name为张飞
                update stu set name='张飞' where id=6;

删除数据（删）
语法：
    delete from 表名 [where 条件]
    例如：delete from stu where id=6;
    删除全部
        delete from stu;

查询数据（查）
语法：select 列名 from 表名 [where 条件] [order by 排序字段 asc||desc] [limit 限制]
        排序：升序：asc  降序:desc  默认为升序，不写desc或asc即为默认asc
select * from 表名； *表示查询全部。
+----+--------+-----+----------+-------+
| id | name   | sex | add      | score |
+----+--------+-----+----------+-------+
|  1 | 李白   | 男  | 北京     |  NULL |
|  2 | 李清照 | 女  | 上海     |  99.0 |
|  3 | 貂蝉   | 女  | 南京     |  87.5 |
|  4 | 诸葛亮 | 男  | 重庆     |  99.5 |
|  5 | 王昭君 | 女  | 湖南     |  91.0 |
|  6 | 王昭君 | 女  | 湖南     |  NULL |
|  7 | 刘备   | 男  | null     |  78.0 |
|  8 | 刘备   | 男  | 地址不详 |  78.0 |
+----+--------+-----+----------+-------+
    例如：
        查询所有学生信息
            select * from stu;
        查询所有学生的姓名与性别
            select name,sex from stu;
        查询所有男生信息
            select * from stu where sex='男';
        查询上海的男生
            select * from stu where sex='男' and `add`='上海';
        查询所有的女生与北京的男生
            select * from stu where sex='女' or (`add`='北京' and sex='男');
        查询成绩大于90分的学生
            select * from stu where score>=90;
        按成绩升序排列
            select * from stu order by score asc;
        取成绩最高的四名
             select * from stu order by score desc limit 4;
        排除2个最低成绩的取其他人最多的3个成绩
            select * from stu order by score limit 2,3;
MySQL的运算符
> 大于
>= 大于等于
< 小于
<= 小于等于
=  MySQL里面只有单等，比较与赋值都是单等。
<>  不等于
逻辑运算符
and 与
or  或
not 非
聚合函数 PHP也用；
    Sum() 求和
    Avg() 求平均值
    Max() 求最小值
    Min() 求最小值
    Count() 记录数
    例如：
        求最高分
            Select max(score) from stu;
        求最低分
            Select min(score) from stu;
        求和
            Select sum(score) from stu;
        求有几个考试过
            Select count(score) from stu; //不存在的会剔除
            Select count(*) from stu;  //星号表示总的记录数
        有几个男生
             Select count(*) from stu where sex='男';
        求平均分
            Select avg(score) from stu;

*/
/*
 SQL语句分为2类，
1，数据查询语句：有记录集返回；
    例如：select show
    执行成功：
        返回记录集
    执行失败： 查询结果为空也是查询成功了，只有语句错误才会是执行失败
        返回false
2,数据操作语句：无记录集返回；
    例如：insert update delete drop
    执行成功：
        返回：true
    执行失败：
        返回：false
 */
?>
</body>
</html>