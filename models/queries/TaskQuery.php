<?php

namespace app\models\queries;


use app\models\tables\Task;
use yii\db\ActiveQuery;

class TaskQuery extends ActiveQuery
{
    protected $query;

    public function init()
    {
        parent::init();
        $this->query = Task::find();
    }
}