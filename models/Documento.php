<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documento".
 *
 * @property int $doc_id
 * @property int $cat_id
 * @property int $pro_id
 * @property int $uni_id
 * @property int $usu_id
 * @property string $doc_titulo
 * @property string $doc_autor
 * @property string $doc_publicacion
 * @property string $doc_descripcion
 * @property string $doc_clave
 * @property string $doc_ruta
 *
 * @property Categoria $cat
 * @property Programa $pro
 * @property Unidad $uni
 * @property Usuario $usu
 */
class Documento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'pro_id', 'uni_id', 'usu_id'], 'default', 'value' => null],
            [['cat_id', 'pro_id', 'uni_id', 'usu_id'], 'integer'],
            [['doc_publicacion'], 'safe'],
            [['doc_titulo', 'doc_autor', 'doc_clave', 'doc_ruta'], 'string', 'max' => 200],
            [['doc_descripcion'], 'string', 'max' => 300],
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
            'doc_id' => 'Doc ID',
            'cat_id' => 'Cat ID',
            'pro_id' => 'Pro ID',
            'uni_id' => 'Uni ID',
            'usu_id' => 'Usu ID',
            'doc_titulo' => 'Doc Titulo',
            'doc_autor' => 'Doc Autor',
            'doc_publicacion' => 'Doc Publicacion',
            'doc_descripcion' => 'Doc Descripcion',
            'doc_clave' => 'Doc Clave',
            'doc_ruta' => 'Doc Ruta',
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
