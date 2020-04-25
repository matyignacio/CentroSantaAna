<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GrupoconvivienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupo-conviviente-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'parentesco') ?>

    <?= $form->field($model, 'edad') ?>

    <?= $form->field($model, 'escolaridad') ?>

    <?php // echo $form->field($model, 'laboral') ?>

    <?php // echo $form->field($model, 'id_obra_social') ?>

    <?php // echo $form->field($model, 'id_paciente_trabajo_social')  ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
