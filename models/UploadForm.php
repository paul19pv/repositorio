<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\Documento;
use app\models\Mapa;

class UploadForm extends Model {

    /**
     * @var UploadedFile
     */
    public $docFile;
    public $mapFile;
    public $doc_id;
    public $map_id;

    public function rules() {
        return [
            [['docFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, txt,doc,docx', 'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}'],
            [['mapFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'zip,rar,kml,kmz', 'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}']
        ];
    }

    public function upload_file() {
        if ($this->validate(['docFile'])) {
            $this->docFile->saveAs('files/' . $this->docFile->baseName . '.' . $this->docFile->extension);
            return true;
        } else {
            return false;
        }
    }

    public function ruta_file($doc_id) {
        $documento = Documento::findOne($doc_id);
        $documento->doc_ruta = 'files/' . $this->docFile->getBaseName() . '.' . $this->docFile->getExtension();
        if ($documento->update() !== false) {
            return true;
        } else {
            return false;
        }
    }

    public function upload_map() {
        if ($this->validate(['mapFile'])) {
            $this->mapFile->saveAs('maps/' . $this->mapFile->baseName . '.' . $this->mapFile->extension);
            return true;
        } else {
            return false;
        }
    }

    public function ruta_map($map_id) {
        $mapa = Mapa::findOne($map_id);
        $mapa->map_ruta = 'maps/' . $this->mapFile->getBaseName() . '.' . $this->mapFile->getExtension();
        if ($mapa->update() !== false) {
            return true;
        } else {
            return false;
        }
    }

}
