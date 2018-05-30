<?php

namespace app\models;


use yii\base\Model;

class Task extends Model
{
    public $id;
    public $user;
    public $title;
    public $description;
    public $start_time;
    public $finish_time;

    public function rules()
    {
        return [
            [['title', 'content', 'author'], 'required'],
            [['time'], 'safe']
        ];
    }
}