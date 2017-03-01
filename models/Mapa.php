<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mapa".
 *
 * @property integer $map_id
 * @property integer $cat_id
 * @property integer $pro_id
 * @property integer $uni_id
 * @property integer $usu_id
 * @property string $map_nombre
 * @property string $map_descripcion
 * @property string $map_escala
 * @property string $map_entidad
 * @property string $map_autor
 * @property string $map_elaboracion
 * @property string $map_recepcion
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
            [['cat_id', 'pro_id', 'uni_id', 'usu_id'], 'integer'],
            [['map_descripcion', 'map_escala', 'map_entidad', 'map_clave'], 'required'],
            [['map_elaboracion', 'map_recepcion'], 'safe'],
            [['map_nombre', 'map_entidad'], 'string', 'max' => 100],
            [['map_descripcion'], 'string', 'max' => 250],
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
            'cat_id' => 'Categoría',
            'pro_id' => 'Programa',
            'uni_id' => 'Unidad Hídrica',
            'usu_id' => 'Usuario',
            'map_nombre' => 'Nombre',
            'map_descripcion' => 'Descripcion',
            'map_escala' => 'Escala',
            'map_entidad' => 'Entidad',
            'map_autor' => 'Autor',
            'map_elaboracion' => 'Fecha de Elaboración',
            'map_recepcion' => 'Fecha de Recepción',
            'map_clave' => 'Palabras Clave',
            'map_ruta' => 'Ruta',
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
