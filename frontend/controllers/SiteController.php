<?php
namespace frontend\controllers;

use Yii;
use common\models\User;
use frontend\models\SignupFindForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\controllers\AppController;
use common\services\auth\SignupService;


/**
 * Site controller
 */
class SiteController extends AppController
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            /* 'captcha' => [
                 'class' => 'yii\captcha\CaptchaAction',
                 'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
             ],*/
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $form = new LoginForm();
        if ($form->load(Yii::$app->request->post())) {
            try {
                if ($form->login()) {
                    return $this->goBack();
                }
            } catch (\DomainException $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
                return $this->goHome();
            }
        }
        return $this->render('login', ['model' => $form,]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', \Yii::t('app', 'Thank you for contacting us. We will respond to you as soon as possible.'));
            } else {
                Yii::$app->session->setFlash('error', \Yii::t('app', 'There was an error sending your message.'));
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */

    public function actionSignupFind()
    {
        $model = new SignupFindForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user = User::findByFio($model->surname, $model->name, $model->patronymic, $model->birthday, User::STATUS_INIT);
            if ($user) {
                return $this->redirect(['signup', 'auth_key' => $user->auth_key]);
            } else {
                Yii::$app->session->setFlash('error', \Yii::t('app', 'Пользователь в системе не найден или заблокирован.'));
            }
        }
        return $this->render('signupFind', ['model' => $model,]);
    }
    /**
     *
     *
     *
     */
    public function actionSignup($auth_key)
    {
        $user = User::findByAuthKey($auth_key);
        if (!$user) {
            Yii::$app->session->setFlash('error', \Yii::t('app', 'Неправильная контрольная сумма.'));
            return $this->goHome();
        }
        $form = new SignupForm();
        if (empty($user->username)) {
            $username = User::generateUsername($user->surname, $user->name, $user->patronymic);
        } else {
            $username = $user->username;
        }
        $form->setAttributes(
            [
                'username' => $username,
                'id' => $user->id,
            ]
        );

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $signupService = new SignupService();
            try {
                $user = $signupService->signup($form);
                Yii::$app->session->setFlash('success', \Yii::t('app', 'Check your email to confirm the registration.'));
                $signupService->sentEmailConfirm($user);
                return $this->goHome();
            } catch (\RuntimeException $e) {
                Yii::$app->errorHandler->logException($e);
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
        }
        return $this->render('signup', ['model' => $form,]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */

    public function actionSignupConfirm($token)
    {
        $signupService = new SignupService();
        try {
            $signupService->confirmation($token);
            Yii::$app->session->setFlash('success', \Yii::t('app', 'You have successfully confirmed your registration.'));
        } catch (\Exception $e) {
            Yii::$app->errorHandler->logException($e);
            Yii::$app->session->setFlash('error', $e->getMessage());
        }
        return $this->goHome();
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', \Yii::t('app', 'Check your email for further instructions.'));

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', \Yii::t('app', 'Sorry, we are unable to reset password for the provided email address.'));
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', \Yii::t('app', 'New password saved.'));

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionProfile()
    {
        return $this->render('profile');
    }
}
