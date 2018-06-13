<?php

namespace app\models;


use app\models\behaviors\MyBehavior;
use app\models\events\TestRunStartEvent;
use yii\base\Event;
use yii\base\Model;
use yii\web\UploadedFile;

class Test extends Model
{
    public $title;
    public $content;
    /** @var UploadedFile */
    public $image;

    const EVENT_RUN_START = 'run_start';

    public function rules()
    {
        return [
            [['image'], 'image', 'extensions' => 'jpg, png', 'maxSize' => 1024 * 1024 * 5],
//            [['title'], 'required'],
//            [['content'], 'safe']
        ];
    }

    public function uploadsImage()
    {
        $fileName = "@webroot/img/". $this->image->getBaseName().'.'.$this->image->getExtension();

        $this->image->saveAs(\Yii::getAlias($fileName));
    }

    public function run()
    {
        $this->trigger(static::EVENT_RUN_START, new TestRunStartEvent(['id' => 2]));
        echo 'method run is start!';
        echo 'method run is active!';
        echo 'method run is finished!';
    }

    public function goOn()
    {
        echo 'method goOn is start!';
    }
    /*
        public function behaviors()
        {
            return [
    //            'my' => MyBehavior::className()
                'my' => [
                    'class' => MyBehavior::className(),
                    'message' => 'i am a behavior1'
                ]
            ];
        }*/

}
