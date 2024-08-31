<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>web開発</title>
  <link rel="stylesheet" href="web.css">
</head>
<body>
    <div>
        <?php
            try {
                $db = new PDO('mysql:dbname=user;host=localhost;port=8889;charset=utf8', 'root', 'root');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'エラー: ' . $e->getMessage();
                exit; 
            }
            $name = $_POST["name"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            try {
                $sql = "INSERT INTO items (name, password, emaail) VALUES (:name, :password, :email)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();
                echo "登録完了";
            } catch (PDOException $e) {
                echo 'データ挿入エラー: ' . $e->getMessage();
            }
        ?>
        <a class="login" href="login.html" style="text-decoration: none;">ログイン</a>
    </div>
</body>
</html>