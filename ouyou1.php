<DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>WEB開発5回目</title>
        <link href="./style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div>
            <?php
                for ($i = 0; $i <= 365; $i++) {
                    print(date('Y/m/d(l)', strtotime("+$i day")) . "<br>");
                }                
            ?>
        </div>
    </body>