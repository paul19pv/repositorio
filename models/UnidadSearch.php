<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Unidad;

/**
 * UnidadSearch represents the model behind the search form of `app\models\Unidad`.
 */
class UnidadSearch extends Unidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uni_id'], 'integer'],
            [['uni_nombre'], 'safe'],
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
        $query = Unidad::find();

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
            'uni_id' => $this->uni_id,
        ]);

        $query->andFilterWhere(['ilike', 'uni_nombre', $this->uni_nombre]);

        return $dataProvider;
    }
}
