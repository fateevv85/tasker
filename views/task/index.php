<h3>List of current tasks for <?= date('F') ?></h3>
<table class="table table-bordered">
  <tr>
    <td>Date</td>
    <td>Task</td>
    <td>Total tasks</td>
  </tr>
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
    */

    foreach ($calendar as $day => $events):?>
      <tr>
        <td class="td-date">
    <span class="label label-success">
      <?= $day ?>
    </span>
        </td>
        <td>
            <?php if (count($events) > 0) {
                $i = 0;
                foreach ($events as $event) {
                    echo '<p>' . ++$i . ') ' . '<strong>' . $event->name . '</strong>' . '</p><p class="small"><em>' . $event->description . '</em></p>';
                }
            } else {
                echo '-';
            }
            ?>
        </td>
        <td class="td-event">
            <?= (count($events) > 0) ? \yii\helpers\Html::a(count($events), \yii\helpers\Url::to(['task/events', 'date' => $events[0]->date])) : '-'; ?>
        </td>
      </tr>
    <?php endforeach; ?>
</table>
