<?php

namespace app\controllers;


use app\models\Task;
use yii\web\Controller;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $model = new Task();
        $model->load([
            'Task' => [
                'title' => 'Hello',
                'content' => 'I am using Yii',
                'author' => 'Vasiliy',
                'time' => date('Y-m-d')
            ]
        ]);
        $model->validate();
//        var_dump($model->toArray());
        /*
        return $this->render('index',
            [
                'title' => $model->title,
                'content' => $model->content,
                'author' => $model->author,
                'time' => $model->time
            ]);*/

//        return $this->render('index', $model->toArray());
        return $this->render('index', ['model' => $model]);
    }

}