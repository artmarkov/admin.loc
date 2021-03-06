<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserInit;

/**
 * UserSearch represents the model behind the search form of `common\models\UserInit`.
 */
class UserSearch extends UserInit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'birthday', 'role', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'surname', 'name', 'patronymic', 'snils', 'gender', 'age_flag', 'phone_main', 'phone_optional', 'address', 'rezume', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'email_confirm_token'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserInit::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'birthday' => $this->birthday,
            'role' => $this->role,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'snils', $this->snils])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'age_flag', $this->age_flag])
            ->andFilterWhere(['like', 'phone_main', $this->phone_main])
            ->andFilterWhere(['like', 'phone_optional', $this->phone_optional])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'rezume', $this->rezume])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email_confirm_token', $this->email_confirm_token]);

        return $dataProvider;
    }
}
