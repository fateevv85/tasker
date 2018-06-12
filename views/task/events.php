<h3>Events for current date: <?= $date ?></h3>

<?php
/*
echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'tag' => 'div',
        'class' => 'list-wrapper',
        'id' => 'list-wrapper',
    ],
    'itemView' => '_list_item'
]);


var_dump($dataProvider);
*/


echo \yii\grid\GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'name',
        'date',
        'description:ntext',
        'user_id',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
