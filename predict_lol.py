import sys
import joblib
import pandas as pd

# モデルをロード
def load_model(model_filename='lolperfect_AI.pkl'):
    return joblib.load(model_filename)

# 試合を予測
def predict_match(loaded_model, champion_ids_100, champion_ids_200):
    new_match_data = {
        'champion_ids_100': champion_ids_100,
        'champion_ids_200': champion_ids_200
    }

    max_champions = 5
    for team in [100, 200]:
        key = f'champion_ids_{team}'
        for i in range(max_champions):
            new_match_data[f'champion_{team}_{i+1}'] = new_match_data[key][i]

    new_match_data.pop('champion_ids_100')
    new_match_data.pop('champion_ids_200')

    new_match_df = pd.DataFrame([new_match_data])

    # 特徴量名を学習時のものと一致
    X = pd.DataFrame(columns=[
        'team_gold_100', 'team_gold_200', 'team_damage_100', 'team_damage_200',
        'team_vision_100', 'team_vision_200', 'team_kills_100', 'team_kills_200',
        'team_deaths_100', 'team_deaths_200', 'team_assists_100', 'team_assists_200',
        'champion_100_1', 'champion_100_2', 'champion_100_3', 'champion_100_4', 'champion_100_5',
        'champion_200_1', 'champion_200_2', 'champion_200_3', 'champion_200_4', 'champion_200_5'
    ])

    for col in X.columns:
        if col not in new_match_df.columns:
            new_match_df[col] = 0

    new_match_df = new_match_df[X.columns]

    prediction = loaded_model.predict(new_match_df)
    win_probability = loaded_model.predict_proba(new_match_df)

    return prediction[0], win_probability[0].tolist()

if __name__ == "__main__":
    champion_ids_100 = [int(x) for x in sys.argv[1:6]]
    champion_ids_200 = [int(x) for x in sys.argv[6:11]]

    loaded_model = load_model('lolperfect_AI.pkl')
    prediction, win_probability = predict_match(loaded_model, champion_ids_100, champion_ids_200)

    print(prediction)
    print(','.join(map(str, win_probability)))
