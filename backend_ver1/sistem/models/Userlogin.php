<?php

namespace backend\sistem\models;

use Yii;
use app\hrd\models\Employe;
use yii\web\UploadedFile;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $nip
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/image/';
class Userlogin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const SCENARIO_CREATE = 'create'; // create user

    const SCENARIO_UPDATE = 'update'; // update user

    public $imageFiles;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username','email','password_hash','jenis_kelamin'], 'required','on'=>self::SCENARIO_CREATE], //call scenario validasi create
            [['status', 'created_at', 'updated_at','jenis_kelamin'], 'integer'],
            [['imageFiles'], 'file', 'extensions' => 'png, jpg'],
            [['img_profile','auth_key'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            // [['auth_key'], 'string', 'max' => 32],
            // [['username'], 'unique'],
            [['email'], 'unique','on'=>self::SCENARIO_CREATE],
            [['username'], 'unique','on'=>self::SCENARIO_CREATE],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nip' => 'Nip',
            'username' => \Yii::t('app', 'Your name'),
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getImageFile()
    {
        return isset($this->img_profile) ? Yii::$app->params['uploadPath'] . $this->img_profile : null;
    }


    public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'imageFiles');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
       

        }

        // store the source file name
        //$this->filename = $image->name;
        $ext = end((explode(".", $image->name)));

        // generate a unique file name
        $this->img_profile = 'klinik-'.date('ymdHis').".{$ext}"; //$image->name;//Yii::$app->security->generateRandomString().".{$ext}";

        // the uploaded image instance
        return $image;
    }
}
