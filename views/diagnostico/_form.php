<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diagnostico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnostico-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-striped">
        <tr>
<td>  
  <?= $form->field($model, 'fecha')->textInput() ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'resumen')->textarea(['rows' => 6]) ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'is_sensible')->textInput() ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'id_paciente')->textInput() ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'id_usuario')->textInput() ?>
</td>
</tr>
    </table>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
