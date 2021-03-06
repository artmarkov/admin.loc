<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use himiklab\yii2\recaptcha\ReCaptchaValidator;
use common\models\User;
/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
//    public $verifyCode;
    public $reCaptcha;
    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],
            [
                ['reCaptcha'], ReCaptchaValidator::className(),
                'secret' => '6Lf6gV4UAAAAANvOPDtx_2obe-hxVKnbeDjUCcfI',
                'uncheckedMessage' => \Yii::t('app', 'Please confirm that you are not a bot.')
            ],
        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => \Yii::t('app', 'Username'),
            'password' => \Yii::t('app', 'Password'),
            'rememberMe' => \Yii::t('app', 'Remember Me'),
//            'verifyCode' => \Yii::t('app', 'Verification Code'),
            'reCaptcha' => \Yii::t('app', 'reCaptcha'),
        ];
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
   /* public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }*/
    public function login() { if ($this->validate()) { $user = $this->getUser(); if($user->status === User::STATUS_ACTIVE){ return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0); } if($user->status === User::STATUS_WAIT){ throw new \DomainException('To complete the registration, confirm your email. Check your email.'); } } else { return false; } }
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
