<div class="container">
  <h4>List of current tasks</h4>
  <div class="row">
    <div style="margin-bottom: 15px">

        <?php

        use \yii\helpers\Html;
        use \yii\widgets\ActiveForm;

        $form = ActiveForm::begin([
            'id' => 'create_task',
            'action' => [''],
            'method' => 'get',
            'options' => [
                'class' => 'form-vertical'
            ],

        ]);

        echo Html::tag('div',
            Html::dropDownList('date', $month, [
                "1" => 'January',
                "2" => 'February',
                "3" => 'March',
                "4" => 'April',
                "5" => 'May',
                "6" => 'June',
                "7" => 'July',
                "8" => 'August',
                "9" => 'September',
                "10" => 'October',
                "11" => 'November',
                "12" => 'December'
            ], ['class' => 'form-control']),
            ['class' => 'col-xs-3']);


        echo Html::submitButton('select', ['class' => 'btn btn-success']);

        ActiveForm::end();
        ?>
    </div>
  </div>
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
</div>