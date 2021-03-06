<?php

use common\models\Company;
use dektrium\user\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\company\models\CompanySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Работодатели';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать работодателя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'user_id',
                'format'    => 'text',
                'value' => function($model)
                {
                    return User::findOne($model->user_id)->username;
                },
                'filter'    => \kartik\select2\Select2::widget(
                    [
                        'model' => $searchModel,
                        'attribute' => 'user_id',
                        'data' => \yii\helpers\ArrayHelper::map(User::find()->asArray()->all(),'id', 'username'),
                        'options' => ['placeholder' => 'Выберите пользователя...','class' => 'form-control'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])
            ],
            'title',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    switch ($model->status){
                        case Company::STATUS_INACTIVE: return 'Не активен';
                    }
                    return 'Активен';
                },
                'filter'    => Html::activeDropDownList( $searchModel, 'status', [
                    Company::STATUS_ACTIVE => 'Активен',
                    Company::STATUS_INACTIVE => 'Не активен',
                ], [ 'class' => 'form-control', 'prompt' => '' ] ),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
