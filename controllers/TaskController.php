<?php

namespace app\controllers;

use app\models\behaviors\MyBehavior;
use app\models\LoginForm;
use app\models\tables\Users;
use app\models\Task;
use app\models\Test;
use yii\base\Event;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\User;
use app\models\tables\Task as TaskTables;

class TaskController extends Controller
{
    public function actionIndex()
    {

        $user_id = \Yii::$app->user->getId();
        $month = (\Yii::$app->request->get()['date']) ?: date('n');
        $tasks = TaskTables::getBySelectedMonth($user_id, $month);
        $calendar = array_fill_keys((range(1, date('t', mktime(0, 0, 0, $month)))), []);

        foreach ($tasks as $task) {
            $date = \DateTime::createFromFormat('Y-m-d', $task->date);
            $calendar[$date->format('j')][] = $task;
        }

        /*
                $dataProvider = new ActiveDataProvider([
                    'query' => $calendar,
                    'pagination' => [
                        'pageSize' => 10,
                    ]
                ]);
        */

        return $this->render('index', ['calendar' => $calendar, 'month' => $month]);
    }

    public function actionEvents()
    {
        $user_id = \Yii::$app->user->getId();
        $date = \Yii::$app->request->get()['date'];
//        var_dump($date);
        $tasks = TaskTables::getBySelectedDay($user_id, $date);
        $dataProvider = new ActiveDataProvider([
            'query' => $tasks,
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        return $this->render('events', ['dataProvider' => $dataProvider, 'date' => $date]);
    }

    /*
    $model = new Task([
        'title' => 'Hello',
        'content' => 'I am using Yii',
        'author' => 'Vasiliy',
        'time' => date('Y-m-d')
    ]);
*/
    /*
    $model->load([
        'Task' => [
            'title' => 'Hello',
            'content' => 'I am using Yii',
            'author' => 'Vasiliy',
            'time' => date('Y-m-d')
        ]
    ]);
    */
    /*
    $model->attributes = ['title' => 'title', 'content' => 'this is content'];
    */
//        var_dump($model->validate());

    /*
    return $this->render('index',
        [
            'title' => $model->title,
            'content' => $model->content,
            'author' => $model->author,
            'time' => $model->time
        ]);*/

//        return $this->render('index', $model->toArray());


//    public function actionTest()
//    {
//        var_dump('privet');
//        var_dump(\Yii::$app->db);

//        CREATE
    /*
    \Yii::$app->db->createCommand("
    CREATE TABLE test (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255)
    )
    ")->execute();
    */

//        INSERT
    /*
    \Yii::$app->db
        ->createCommand("
            INSERT INTO test(title) VALUES (:title)
            ")
        ->bindValue(":title", "test2")
        ->execute();
    */

//        SELECT
    /*
    $res = \Yii::$app->db
        ->createCommand("SELECT * FROM test")
        ->queryOne();
    */
    /*
    $res = \Yii::$app->db
        ->createCommand("SELECT title FROM test")
        ->queryColumn();
    */
    /*
            $res = \Yii::$app->db
                ->createCommand("SELECT * FROM test")
                ->queryAll();

            var_dump($res);

            exit;
    */
//    }

    public function actionArTest()
    {
//        CREATE
        /*
                        $user = new Users();
                        $user->login = '123';
                        $user->password = md5('123');
                        $user->role_id = 2;
                        $user->save();
                        var_dump($user);
        */

//        FIND

//        $user = Users::findOne(1);
        // or
//        $user = Users::findOne(['login' => '123']);
//        $user->password = md5('123');

        /*
        // some records
        // $res = Users::findAll([1,3]);
        // all rows
        $res = Users::find()->all();
        var_dump($res);
        */
        /*
                $id = 1;
                $res = Users::find()
                    ->select('*')
        //            ->from('users')
        //            ->where('login = Pupkin');
        //            ->where(['=', 'id', 1])
        //            ->where('id = 1')
                    ->where('id = :id', [':id' => $id])
        //            ->where(new Expression(''))
                    ->one();
        //            ->all();

                var_dump($res);

                //CREATE OWN METHOD
                $res = Users::getAdmins();
                var_dump($res);
        */
//        DELETE
        /*
        $user = Users::findOne(2);
        $user->delete();
        Users::deleteAll(['login' => 'admin']);
        */

//        var_dump(Users::findOne(1)->getRole());
//        $user= Users::findOne(1);
//        var_dump($user->role);
        /*
                $res = Users::getAdmins();
                var_dump($res);
        */

        //FOR HOME WORK
        /*
                $user = Users::findOne(['login' => '123']);
                $model = new LoginForm();

                $model->attributes = [
                    'username' => 123,
                    'password' => 123,
                ];

        //        $model->load($user->toArray());
        //        $userAr = $user->toArray();
        //        $userAr['usernamelogin'] = $userAr['login'];
        //        unset($userAr['login']);
        //        var_dump($userAr);
        //        $newuser = new \app\models\User($user->forUserConstruct());
        //        $newuser = new \app\models\User(['username'=> $userAr['login']]);
        //        $newuser->username = $user['login'];
        //        var_dump($model);
        //        var_dump($user);
        //        var_dump($user->forUserConstruct());
        //        var_dump($user->fields());
        //        var_dump($newuser);
        //        var_dump($newuser->getUsername());
        //        var_dump($newuser);
        //        var_dump('identity', \Yii::$app->user->identity);
        //        var_dump($model->getUser());

                exit;
        */
    }

    public function actionCreate()
    {
        $model = new TaskTables();

        $model->on(TaskTables::EVENT_AFTER_INSERT, function ($e) {
            if ($user = Users::findOne($e->sender->user_id)) {
                \Yii::$app->mailer->compose()
                    ->setTo($user->email)
                    ->setFrom('tasker_message@mail.ru')
                    ->setSubject('New task for you!')
                    ->setTextBody("New task for you, id: {$e->sender->id}")
                    ->send();
            }
        });
//31:59
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            $this->redirect(['task/index']);
        };

        return $this->render('create', ['model' => $model]);
    }

    public function actionTest()
    {
        //HANDLERS
        /*
        $model = new Test();
        $handler = function ($e) {
            var_dump($e);
            echo 'handler is work';
        };*/
        /*
        $model->on(Test::EVENT_RUN_START, function () {
            echo 'handler is work';
        });
        */
        /*
                Event::on(Test::className(), Test::EVENT_RUN_START, $handler);
        */
        //for methods from object
//        $model->on(Test::EVENT_RUN_START, [$model, 'goOn']);
        //for static methods
//        $model->on(Test::EVENT_RUN_START, [Test::className(), 'goOn']);
//        $model->run();

        //BEHAVIORS
        $model = new Test();
        $model->attachBehavior('my', [
            'class' => MyBehavior::className(),
            'message' => 'i am a mighty behavior!!'
        ]);
        $model->foo();
        $model->detachBehavior('my');
        exit;
    }

}