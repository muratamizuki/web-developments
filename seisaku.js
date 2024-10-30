document.getElementById('videoForm').addEventListener('submit', function(event) {
    event.preventDefault();  // フォームのデフォルト動作（ページリロード）を防止

    const url = document.getElementById('url').value;
    const youtubeId = extractYouTubeID(url);

    if (youtubeId) {
        // iframeのsrcに動画を埋め込む
        const iframe = document.getElementById('videoIframe');
        iframe.src = `https://www.youtube.com/embed/${youtubeId}`;
    } else {
        alert("無効なYouTubeのURLです。");
    }
});

// YouTubeのURLから動画IDを抽出する関数
function extractYouTubeID(url) {
    const regex = /(youtube\.com.*v=|youtu\.be\/)([^&?\/]+)/;
    const matches = url.match(regex);

    return matches ? matches[2] : null;
}

// スクリーンショットボタンの処理
document.getElementById('screenshotBtn').addEventListener('click', function() {
    html2canvas(document.getElementById('videoContainer')).then(canvas => {
        // 生成されたキャンバスを画像として表示
        const screenshotImg = document.getElementById('screenshotImg');
        screenshotImg.src = canvas.toDataURL('image/png');
    });
});

