<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\tables\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

  <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
      <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <?php \app\widgets\MyWidget::begin([
        //show whats in 'init' function
        'message' => 'hello'
  ]);

  //function 'run'
  \app\widgets\MyWidget::end();

  ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            /*
            [
                'label' => 'test',
                'value' => function($model){
      return $model->name.$model->id;
                }
            ],
            */
            'name',
            'date',
            'description:ntext',
            'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
