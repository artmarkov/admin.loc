<?php

namespace common\components;

use dosamigos\transliterator\TransliteratorHelper;
use yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;
use common\models\User;
class SignupBehavior extends Behavior
{
    public $error = 'error';
    public $surname = 'surname';
    public $name = 'name';
    public $patronymic = 'patronymic';
    public $birthday = 'birthday';

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'validateUser'
        ];
    }
    public function validateUser($event)
    {
        $user = User::findOne([
            'status' => User::STATUS_INIT,
            'surname' => $this->owner->{$this->surname},
            'name' => $this->owner->{$this->name},
            'patronymic' => $this->owner->{$this->patronymic},
            'birthday' => $this->owner->{$this->birthday},
        ]);
//    echo  $this->owner->{$this->username} = TransliteratorHelper::process(mb_strtolower($this->owner->{$this->surname}, 'UTF-8'));
//            echo '<pre>';
//            var_dump($user);

        if (!$user) {
           return $this->owner->{$this->error} = false;
        }

        return $this->owner->{$this->error} =  true;
    }

}