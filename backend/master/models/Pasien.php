<?php

namespace backend\master\models;

use Yii;
use backend\master\models\Agama;
use backend\sistem\models\Userlogin;

/**
 * This is the model class for table "pasien".
 *
 * @property string $id
 * @property string $kd_pasien
 * @property string $nama_pasien
 * @property string $pekerjaan
 * @property string $id_agama
 * @property string $alamat
 * @property string $telp
 * @property integer $status
 * @property string $user_create
 * @property string $user_update
 * @property string $date_create
 * @property string $date_update
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_agama', 'status', 'user_create', 'user_update','umur','jenis_kelamin'], 'integer'],
            [['alamat','riwayat_alergi'], 'string'],
            [['alamat','riwayat_alergi','id_agama','jenis_kelamin','umur','telp','nama_pasien','pekerjaan'], 'required'],
            ['nama_pasien', 'match', 'pattern' => '/^[a-zA-Z0-9 _-]+$/'],
            [['date_create', 'date_update','nomer_alias_pasien'], 'safe'],
            [['kd_pasien'], 'string', 'max' => 50],
            [['nama_pasien', 'pekerjaan'], 'string', 'max' => 225],
            [['telp'], 'integer'],
            [['nomer_alias_pasien'],'unique']
        ];
    }

     public function getUserTbl1(){
        return $this->hasOne(Userlogin::className(), ['id' => 'user_create']);
    }

    public function getUserTbl2(){
        return $this->hasOne(Userlogin::className(), ['id' => 'user_update']);
    }

    public function getPembuat(){
        return $this->userTbl1 != ''? $this->userTbl1->username:'none';
    }

     public function getPengupdate(){
        return $this->userTbl2 != ''? $this->userTbl2->username:'none';
    }

     public function getAgamaTbl(){
        return $this->hasOne(Agama::className(), ['id_agama' => 'id_agama']);
    }

     public function getRekamheaderTbl(){
        return $this->hasOne(RekamHeader::className(), ['id_pasien' => 'id']);
    }

    public function getKdRekamheader(){
        return $this->rekamheaderTbl != '' ? $this->rekamheaderTbl->kd_rekam_medis : 'none';
    }

    public function getAgamaNama(){
         return $this->agamaTbl != '' ? $this->agamaTbl->nama_agama : 'none';
    }


    public function getNomerLama(){
         return $this->nomer_alias_pasien != '' ? $this->nomer_alias_pasien : 'none';
    }

    public function getJeniskelaminx(){
         return $this->jenis_kelamin  ? 'Laki-Laki' : 'Perempuan';
    }

    public function getRiwayatx(){
         return $this->riwayat_alergi != ''  ? $this->riwayat_alergi : 'tidak ada';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kd_pasien' => 'Kd Pasien',
            'nama_pasien' => 'Nama Pasien',
            'pekerjaan' => 'Pekerjaan',
            'id_agama' => 'Id Agama',
            'alamat' => 'Alamat',
            'telp' => 'Telp',
            'status' => 'Status',
            'user_create' => 'User Create',
            'user_update' => 'User Update',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'jenis_kelamin' => 'Jenis Kelamin'
        ];
    }
}
