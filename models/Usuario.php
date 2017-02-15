<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $usu_id
 * @property string $usu_cedula
 * @property string $usu_nombre
 * @property string $usu_apellido
 * @property string $usu_usuario
 * @property string $usu_password
 * @property string $usu_confirm
 * @property string $usu_correo
 *
 * @property Documento[] $documentos
 * @property Mapa[] $mapas
 * @property Perfil[] $perfils
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usu_cedula'], 'string', 'max' => 10],
            [['usu_nombre', 'usu_apellido', 'usu_usuario', 'usu_password', 'usu_confirm', 'usu_correo'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usu_id' => 'Usu ID',
            'usu_cedula' => 'Usu Cedula',
            'usu_nombre' => 'Usu Nombre',
            'usu_apellido' => 'Usu Apellido',
            'usu_usuario' => 'Usu Usuario',
            'usu_password' => 'Usu Password',
            'usu_confirm' => 'Usu Confirm',
            'usu_correo' => 'Usu Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentos()
    {
        return $this->hasMany(Documento::className(), ['usu_id' => 'usu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapas()
    {
        return $this->hasMany(Mapa::className(), ['usu_id' => 'usu_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfils()
    {
        return $this->hasMany(Perfil::className(), ['usu_id' => 'usu_id']);
    }
}
