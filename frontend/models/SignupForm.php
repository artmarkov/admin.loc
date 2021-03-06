<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $id;
    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id', 'required'],// делаем update по ключу
            ['username', 'trim'],
            ['username', 'required'],
           // ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => \Yii::t('app', 'This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            // разрешаем регистрацию если емайл уже есть
           // ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => \Yii::t('app', 'This email address has already been taken.')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('app', 'Username'),
            'email' => \Yii::t('app', 'Email'),
            'password' => \Yii::t('app', 'Password'),
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    /* public function signup()
     {
         if (!$this->validate()) {
             return null;
         }

         $user = new User();
         $user->username = $this->username;
         $user->email = $this->email;
         $user->setPassword($this->password);
         $user->generateAuthKey();

         return $user->save() ? $user : null;
     }*/
}
