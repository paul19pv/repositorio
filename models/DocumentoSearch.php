<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Documento;

/**
 * DocumentoSearch represents the model behind the search form of `app\models\Documento`.
 */
class DocumentoSearch extends Documento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doc_id', 'cat_id', 'pro_id', 'uni_id', 'usu_id'], 'integer'],
            [['doc_titulo', 'doc_autor', 'doc_publicacion', 'doc_descripcion', 'doc_clave', 'doc_ruta'], 'safe'],
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
        $query = Documento::find();

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
            'doc_id' => $this->doc_id,
            'cat_id' => $this->cat_id,
            'pro_id' => $this->pro_id,
            'uni_id' => $this->uni_id,
            'usu_id' => $this->usu_id,
            'doc_publicacion' => $this->doc_publicacion,
        ]);

        $query->andFilterWhere(['ilike', 'doc_titulo', $this->doc_titulo])
            ->andFilterWhere(['ilike', 'doc_autor', $this->doc_autor])
            ->andFilterWhere(['ilike', 'doc_descripcion', $this->doc_descripcion])
            ->andFilterWhere(['ilike', 'doc_clave', $this->doc_clave])
            ->andFilterWhere(['ilike', 'doc_ruta', $this->doc_ruta]);

        return $dataProvider;
    }
}
