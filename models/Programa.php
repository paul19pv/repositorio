<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programa".
 *
 * @property int $pro_id
 * @property string $pro_codigo
 * @property string $pro_nombre
 *
 * @property Documento[] $documentos
 * @property Mapa[] $mapas
 */
class Programa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'programa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pro_codigo'], 'string', 'max' => 10],
            [['pro_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'Pro ID',
            'pro_codigo' => 'Pro Codigo',
            'pro_nombre' => 'Pro Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentos()
    {
        return $this->hasMany(Documento::className(), ['pro_id' => 'pro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapas()
    {
        return $this->hasMany(Mapa::className(), ['pro_id' => 'pro_id']);
    }
}
