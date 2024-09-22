<?php
session_start();
// チャンピオン名とID
$champion_dict = [
    ""=>0,
    "アニー"=> 1,
    "オラフ"=> 2,
    "ガリオ"=> 3,
    "ツイステッド・フェイト"=> 4,
    "シン・ジャオ"=> 5,
    "アーゴット"=> 6,
    "ルブラン"=> 7,
    "ブラッドミア"=> 8,
    "フィドルスティックス"=> 9,
    "ケイル"=> 10,
    "マスター・イー"=> 11,
    "アリスター" =>12,
    "ライズ"=> 13,
    "サイオン"=> 14,
    "シヴィア"=> 15,
    "ソラカ"=> 16,
    "ティーモ"=> 17,
    "トリスターナ"=> 18,
    "ワーウィック"=> 19,
    "ヌヌ＆ウィルンプ"=> 20,
    "ミス・フォーチュン"=> 21,
    "アッシュ"=> 22,
    "トリンダメア"=> 23,
    "ジャックス"=> 24,
    "モルガナ"=> 25,
    "ジリアン"=> 26,
    "シンジド"=> 27,
    "イブリン"=> 28,
    "トゥイッチ"=> 29,
    "カーサス"=> 30,
    "チョ＝ガス"=> 31,
    "アムム"=> 32,
    "ラムス"=> 33,
    "アニビア"=> 34,
    "シャコ"=> 35,
    "ドクター・ムンド"=> 36,
    "ソナ"=> 37,
    "カサディン"=> 38,
    "イレリア"=> 39,
    "ジャンナ"=> 40,
    "ガングプランク"=> 41,
    "コーキ"=> 42,
    "カルマ"=> 43,
    "タリック"=> 44,
    "ベイガー"=> 45,
    "トランドル"=> 48,
    "スウェイン"=> 50,
    "ケイトリン"=> 51,
    "ブリッツクランク"=> 53,
    "マルファイト"=> 54,
    "カタリナ"=> 55,
    "ノクターン"=> 56,
    "マオカイ"=> 57,
    "レネクトン"=> 58,
    "ジャーヴァンⅣ"=> 59,
    "エリス"=> 60,
    "オリアナ"=> 61,
    "ウーコン"=> 62,
    "ブランド"=> 63,
    "リー・シン"=> 64,
    "ヴェイン"=> 67,
    "ランブル"=> 68,
    "カシオペア"=> 69,
    "スカーナー"=> 72,
    "ハイマーディンガー"=> 74,
    "ナサス"=> 75,
    "ニダリー"=> 76,
    "ウディア"=> 77,
    "ポッピー"=> 78,
    "グラガス"=> 79,
    "パンテオン"=> 80,
    "エズリアル"=> 81,
    "モルデカイザー"=> 82,
    "ヨリック"=> 83,
    "アカリ"=> 84,
    "ケネン"=> 85,
    "ガレン"=> 86,
    "レオナ"=> 89,
    "マルザハール"=> 90,
    "タロン"=> 91,
    "リヴェン"=> 92,
    "コグ＝マウ"=> 96,
    "シェン"=> 98,
    "ラックス"=> 99,
    "ゼラス"=> 101,
    "シヴァーナ"=> 102,
    "アーリ"=> 103,
    "グレイブス"=> 104,
    "フィズ"=> 105,
    "ボリベア"=> 106,
    "レンガー"=> 107,
    "ヴァルス"=> 110,
    "ノーチラス"=> 111,
    "ビクター"=> 112,
    "セジュアニ"=> 113,
    "フィオラ"=> 114,
    "ジグス"=> 115,
    "ルル"=> 117,
    "ドレイヴン"=> 119,
    "ヘカリム"=> 120,
    "カ＝ジックス"=> 121,
    "ダリウス"=> 122,
    "ジェイス"=> 126,
    "リサンドラ"=> 127,
    "ダイアナ"=> 131,
    "クイン"=> 133,
    "シンドラ"=> 134,
    "オレリオン・ソル"=> 136,
    "ケイン"=> 141,
    "ゾーイ"=> 142,
    "ザイラ"=> 143,
    "カイ＝サ"=> 145,
    "ナー"=> 150,
    "ザック"=> 154,
    "ヤスオ"=> 157,
    "ヴェル＝コズ"=> 161,
    "タリア"=> 163,
    "カミール"=> 164,
    "アクシャン"=> 166,
    "ベル＝ヴェス"=> 200,
    "ブラウム"=> 201,
    "ジン"=> 202,
    "キンドレッド"=> 203,
    "ゼリ"=> 221,
    "ジンクス"=> 222,
    "タム・ケンチ"=> 223,
    "ヴィエゴ"=> 234,
    "セナ"=> 235,
    "ルシアン"=> 236,
    "ゼド"=> 238,
    "クレッド"=> 240,
    "エコー"=> 245,
    "キヤナ"=> 246,
    "ヴァイ"=> 254,
    "エイトロックス"=> 266,
    "ナミ"=> 267,
    "アジール"=> 268,
    "ユーミ"=> 350,
    "サミーラ"=> 360,
    "スレッシュ"=> 412,
    "イラオイ"=> 420,
    "レク＝サイ"=> 421,
    "アイバーン"=> 427,
    "カリスタ"=> 429,
    "バード"=> 432,
    "ラカン"=> 497,
    "ザヤ"=> 498,
    "オーン"=> 516,
    "サイラス"=> 517,
    "ニーコ"=> 518,
    "アフェリオス"=> 523,
    "レル"=> 526,
    "パイク"=> 555,
    "ヴェックス"=> 711,
    "ヨネ"=> 777,
    "セト"=> 875,
    "リリア"=> 876,
    "グウェン"=> 887,
    "レナータ・グラスク"=> 888,
    "ニーラ"=> 895,
    "ミリオ"=> 902,
    "カ＝サンテ"=> 897,
    "スモルダー"=> 901,
    "フェイ"=> 910,
    "ブライアー"=> 233,
    "ナフィーリ"=> 950
];

