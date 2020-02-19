<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Images extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{images}}';
    }

    // public function getForms(){
    //     return $forms = Forms::find()
    //         ->where(['status' => Forms::STATUS_PROCESS])
    //         ->all();
    // }

    /**
     * {@inheritdoc}
     */



    // public function getId()
    // {
    //     return $this->getPrimaryKey();
    // }

}
