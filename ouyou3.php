<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発8回目</title>
</head>
<body>
    </form>
    <div>
        <?php
            if(isset($_GET['kg']) && isset($_GET['m'])){
                $kg = htmlspecialchars($_GET['kg']);
                $m = htmlspecialchars($_GET['m']);
                $risou = ($m / 100) * ($m / 100) * 22;
                $diff = $risou - $kg;
                echo "体重: {$kg}kg<br>";
                echo "理想: {$risou}kg<br>";
                echo "後: {$diff}kgで適正体重です。";
            }
        ?>
    </div>
</body>
</html>