<?php

use common\models\EmploymentType;
use common\models\Resume;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\resume\models\ResumeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши резюме';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать резюме', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            [
                'attribute' => 'description',
                'value' => function ($model) {
                    return mb_substr($model->description, 0, 100) . '...';
                },
            ],
            [
                'attribute' => 'employment_type_id',
                'format' => 'raw',
                'value' => function ($model) {
                    return EmploymentType::findOne($model->employment_type_id)->name;
                },
                'filter'    => Html::activeDropDownList( $searchModel, 'employment_type_id',
                    \yii\helpers\ArrayHelper::map(EmploymentType::find()->asArray()->all(),'id', 'name'),
                    [ 'class' => 'form-control', 'prompt' => '' ] ),
            ],
            'schedule_id',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    switch ($model->status){
                        case Resume::STATUS_INACTIVE: return 'Не активно';
                    }
                    return 'Активно';
                },
                'filter'    => Html::activeDropDownList( $searchModel, 'status', [
                    Resume::STATUS_ACTIVE => 'Активно',
                    Resume::STATUS_INACTIVE => 'Не активно',
                ], [ 'class' => 'form-control', 'prompt' => '' ] ),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
