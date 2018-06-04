<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\task */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-view">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
      <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Delete', ['delete', 'id' => $model->id], [
          'class' => 'btn btn-danger',
          'data' => [
              'confirm' => 'Are you sure you want to delete this item?',
              'method' => 'post',
          ],
      ]) ?>
  </p>

<!--  --><?//=yii\widgets\ListView::widget();  ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
/*
            [
                'label' => 123,
                'value' => 'sdfsd',
                'format' => 'ntext',
                'contentOptions' => ['class' => 'q'],
                'captionOptions' => ['class' => 'w']
            ],
*/
            'date',
//            'description:ntext',
            'description:html',
            'user_id',
        ],
    ]) ?>

</div>
