<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AntecedentePaciente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antecedente-paciente-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-striped">
        <tr>
            <td>  
                <?= $form->field($model, 'id_antecedente')->textInput() ?>
            </td>
        </tr>
        <tr>
            <td>  
                <?= $form->field($model, 'id_paciente')->textInput() ?>
            </td>
        </tr>
        <tr>
            <td>  
                <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>
            </td>
        </tr>
    </table>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
