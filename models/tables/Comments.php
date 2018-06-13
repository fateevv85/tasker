<?php

namespace app\models\tables;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\imagine\Image;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $user_id
 * @property int $task_id
 * @property string $content
 * @property string $picture
 * @property string $picture_small
 * @property string $created_at
 *
 * @property Task $user
 * @property Users $user0
 */
class Comments extends \yii\db\ActiveRecord
{

    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'task_id', 'content'], 'required'],
            [['user_id', 'task_id'], 'integer'],
            [['content'], 'string'],
//            [['created_at'], 'safe'],
            [['picture', 'picture_small'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['image'], 'image', 'extensions' => 'jpg, png', 'maxSize' => 1024 * 1024 * 5]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'task_id' => 'Task ID',
            'content' => 'Comment',
            'picture' => 'Picture',
            'picture_small' => 'Picture Small',
//            'created_at' => 'Created At',
            'image' => 'Upload image'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Task::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public function uploadsImage()
    {
        $fileName = $this->image->getBaseName() . '.' . $this->image->getExtension();
        $this->image->saveAs('img/' . $fileName);

        Image::thumbnail($fileName, 200, 100)
            ->save(\Yii::getAlias('@webroot/img/small/' . $fileName));
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => '\yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

}
