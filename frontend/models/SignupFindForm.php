<?php
/**
 * Created by PhpStorm.
 * User: Артур
 * Date: 17.06.2018
 * Time: 19:58
 */

namespace frontend\models;

use yii\base\Model;
use common\models\User;

class SignupFindForm extends Model
{
   // public $id;
    public $error;
    public $surname;
    public $name;
    public $patronymic;
    public $birthday;

    public function behaviors()
    {
        return [
            'SignupBehavior' => [
                'class' => 'common\components\SignupBehavior',
                'surname' => 'surname',
                'name' => 'name',
                'patronymic' => 'patronymic',
                'birthday' => 'birthday',
                'error' => 'error',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'patronymic'], 'trim'],
            [['surname', 'name', 'patronymic', 'birthday'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'surname' => \Yii::t('app', 'Surname'),
            'name' => \Yii::t('app', 'Name'),
            'patronymic' => \Yii::t('app', 'Patronymic'),
            'birthday' => \Yii::t('app', 'Birthday'),
        ];
    }
}