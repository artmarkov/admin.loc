<?php

namespace backend\controllers;


use Yii;
use yii\web\Controller;
use common\rules\AuthorRule;

class RuleController extends Controller {


    public function actionIndex()   {

        /*  $role = Yii::$app->authManager->createRole('admin');
          $role->description = 'Администратор';
          Yii::$app->authManager->add($role);

          $role = Yii::$app->authManager->createRole('content');
          $role->description = 'Контент менеджер';
          Yii::$app->authManager->add($role);

          $role = Yii::$app->authManager->createRole('user');
          $role->description = 'Пользователь';
          Yii::$app->authManager->add($role);

          $role = Yii::$app->authManager->createRole('banned');
          $role->description = 'Нарушитель';
          Yii::$app->authManager->add($role);*/

        /* $permit = Yii::$app->authManager->createPermission('canAdmin');
         $permit->description = 'Право входа в админку';
         Yii::$app->authManager->add($permit);*/

        /* $role_a = Yii::$app->authManager->getRole('admin');
         $role_b = Yii::$app->authManager->getRole('content');
         $permit = Yii::$app->authManager->getPermission('canAdmin');
         Yii::$app->authManager->addChild($role_a, $permit);
         Yii::$app->authManager->addChild($role_b, $permit);*/

        /* $userRole = Yii::$app->authManager->getRole('admin');
         Yii::$app->authManager->assign($userRole, Yii::$app->user->getId());*/

         /*$auth = Yii::$app->authManager;

        // добовляем правило
         $rule = new AuthorRule();
         $auth->add($rule);*/

        /*// добавляем право "updateOwnPost" и связываем правило с ним
                $updateOwnPost = $auth->createPermission('updateOwnPost');
                $updateOwnPost->description = 'Редактировать посты';
                $updateOwnPost->ruleName = $rule->name;
                $auth->add($updateOwnPost);

        // "updateOwnPost" наследует право "updatePost"
                $updatePost = Yii::$app->authManager->getPermission('updatePost');
                $auth->addChild($updateOwnPost, $updatePost);

                $author = Yii::$app->authManager->getRole('author');
        // и тут мы позволяем автору редактировать свои посты
                $auth->addChild($author, $updateOwnPost);*/


        return 'Готово';
    }
}