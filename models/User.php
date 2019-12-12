<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "tb_user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accesToken
 * @property string $nama_lengkap
 * @property string $email
 * @property string $alamat
 * @property string $jabatan
 * @property string $level
 * @property string $foto_profil
 * @property string $jenis_kelamin
 *
 * @property TbBarangKeluar[] $tbBarangKeluars
 * @property TbBarangMasuk[] $tbBarangMasuks
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accesToken', 'nama_lengkap', 'email', 'alamat', 'jabatan', 'level', 'foto_profil', 'jenis_kelamin'], 'required'],
            [['level', 'jenis_kelamin'], 'string'],
            [['username', 'authKey', 'accesToken', 'nama_lengkap', 'email', 'alamat', 'jabatan', 'foto_profil'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accesToken' => 'Acces Token',
            'nama_lengkap' => 'Nama Lengkap',
            'email' => 'Email',
            'alamat' => 'Alamat',
            'jabatan' => 'Jabatan',
            'level' => 'Level',
            'foto_profil' => 'Foto Profil',
            'jenis_kelamin' => 'Jenis Kelamin',
        ];
    }


    public static function findIdentity($id)
    {
        $user = User::findOne($id);

        if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }


    public static function findIdentityByAccessToken($token, $type = null) {
        $user = User::find()->where(['accesToken' => $token])->one();

        if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }



     public static function findByUsername($username) {

        $user = User::find()->where(['username' => $username])->one();

        if ($user != null) {
            return $user;
        }else{
            return null;
        }
    }


    public function getId(){
        return $this->id_user;
    }

    public function getAuthKey(){
        return $this->authKey;
    }


    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }

    public function validatePassword($password){
        return $this->password === $password;
    }

}
