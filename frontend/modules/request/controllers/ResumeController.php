<?php

namespace frontend\modules\request\controllers;

use yii\rest\ActiveController;

class ResumeController extends MyActiveController
{
    public $modelClass = 'common\models\Resume';

    public function actionTest(){
        return \Yii::$app->user->identity;
    }
}
