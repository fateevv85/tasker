<?php

namespace app\widgets;

use yii\base\Widget;

class MyWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        echo '----start----';

    }

    public function run()
    {
        return $this->render('my_widget', ['message' => $this->message]);
    }
}
