<?php
namespace backend\sistem\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii;

Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/image/';
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 1],
        ];
    }

    public function getImageFile()
    {
        return isset($this->imageFiles) ? Yii::$app->params['uploadPath'] . $this->imageFiles : null;
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
        $file_name = $this->imageFiles = 'klinik_sehat-'.date('ymdHis').".{$ext}"; //$image->name;//Yii::$app->security->generateRandomString().".{$ext}";

        // the uploaded image instance
        return $image;
    }
    
}