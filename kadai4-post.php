<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>web開発</title>
</head>
<body>
    <div>
        <?php
            try {
                $db = new PDO('mysql:dbname=Submission;host=localhost;port=8889;charset=utf8', 'root', 'root');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'エラー: ' . $e->getMessage();
                exit; 
            }
            $name = $_POST["name"];
            $content = $_POST["content"];
            $tag = $_POST["tag"];
            try {
                $sql = "INSERT INTO posts (name, content) VALUES (:name, :content)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':content', $content, PDO::PARAM_STR);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->execute();
                
                $sql = "INSERT INTO tags (name) VALUES (:name)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':name', $tag, PDO::PARAM_STR);
                $stmt->execute();
                echo "登録完了";
            } catch (PDOException $e) {
                echo 'データ挿入エラー: ' . $e->getMessage();
            }
        ?>
    </div>
</body>
</html>