<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use himiklab\yii2\recaptcha\ReCaptchaValidator;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    public $username;
//    public $verifyCode;
    public $reCaptcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email','username'], 'trim'],
            [['email','username'], 'required'],
            ['email', 'email'],
            ['username', 'exist',
                'targetAttribute' => ['email','username'],
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => \Yii::t('app', 'User with entered data not found or blocked.')
            ],
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
//            'verifyCode' => \Yii::t('app', 'Verification Code'),
            'reCaptcha' => \Yii::t('app', 'reCaptcha'),
        ];
    }
    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] =>  'Робот ' . Yii::$app->name])
            ->setTo($this->email)
            ->setSubject('Сброс пароля для ' . Yii::$app->name)
            ->send();
    }
}
