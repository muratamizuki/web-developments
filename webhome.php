<?php
session_start();

// DBからチャンピオンIDを取得
function get_champion_id($champion_name) {
    try {
        $db = new PDO('mysql:dbname=lolchampion;host=localhost;port=8889;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'エラー: ' . $e->getMessage();
        exit; 
    }
    try {
        $sql = "SELECT championid FROM champion WHERE name = 'アニー' ORDER BY championid DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $id) {
        }
        
    } catch (PDOException $e) {
        echo 'データ挿入エラー: ' . $e->getMessage();
    }
    return $id['championid'];
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