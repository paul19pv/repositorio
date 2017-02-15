<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Programa;

/**
 * ProgramaSearch represents the model behind the search form of `app\models\Programa`.
 */
class ProgramaSearch extends Programa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pro_id'], 'integer'],
            [['pro_codigo', 'pro_nombre'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Programa::find();

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
            'pro_id' => $this->pro_id,
        ]);

        $query->andFilterWhere(['ilike', 'pro_codigo', $this->pro_codigo])
            ->andFilterWhere(['ilike', 'pro_nombre', $this->pro_nombre]);

        return $dataProvider;
    }
}
