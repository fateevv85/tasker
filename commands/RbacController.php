<?php

namespace app\commands;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionRun()
    {
        $am = \Yii::$app->authManager;

        $admin = $am->createRole('admin');
        $moder = $am->createRole('moderator');

        $am->add($admin);
        $am->add($moder);

        $operationCreate = $am->createPermission('createTask');
        $operationDelete = $am->createPermission('deleteTask');

        $am->add($operationCreate);
        $am->add($operationDelete);

        $am->addChild($admin, $operationCreate);
        $am->addChild($admin, $operationDelete);

        $am->addChild($moder, $operationCreate);

        $am->assign($admin, 3);
        $am->assign($moder, 15);
    }
}
