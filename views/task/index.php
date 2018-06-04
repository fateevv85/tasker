<h3>List of current tasks for <?= date('F') ?></h3>
<?php

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'tag' => 'div',
        'class' => 'list-wrapper',
        'id' => 'list-wrapper',
    ],
    'itemView' => '_list_item'
]);

?>
