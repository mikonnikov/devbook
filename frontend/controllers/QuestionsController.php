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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->setSort(['defaultOrder' => ['add_time'=>SORT_DESC]]);

        return $this->render('@frontend/views/question/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
