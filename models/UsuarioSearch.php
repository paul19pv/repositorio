<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form of `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usu_id'], 'integer'],
            [['usu_cedula', 'usu_nombre', 'usu_apellido', 'usu_usuario', 'usu_password', 'usu_confirm', 'usu_correo'], 'safe'],
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
        $query = Usuario::find();

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
            'usu_id' => $this->usu_id,
        ]);

        $query->andFilterWhere(['ilike', 'usu_cedula', $this->usu_cedula])
            ->andFilterWhere(['ilike', 'usu_nombre', $this->usu_nombre])
            ->andFilterWhere(['ilike', 'usu_apellido', $this->usu_apellido])
            ->andFilterWhere(['ilike', 'usu_usuario', $this->usu_usuario])
            ->andFilterWhere(['ilike', 'usu_password', $this->usu_password])
            ->andFilterWhere(['ilike', 'usu_confirm', $this->usu_confirm])
            ->andFilterWhere(['ilike', 'usu_correo', $this->usu_correo]);

        return $dataProvider;
    }
}
