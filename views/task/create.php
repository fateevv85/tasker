<?php
/** @var \app\models\tables\Task $model */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

//\yii\widgets\ActiveForm::widget([]);
$form = ActiveForm::begin([
    'id' => 'create_task',
    'options' => [
        'class' => 'form-vertical'
    ],

]);

echo $form->field($model, 'name')->textInput();
echo $form->field($model, 'date')->textInput(['type'=>'date'])->hint('input date');
echo $form->field($model, 'description')->textarea()->hint('describe your task');
echo $form->field($model, 'user_id')->textInput();
echo Html::submitButton('Create', ['class'=>'btn btn-success']);

ActiveForm::end();
