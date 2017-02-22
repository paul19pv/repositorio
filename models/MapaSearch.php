<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mapa;

/**
 * MapaSearch represents the model behind the search form of `app\models\Mapa`.
 */
class MapaSearch extends Mapa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['map_id', 'cat_id', 'pro_id', 'uni_id', 'usu_id'], 'integer'],
            [['map_nombre', 'map_descripcion', 'map_escala', 'map_entidad', 'map_autor', 'map_elaboracion', 'map_recepcion', 'map_clave', 'map_ruta'], 'safe'],
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
        $query = Mapa::find();

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
            'map_id' => $this->map_id,
            'cat_id' => $this->cat_id,
            'pro_id' => $this->pro_id,
            'uni_id' => $this->uni_id,
            'usu_id' => $this->usu_id,
            'map_elaboracion' => $this->map_elaboracion,
            'map_recepcion' => $this->map_recepcion,
        ]);

        $query->andFilterWhere(['ilike', 'map_nombre', $this->map_nombre])
            ->andFilterWhere(['ilike', 'map_descripcion', $this->map_descripcion])
            ->andFilterWhere(['ilike', 'map_escala', $this->map_escala])
            ->andFilterWhere(['ilike', 'map_entidad', $this->map_entidad])
            ->andFilterWhere(['ilike', 'map_autor', $this->map_autor])
            ->andFilterWhere(['ilike', 'map_clave', $this->map_clave])
            ->andFilterWhere(['ilike', 'map_ruta', $this->map_ruta]);

        return $dataProvider;
    }
}
