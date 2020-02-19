<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Forms extends ActiveRecord
{
    const STATUS_PROCESS = "Process";
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{forms}}';
    }

    public function getForms(){
        return $forms = Forms::find()
            ->where(['status' => Forms::STATUS_PROCESS])
            ->all();
    }

    /**
     * {@inheritdoc}
     */



    public function getId()
    {   
        return $this->getPrimaryKey();
        //return $this->getPrimaryKey();
    }

}
