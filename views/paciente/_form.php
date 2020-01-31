<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-striped">
        <tr>
<td>  
  <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'dni')->textInput() ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'fecha_ingreso')->textInput() ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'datos_padre')->textarea(['rows' => 6]) ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'datos_madre')->textarea(['rows' => 6]) ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'familiar_responsable')->textInput(['maxlength' => true]) ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'derivador_por')->textInput(['maxlength' => true]) ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'hospital')->textInput(['maxlength' => true]) ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'id_usuario')->textInput() ?>
</td>
</tr>
<tr>
<td>  
  <?= $form->field($model, 'id_obra_social')->textInput() ?>
</td>
</tr>
    </table>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
