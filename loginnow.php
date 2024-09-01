<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>web開発</title>
  <link rel="stylesheet" href="web.css">
</head>
<h1>ログインページ</h1>
<form action="login.php" method="post">
<?php
    session_start();
    if (isset($_SESSION["login"])) {
    session_regenerate_id(TRUE);
    header("Location: webhome.php");
    exit();
    }
?>
<div>
    <label>
        ユーザーネーム：
        <input type="text" name="name" required>
    </label>
</div>
<div>
    <label>
        パスワード：
        <input type="text" name="password" required>
    </label>
</div>
<input type="submit" value="ログイン">
<a class="login" href="signup.html" style="text-decoration: none;">新規登録</a>
</form>