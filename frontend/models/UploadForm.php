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
    
    public function upload($id,$time)
    {
        //if ($this->validate()) { 
        //$ups = Yii::getAlias('@/uploads');
        $index = 1;
            
            foreach ($this->imageFiles as $file) {
                $name = $id."_".$time."_".$index;
                $file->saveAs('uploads/' .$name. '.' . $file->extension);
                $index++;
            }
            return true;
        //} else {
        //    return false;
        //}
    }

    public function saveData($id,$time){

        $index = 1;
        date_default_timezone_set('Asia/Jakarta');

        $name = $id."_".$time."_".$index;
        foreach ($this->imageFiles as $file) {
            $images = new Images();
            //$images->imageFiles =
            $images->imageFiles = $name. '.' . $file->extension;
            $images->caseId = $id;
            $index++;
            $images->save();
        }
        return;
    }
}


?>