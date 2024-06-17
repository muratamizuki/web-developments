<DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>WEB開発8回目</title>
</head>
<body>
    <form action="sample11.php" method="post" enctype="multipart/form-data">
        <input type="file" name="upload_file">
        <input type="submit" value="送信">
    </form>
    <div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["upload_file"])) {
            $uploadDirectory = 'file/';

            $fileName = $_FILES['upload_file']['name'];
            $fileType = $_FILES['upload_file']['type'];
            $fileTmpName = $_FILES['upload_file']['tmp_name'];
            $fileSize = $_FILES['upload_file']['size'];

            $uploadFilePath = $uploadDirectory . basename($fileName);
            if(move_uploaded_file($fileTmpName, $uploadFilePath)){
                echo "ファイル名:$fileName<br>ファイルタイプ:$fileType<br>ファイルサイズ:$fileSize<br>ファイル場所:$fileTmpName";
                echo '<img src="' . $uploadFilePath . '" >';
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "ファイルを選択してください。";
        }
        ?>
    </div>
</body>
</html>