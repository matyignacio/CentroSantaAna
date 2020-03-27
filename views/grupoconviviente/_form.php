<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GrupoConviviente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grupo-conviviente-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-striped">
        <tr>
            <td>  
                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr>
            <td>  
                <?= $form->field($model, 'parentesco')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr>
            <td>  
                <?= $form->field($model, 'edad')->textInput() ?>
            </td>
        </tr>
        <tr>
            <td>  
                <?= $form->field($model, 'escolaridad')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr>
            <td>  
                <?= $form->field($model, 'laboral')->textInput(['maxlength' => true]) ?>
            </td>
        </tr>
        <tr>
            <td>  
                <?= $form->field($model, 'id_obra_social')->textInput() ?>
            </td>
        </tr>
        <tr>
            <td>  
                <?= $form->field($model, 'id_paciente_trabajo_social')->textInput() ?>
            </td>
        </tr>
    </table>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
