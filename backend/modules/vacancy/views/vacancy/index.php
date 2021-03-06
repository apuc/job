<?php

use common\models\Company;
use common\models\EmploymentType;
use common\models\Vacancy;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\vacancy\models\VacancySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Вакансии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vacancy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать вакансию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'company_id',
                'format'    => 'text',
                'value' => function($model)
                {
                    return Company::findOne($model->company_id)->name;
                },
                'filter'    => \kartik\select2\Select2::widget(
                    [
                        'model' => $searchModel,
                        'attribute' => 'company_id',
                        'data' => \yii\helpers\ArrayHelper::map(Company::find()->asArray()->all(),'id', 'title'),
                        'options' => ['placeholder' => 'Select a state ...','class' => 'form-control'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])
            ],
            'post',
            [
                'attribute' => 'responsibilities',
                'format' => 'raw',
                'value' => function ($model) {
                    return mb_substr($model->responsibilities, 0, 10) . '...';
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
            'min_salary',
            'max_salary',
            'qualification_requirements',
            'work_experience',
            'education',
            'working_conditions',
            'video',
            'address',
            'home_number',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    switch ($model->status){
                        case Vacancy::STATUS_INACTIVE: return 'Не активна';
                    }
                    return 'Активна';
                },
                'filter'    => Html::activeDropDownList( $searchModel, 'status', [
                    Vacancy::STATUS_ACTIVE => 'Активна',
                    Vacancy::STATUS_INACTIVE => 'Не активна',
                ], [ 'class' => 'form-control', 'prompt' => '' ] ),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
