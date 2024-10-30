<!DOCTYPE html>
<html lang="ja">
<link rel="stylesheet" href="seisaku.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スクリーンショット機能付きYouTube動画埋め込み</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script> <!-- html2canvasを追加 -->
</head>
<body>
    <div class=botan>
        <form id="videoForm">
            <label for="url">YouTubeのURLを入力してください:</label>
            <input type="text" name="url" id="url" placeholder="動画のURLを入力" required>
            <input type="submit" value="動画を表示">
        </form>
        <button id="screenshotBtn">スクリーンショットを取る</button> 
    </div>


    <!-- 動画表示用のiframe -->
    <div id="videoContainer">
        <iframe id="videoIframe" width="1200" height="675" frameborder="0" allowfullscreen></iframe>
    </div>

    <!-- スクリーンショット結果表示エリア -->
    <div id="screenshotResult">
        <h3>スクリーンショット:</h3>
        <img id="screenshotImg" alt="スクリーンショットの結果がここに表示されます">
    </div>

    <script src="seisaku.js"></script>

</body>
</html>

