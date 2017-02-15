<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mapa".
 *
 * @property int $map_id
 * @property int $cat_id
 * @property int $pro_id
 * @property int $uni_id
 * @property int $usu_id
 * @property string $map_nombre
 * @property string $map_escala
 * @property string $map_entidad
 * @property string $map_autor
 * @property string $map_fecha
 * @property string $map_clave
 * @property string $map_ruta
 *
 * @property Categoria $cat
 * @property Programa $pro
 * @property Unidad $uni
 * @property Usuario $usu
 */
class Mapa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mapa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'pro_id', 'uni_id', 'usu_id'], 'default', 'value' => null],
            [['cat_id', 'pro_id', 'uni_id', 'usu_id'], 'integer'],
            [['map_fecha'], 'safe'],
            [['map_nombre', 'map_entidad'], 'string', 'max' => 100],
            [['map_escala'], 'string', 'max' => 50],
            [['map_autor', 'map_clave', 'map_ruta'], 'string', 'max' => 200],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['cat_id' => 'cat_id']],
            [['pro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programa::className(), 'targetAttribute' => ['pro_id' => 'pro_id']],
            [['uni_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unidad::className(), 'targetAttribute' => ['uni_id' => 'uni_id']],
            [['usu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['usu_id' => 'usu_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'map_id' => 'Map ID',
            'cat_id' => 'Cat ID',
            'pro_id' => 'Pro ID',
            'uni_id' => 'Uni ID',
            'usu_id' => 'Usu ID',
            'map_nombre' => 'Map Nombre',
            'map_escala' => 'Map Escala',
            'map_entidad' => 'Map Entidad',
            'map_autor' => 'Map Autor',
            'map_fecha' => 'Map Fecha',
            'map_clave' => 'Map Clave',
            'map_ruta' => 'Map Ruta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Categoria::className(), ['cat_id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPro()
    {
        return $this->hasOne(Programa::className(), ['pro_id' => 'pro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUni()
    {
        return $this->hasOne(Unidad::className(), ['uni_id' => 'uni_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsu()
    {
        return $this->hasOne(Usuario::className(), ['usu_id' => 'usu_id']);
    }
}
