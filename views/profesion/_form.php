<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profesion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profesion-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-striped">
        <tr>
<td>  
  <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
</td>
</tr>
    </table>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
