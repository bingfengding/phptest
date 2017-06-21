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
            margin: 0;
            padding:0;
        }
        body{
            box-sizing: border-box;
        }
        table{
            border:1px solid #cccccc;
            width: 1000px;
            margin: 0 auto;
            border-collapse: collapse;
        }
        td{
            width: 50px;
            border: solid 1px #cccccc;
            text-align:center;
            height: 50px;

        }
    </style>
</head>
<body>
    <table>
        <tr>
            <?php
            for($i=1;$i<=132;$i++){
                echo '<td><img src="./images/',$i,'.gif"></td>';
                if ($i%20==0){
                    echo "</tr><tr>";
                }
            }
            ?>
        </tr>
    </table>
</body>
</html>