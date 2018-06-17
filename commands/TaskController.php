<?php

namespace app\commands;


use app\models\tables\Task;
use app\models\tables\Users;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class TaskController extends Controller
{

    public $attribute = null;
    private $defAttribute = 'name';

    /**
     * Test action
     */
    public function actionTest($id)
    {

        if (!$model = Task::findOne($id)) {
            return ExitCode::UNSPECIFIED_ERROR;
        }
//        var_dump($model->getAttributes());
//        $model->
//        $attribute = $this->attribute ?: $this->defAttribute;
//        var_dump($model->$attribute);
//        Console::stdout('test', Console::BG_RED);
        return ExitCode::OK;

    }

    public function actionTestTwo()
    {
        Console::startProgress(1, 20);
        for ($i = 1; $i < 20; $i++) {
            sleep(1);
            Console::updateProgress($i, 20);
        }
        Console::endProgress();
    }

    public function actionDeadLine()
    {
        $day = date('d') + 3;
        $model = Task::find()
            ->where(['date' => date("Y-m-{$day}")])
            ->all();

        foreach ($model as $task) {
            if ($user = Users::findOne($task->getAttribute('user_id'))) {
                \Yii::$app->mailer->compose()
                    ->setTo($user->getAttribute('email'))
                    ->setFrom('tasker_message@mail.ru')
                    ->setSubject('Task is near dead-line!')
                    ->setTextBody("Your task is near dead-line,{$user->getAttribute('login')}. Task name: {$task->getAttribute('name')}. Description: {$task->getAttribute('description')}")
                    ->send();

            }
        }
    }

    public function options($actionID)
    {
        return ['attribute'];
    }

    public function optionAliases()
    {
        return ['a' => 'attribute'];
    }
}
