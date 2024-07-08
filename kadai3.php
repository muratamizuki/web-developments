<body>
    <div>
        <?php
            try
            {
                $staff_code = $_POST['name'];
                $staff_pass = $_POST['pass'];

                $staff_pass = md5($staff_pass); // パスワードはDBにもmd5の状態で格納されているため

                $dsn = 'mysql:dbname=mydb;host=localhost;port=8889;charset=utf8';
                $user = 'root';
                $password = '';
                $dbh = new PDO($dsn, $user, $password);
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // 入力情報とDBの情報を照会
                $sql = 'SELECT name FROM テーブル名 WHERE code = ? AND password = ?';
                $stmt = $dbh->prepare($sql);
                $data[] = $staff_code;
                $data[] = $staff_pass;
                $stmt->execute($data);

                $dbh = null;

                $rec = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($rec == false)
                {
                    print '間違っています。<br />';
                    print '<a href="kadai3-login.php">戻る</a>';
                }
                else
                {
                    session_start();
                    $_SESSION['login'] = 1;
                    $_SESSION['staff_code'] = $staff_code;
                    $_SESSION['staff_name'] = $rec['name'];
                    header('Location: staff_top.php');
                    exit();
                }
            }
            catch (Exception $e)
            {
                print 'エラー'. $e->getMessage();;
                exit();
            }
        ?>
    </div>
</body>