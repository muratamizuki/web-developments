<body>
    <div>
        <?php
            try {
                $db = new PDO('mysql:dbname=mydb;host=localhost;port=8889;charset=utf8', 'root', 'root');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'エラー: ' . $e->getMessage();
                exit; 
            }
            $id = 1000;
            $name = "商品1000.00";
            try {
                $sql = "UPDATE items SET name = :name WHERE id = :id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                
                $stmt->execute();
                echo "データが正常に更新されました。";
            } catch (PDOException $e) {
                echo 'データ更新エラー: ' . $e->getMessage();
            }
        ?>
    </div>
</body>