// チャンピオン名からIDを取得
function get_champion_id($champion_name) {
    global $champion_dict;
    return isset($champion_dict[$champion_name]) ? $champion_dict[$champion_name] : "チャンピオンが見つかりません";
}

// 予測
function predict_match($champion_ids_100, $champion_ids_200) {
    $command = 'python3 predict_lol.py ' . implode(' ', $champion_ids_100) . ' ' . implode(' ', $champion_ids_200);
    $output = [];
    exec($command, $output);

    if (count($output) >= 2) {
        $prediction = intval($output[0]);
        $win_probability = array_map('floatval', explode(',', $output[1])); 
        return [$prediction, $win_probability];
    } else {
        return [null, null];
    }
}

$champion_ids_100 = [];
$champion_ids_200 = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // BLUE
    for ($i = 0; $i < 5; $i++) {
        $champion_name = $_POST["blue_team"][$i];
        $champion_id = get_champion_id($champion_name);
        if ($champion_id != "チャンピオンが見つかりません") {
            $champion_ids_100[] = $champion_id;
        }
    }

    // RED
    for ($i = 0; $i < 5; $i++) {
        $champion_name = $_POST["red_team"][$i];
        $champion_id = get_champion_id($champion_name);
        if ($champion_id != "チャンピオンが見つかりません") {
            $champion_ids_200[] = $champion_id;
        }
    }

    if (count($champion_ids_100) == 5 && count($champion_ids_200) == 5) {
        list($prediction, $result_or_error) = predict_match($champion_ids_100, $champion_ids_200);

        if ($prediction !== null) {
            $result = ($prediction == 1) ? "Team BLUE Wins" : "Team RED Wins";
            $win_probability_reversed = array_reverse($result_or_error);
        } else {
            $error_message = $result_or_error !== null ? $result_or_error : "不明なエラーが発生しました。";
            $error = "予測中にエラーが発生しました: " . htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8');
        }
    } else {
        $error = "各チームに5つのチャンピオンIDを入力してください。";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>web開発</title>
    <link rel="stylesheet" href="web.css">
</head>
<body class="home">
    <header>
        <div>
            <a class="switch change" href="seisaku.php">リアルタイム予想</a>
        <?php
            if (isset($_SESSION["login"])) {
                echo '<a class="switch login" href="logout.php" style="text-decoration: none;">ログアウト</a>';
            } else {
                echo '<a class="switch login" href="loginnow.php" style="text-decoration: none;">ログイン</a>';
            }
        ?>
        </div>
    </header>
    <div class="">
        <div class="title">
            <h1>LOL勝利予想AI</h1>
    <form method="post">
        <div class="team">
            <div>
                <h2>BLUEチーム</h2>
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <label for="blue_team_<?= $i ?>">TOP/JG/MID/ADC/SUP:</label>
                    <input type="text" name="blue_team[]" id="blue_team_<?= $i ?>" required>
                    <br>
                <?php endfor; ?>
            </div>

            <div>
                <h2>REDチーム</h2>
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <label for="red_team_<?= $i ?>">TOP/JG/MID/ADC/SUP:</label>
                    <input type="text" name="red_team[]" id="red_team_<?= $i ?>" required>
                    <br>
                <?php endfor; ?>
            </div>
        </div>
        <button type="submit">予測を実行</button>
    </form>

    <?php if (isset($result)): ?>
        <h2>予測結果: <?= $result ?></h2>
        <p>勝利確率: <?= implode(", ", $win_probability_reversed) ?></p>
    <?php elseif (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif; ?>
</body>
</html>