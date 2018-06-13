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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'date',
            'description:html',
            'user_id',
        ],
    ]);
    ?>

    <?php
    $form = \yii\widgets\ActiveForm::begin([
        'id' => 'add_comment'
    ]);

    echo $form->field($comment, 'content')->textarea(['rows' => 3]);

    echo $form->field($comment, 'image')->fileInput();

    echo Html::submitButton('Add comment', ['class' => 'btn btn-success']);
    \yii\widgets\ActiveForm::end();
    ?>

  <div class="row">
      <?php
      foreach ($comments as $item) :
          ?>
        <div class="col-lg-12">
          <div>
              <?php
              echo $item['content'];
              ?>
          </div>
          <?php if ($item['picture']) :?>
          <a href="<?= $item['picture'] ?>">
            <img src="<?= $item['picture_small'] ?>" alt="picture" class="img-responsive img-rounded img-thumbnail">
          </a>
          <?php endif; ?>
          <div> Comment from:
              <?php
              echo $item['user_id'];
              ?>
          </div>
          <div>
              <?php
              echo $item['created_at'];
              ?>
          </div>
        </div>
        <hr>
      <?php endforeach; ?>
  </div>
</div>
