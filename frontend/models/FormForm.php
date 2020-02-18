<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Forms;

/**
 * ContactForm is the model behind the contact form.
 */
class FormForm extends Model
{
    public $caseid;
	public $phonenum;//nomor telepon, biar bisa di kontak
    public $name;
    public $location;//gedung, lantai, ruangan
    public $tanggalwaktu;//tanggal waktu, auto?
    public $description;//posisi potensi  kecelakaan
    public $gambar;//gambar, bisa lebih dari 1?
    public $casedue;
    public $email;
    public $status;


    const STATUS_ACTIVE = "Process";


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email','caseid','phonenum','location','tanggalwaktu','description','gambar','casedue','status'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
        ];
    }

    public function saveData(){
        $forms = new Forms();
    	//$forms->caseid = $this->caseid; auto increment
    	$forms->phonenum = $this->phonenum;
    	$forms->name = $this->name;
    	$forms->location = $this->location;
        $forms->description = $this->description;
        $forms->gambar = $this->gambar;

        $forms->email = "Email";

    	$forms->tanggalwaktu = date('Y-m-d H:i:s');
    	$forms->casedue = date('Y-m-d H:i:s');
    	$forms->status = "Process";
        //echo $forms->name;
        return $forms->save();
        //return $this->name;
    }

    public function getForms(){
        $forms = new Forms();
        return $forms->getForms();
    }

    public function check(){
    	return $this->name;
    	//return true;
    }

    /**
     * {@inheritdoc}
     */
    // public function attributeLabels()
    // {
    //     return [
    //         'verifyCode' => 'Verification Code',
    //     ];
    // }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    // public function sendEmail($email)
    // {
    //     return Yii::$app->mailer->compose()
    //         ->setTo($email)
    //         ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
    //         ->setReplyTo([$this->email => $this->name])
    //         ->setSubject($this->subject)
    //         ->setTextBody($this->body)
    //         ->send();
    // }
}
