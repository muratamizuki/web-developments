<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発8回目</title>
</head>
<body>
    <div>
        <?php
            session_start();
            $_SESSION['name'] = 'mizukimurata';
            $_SESSION['email'] = 'mizucmke@gmail.com';
        ?>
    </div>
</body>
</html>
