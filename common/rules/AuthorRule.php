<?php
namespace common\rules;

use yii\rbac\Rule;

class AuthorRule extends Rule {
    public $name = 'isAuthor'; // Имя правила

    public function execute($user_id, $item, $params)
    {
        return isset($params['post']) ? $params['post']->author_id == $user_id : false;
    }
}