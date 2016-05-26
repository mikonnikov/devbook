<?php

namespace frontend\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\controllers\UserController;

/**
 * UsersController extends backend
 */
class UsersController extends UserController
{
    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProviderUsers = $searchModel->search(Yii::$app->request->queryParams);
        $dataProviderUsers->setSort(['defaultOrder' => ['created_at' => SORT_DESC]]);
        $dataProviderUsers->setPagination(['pageSize' => 20]);   // show last N questions

        return $this->render('@frontend/views/user/index', [ 'dataProviderUsers' => $dataProviderUsers ]);
    }

    /**
     * Turn off user (if he is spammer?)
     */
    public function actionStatus($id, $status)
    {
        $model = $this->findModel($id);
        $model->setAttribute('status', $status);
        $model->save();

        return $this->redirect(['@frontend/views/user/view', 'id' => $id]);
    }
}
