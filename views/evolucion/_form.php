<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use yii\helpers\ArrayHelper;
use moonland\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Diagnostico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evolucion-form">

    <?php $form = ActiveForm::begin(); ?>
    <table class="table table-striped">
        <tr>
            <td width="60%">  
                <?php
                echo $form->field($model, 'id_paciente')->widget(Select2::className(), [
                    'items' => ArrayHelper::map(app\models\Paciente::find()
                                    ->select('id, nombre')
                                    ->orderBy('nombre')
                                    ->all(), 'id', function($model) {
                                return $model['nombre'];
                            }
                    ),
                    'size' => Select2::SMALL,
                ])->label('Paciente');
                ?>
            </td>
            <td width="30%">  
                <?php
                echo $form->field($model, 'fecha')->widget(\kartik\datecontrol\DateControl::classname(), [
                    'type' => 'date',
                    'ajaxConversion' => true,
                    'autoWidget' => true,
                    'widgetClass' => '',
                    'displayFormat' => 'php:d-F-Y',
                    'saveFormat' => 'php:Y-m-d',
                    'widgetOptions' => [
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'php:d-F-Y',
                            'todayHighlight' => true
                        ]
                    ],
                    'language' => 'es'
                ]);
                ?>
                <?= $form->field($model, 'id_usuario')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false); ?>
            </td>
            <td width="10%">  
                <?= $form->field($model, 'is_sensible')->widget(SwitchInput::classname(), []); ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">  
                <?= $form->field($model, 'resumen')->textarea(['rows' => 6]) ?>
            </td>
        </tr>
    </table>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
