<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteTrabajoSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-trabajo-social-form">

    <?php
    $findAll = []; // ARRAY DE TODOS LOS "MODELS AUXILIARES" EN CASO DE QUE SEA UN UPDATE
    // DEFINIMOS LA RUTA PARA INSERTAR UN NUEVO SERVICIO O PARA ACTUALIZAR SI YA EXISTE
    // LO HACEMOS ANTES DEL FORM BEGIN PARA PODER SETEAR LA RUTA
    if ($model->id > 0) { //UPDATE
        $ruta = "/paciente/actualizar";
    } else { //CREATE
        $ruta = "/paciente/insertar";
    }
    $form = ActiveForm::begin();
    ?>
    <table class="table table-striped">
        <tr>
            <td>  
                <?= $form->field($model, 'vivienda')->textInput(['maxlength' => true]) ?>
            </td>
            <td>  
                <?= $form->field($model, 'aspecto_economico')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr>
            <td>  
                <?= $form->field($model, 'problematicas_salud')->textInput(['maxlength' => true]) ?>
            </td>
            <td>  
                <?= $form->field($model, 'diagnostico')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr>
            <td>  
                <?= $form->field($model, 'medico_cabecera')->textInput(['maxlength' => true]) ?>
            </td>
            <td>  
                <?= $form->field($model, 'actividades')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">  
                <?= $form->field($model, 'conclusion')->textarea(['rows' => 4]) ?>
                <?= $form->field($model, 'id_paciente')->hiddenInput(['value' => $_GET['id_paciente']])->label(false); ?>
            </td>
        </tr>
    </table>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
