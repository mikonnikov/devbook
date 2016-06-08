<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 25.05.16
 * Time: 19:03
 */

namespace frontend\controllers;

use common\models\Answer;
use common\models\AnswerSearch;
use Yii;
use common\models\Question;
use yii\data\ActiveDataProvider;
use common\models\QuestionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\controllers\QuestionController;

/**
 * QuestionController as child of backends parent
 */
class QuestionsController extends QuestionController
{
    /**
     * Call backend's controller
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        return parent::actionUpdate($id);
    }

    /**
     * Call backend's controller
     * @param integer $id
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Question();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['questions/view?id=' . $model->id]);
        } else {
            return $this->render('@frontend/views/question/create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays a single Question page
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $modelAnswer   = new Answer();
        $modelQuestion = $this->findModel($id);

        $searchModel = new AnswerSearch();
        $dataProviderAnswers = $searchModel->search(['AnswerSearch' => ['question_id' => $id]]);

        if(\Yii::$app->getRequest()->getIsPost()) {
            $model = new Answer();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                \Yii::$app->getSession()->setFlash('success', 'Comment been added');
            }
        }

        return $this->render('@frontend/views/question/view', [
            'model'                 => $modelQuestion,
            'modelAnswer'           => $modelAnswer,
            'dataProviderAnswers'   => $dataProviderAnswers,
        ]);
    }

    /**
     * Lists all Questions
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestionSearch();
        $dataProvider = $searchModel->searchAll(Yii::$app->request->queryParams);
        $dataProvider->setSort(['defaultOrder' => ['add_time'=>SORT_DESC]]);

        return $this->render('@frontend/views/question/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
