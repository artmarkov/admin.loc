<?php
namespace common\rules;

use yii\rbac\Rule;

class AuthorRule extends Rule {
    public $name = 'isAuthor'; // Имя правила

    public function execute($user_id, $item, $params)
    {
        if(isset($params['user_id']) and  $params['user_id'] == $user_id) return true;
        else return false;
    }
}