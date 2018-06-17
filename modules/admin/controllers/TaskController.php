<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\tables\task;
use app\models\tables\TaskSearch;
use yii\caching\DbDependency;
use yii\filters\PageCache;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminTaskController implements the CRUD actions for task model.
 */
class TaskController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'cache' => [
                'class' => PageCache::className(),
                'duration' => 60,
                'variations' => [Yii::$app->language],
                //limit actions for cache
                'only' => ['index']
                /*
                'dependency' => [
                    'class' => DbDependency::className(),
                    'sql' => '.....'
                ]
                */
            ],
            //can be many rules for caching
            /*
            'cache2' => [
                'class' => PageCache::className(),
                'duration' => 500,
                'variations' => [Yii::$app->language],
                //limit actions for cache
                'only' => ['view']
                /*
                'dependency' => [
                    'class' => DbDependency::className(),
                    'sql' => '.....'
                ]

            ],
            */
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single task model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        /*
        $cache = \Yii::$app->cache;
        $key = 'task_' . $id;

        //clear cache
        //$cache->flush();

        //dependency for cache, if quantity of rows are changed
        $dependency = new DbDependency();
        $dependency->sql = 'SELECT count(*) FROM tasker.task';

        //if value of task_id is exists
        if (!$model = $cache->get($key)) {
            $model = $this->findModel($id);
            //set time in s for cache lifetime
            $cache->set($key, $model, 300, $dependency);
        }
*/
        $model = $this->findModel($id);
//        $model->afterSave();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = task::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
