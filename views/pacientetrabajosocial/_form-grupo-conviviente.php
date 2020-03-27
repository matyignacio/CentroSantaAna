<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<td style="width: 30%">
    <?=
    $form->field($pacientegrupoconviviente, 'nombre')->textInput(['maxlength' => true,
        'id' => "Pacientegrupoconviviente_{$key}_nombre",
        'name' => "Pacientegrupoconviviente[$key][nombre]",
        'enableAjaxValidation' => true
    ])
    ?>
    <?=
    $form->field($pacientegrupoconviviente, 'parentesco')->textInput(['maxlength' => true,
        'id' => "Pacientegrupoconviviente_{$key}_parentesco",
        'name' => "Pacientegrupoconviviente[$key][parentesco]",
        'enableAjaxValidation' => true
    ])
    ?>
</td>
<td style="width: 30%">
    <?=
    $form->field($pacientegrupoconviviente, 'edad')->textInput([
        'id' => "Pacientegrupoconviviente_{$key}_edad",
        'name' => "Pacientegrupoconviviente[$key][edad]",
        'enableAjaxValidation' => true
    ])
    ?>
    <?=
    $form->field($pacientegrupoconviviente, 'escolaridad')->textInput(['maxlength' => true,
        'id' => "Pacientegrupoconviviente_{$key}_escolaridad",
        'name' => "Pacientegrupoconviviente[$key][escolaridad]"])
    ?>
</td>
<td style="width: 30%">
    <?=
    $form->field($pacientegrupoconviviente, 'laboral')->textInput(['maxlength' => true,
        'id' => "Pacientegrupoconviviente_{$key}_laboral",
        'name' => "Pacientegrupoconviviente[$key][laboral]"
    ])
    ?>
    <?=
    $form->field($pacientegrupoconviviente, 'id_obra_social')->dropDownList(
            ArrayHelper::map(app\models\ObraSocial::find()->orderBy('nombre')->all(), 'id', function($pacientegrupoconviviente) {
                return $pacientegrupoconviviente['nombre'];
            }), [
        'id' => "Pacientegrupoconviviente_{$key}_id_obra_social",
        'name' => "Pacientegrupoconviviente[$key][id_obra_social]"
    ])->label('Obra Social')
    ?>
</td>
<td style="width: 10%">
    <br>
    <?=
    Html::a('Quitar ' . $key, 'javascript:void(0);', [
        'class' => 'eliminar_grupo_conviviente_button btn btn-danger btn-xs',
    ])
    ?>
</td>