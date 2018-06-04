<h3>List of current tasks</h3>
<?php

echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'tag' => 'div',
        'class' => 'list-wrapper',
        'id' => 'list-wrapper',
    ],
]);

?>
