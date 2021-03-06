<?php

use common\models\Vacancy;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_id')->widget(Select2::className(),
        [
            'data' => ArrayHelper::map(\common\models\Company::find()->all(), 'id', 'name'),
            'options' => ['placeholder' => 'Начните вводить имя работодателя ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    ); ?>

    <?= $form->field($model, 'post')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'responsibilities')->textarea() ?>

    <?= $form->field($model, 'min_salary')->textInput() ?>

    <?= $form->field($model, 'max_salary')->textInput() ?>

    <?= $form->field($model, 'qualification_requirements')->textarea() ?>

    <?= $form->field($model, 'education')->textInput() ?>

    <?= $form->field($model, 'working_conditions')->textInput() ?>

    <?= $form->field($model, 'video')->textInput() ?>

    <?= $form->field($model, 'address')->textInput() ?>

    <?= $form->field($model, 'home_number')->textInput() ?>

    <?= $form->field($model, 'employment_type_id')->dropDownList(ArrayHelper::map(\common\models\EmploymentType::find()->all(), 'id', 'name'), [ 'class' => 'form-control', 'prompt' => '' ] ) ?>

    <?= $form->field($model, 'schedule_id')->dropDownList(ArrayHelper::map(\common\models\Schedule::find()->all(), 'id', 'name'), [ 'class' => 'form-control', 'prompt' => '' ] ) ?>

    <?= $form->field($model, 'status')->dropDownList([
        Vacancy::STATUS_ACTIVE => 'Активна',
        Vacancy::STATUS_INACTIVE => 'Не активна',
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
