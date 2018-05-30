<?php

namespace app\controllers;


use app\models\LoginForm;
use app\models\tables\Users;
use app\models\Task;
use yii\db\Expression;
use yii\web\Controller;
use yii\web\User;

class TaskController extends Controller
{
    public function actionIndex()
    {
        $model = new Task([
            'title' => 'Hello',
            'content' => 'I am using Yii',
            'author' => 'Vasiliy',
            'time' => date('Y-m-d')
        ]);

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
        return $this->render('index', ['model' => $model]);
    }

    public function actionTest()
    {
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
    }

    public function actionArTest()
    {
//        CREATE
        /*
                $user = new Users();
                $user->login = 'Sidorov';
                $user->password = md5('admin');
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
        $user = Users::findOne(['login' => '123']);
        $model = new LoginForm();
        /*
        $model->attributes = [
            'username' => 123,
            'password' => 123,
        ];*/

//        $model->load($user->toArray());
//        $userAr = $user->toArray();
//        $userAr['usernamelogin'] = $userAr['login'];
//        unset($userAr['login']);
//        var_dump($userAr);
        $newuser = new \app\models\User($user->toArray());
        $newuser->username = $user['login'];
//        var_dump($model);
        var_dump($user['login']);
        var_dump($newuser);
        var_dump('identity', \Yii::$app->user->identity);
//        var_dump($model->getUser());

        exit;
    }

}