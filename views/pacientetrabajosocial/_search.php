<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PacientetrabajosocialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-trabajo-social-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'vivienda') ?>

    <?= $form->field($model, 'aspecto_economico') ?>

    <?= $form->field($model, 'problematicas_salud') ?>

    <?= $form->field($model, 'diagnostico') ?>

    <?php // echo $form->field($model, 'medico_cabecera') ?>

    <?php // echo $form->field($model, 'actividades') ?>

    <?php // echo $form->field($model, 'conclusion') ?>

    <?php // echo $form->field($model, 'id_paciente')  ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
