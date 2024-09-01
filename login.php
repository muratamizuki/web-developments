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
            // セッションの開始
            session_start();
            try {
                $db = new PDO('mysql:dbname=user;host=localhost;port=8889;charset=utf8', 'root', 'root');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'エラー: ' . $e->getMessage();
                exit; 
            }

            // POSTデータが送信されているか確認
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $password = $_POST["password"];

                // ユーザー名がデータベースにあるか検索
                try {
                    $stmt = $db->prepare('SELECT * FROM user WHERE name=?');
                    $stmt->bindParam(1, $name, PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    // デバッグ用出力
                    var_dump($result);
                } catch (PDOException $e) {
                    exit('データベースエラー: ' . $e->getMessage());
                }

                // パスワードが正しいかを検証
                if ($result && $password === $result['password']) { // ハッシュ化されていないため、プレーンテキストで比較
                    session_regenerate_id(TRUE); // セッションIDを再発行
                    $_SESSION["login"] = $name; // セッションにログイン情報を登録
                    header("Location: webhome.php"); // ログイン後のページにリダイレクト
                    exit();
                } else {
                    // ログインに失敗した場合のメッセージ
                    echo "ユーザー名かパスワードが違います";
                }
            }
        ?>
        <a class="login" href="login.html" style="text-decoration: none;">ログイン</a>
    </div>
</body>
</html>
