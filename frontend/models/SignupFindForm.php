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

    public $surname;
    public $name;
    public $patronymic;
    public $birthday;


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

    public function getUsername()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_INIT,
            'surname' => $this->surname,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'birthday' => $this->birthday,
        ]);

        if (!$user) {
            return false;
        }

        return true;
    }
}