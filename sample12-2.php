<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発8回目</title>
</head>
<body>
    <div>
        <?php
            if (isset($_SESSION['name'])&&(isset($_SESSION['email']))){
                echo $_SESSION['name'];
                echo $_SESSION['email'];
            }
            else{
                echo 'セットされてません';
            }