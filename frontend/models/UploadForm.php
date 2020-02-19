<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Images;


class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFiles;
    public $caseId;

    public function rules()
    {
        return [
            [['imageFiles','caseId'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }

    public function saveData($id){

        foreach ($this->imageFiles as $file) {
            $images = new Images();
            //$images->imageFiles =

            $images->imageFiles = $file->baseName . '.' . $file->extension;
            $images->caseId = $id;

            $images->save();
        }
        return;
    }
}


?>