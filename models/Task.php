<?php

namespace app\models;


use yii\base\Model;

class Task extends Model
{
    public $title;
    public $content;
    public $author;
    public $time;

    public function rules()
    {
        return [
            [['title', 'content', 'author'], 'required'],
            [['time'], 'safe']
        ];
    }
}