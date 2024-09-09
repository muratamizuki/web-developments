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
            try {                
                $sql = "SELECT * FROM posts";
                $stmt = $db->prepare($sql);
                $stmt->execute();
                foreach ($stmt as $row) {
                echo 'name:'.$row['name'].'<br>content:'.$row['content'].'<br>更新日:'.$row['updated_at'];
                echo '<br>';
                }
            } catch (PDOException $e) {
                echo 'エラー: ' . $e->getMessage();
            }
        ?>
    </div>
</body>
</html>