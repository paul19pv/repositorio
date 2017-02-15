<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidad".
 *
 * @property int $uni_id
 * @property string $uni_nombre
 *
 * @property Documento[] $documentos
 * @property Mapa[] $mapas
 */
class Unidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uni_nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uni_id' => 'Uni ID',
            'uni_nombre' => 'Uni Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentos()
    {
        return $this->hasMany(Documento::className(), ['uni_id' => 'uni_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapas()
    {
        return $this->hasMany(Mapa::className(), ['uni_id' => 'uni_id']);
    }
}
