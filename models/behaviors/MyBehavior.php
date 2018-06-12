<?php

namespace app\models\behaviors;

use yii\base\Behavior;

class MyBehavior extends Behavior
{
    public $message;

    public function foo()
    {
        var_dump($this->owner);
        echo $this->message;
//        echo 'i am a behavior';
    }

}
